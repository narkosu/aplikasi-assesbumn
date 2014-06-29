<?php

class IdpController extends Controller {

    public $layout = '//layouts/main';
    public $menuactive = 'form_idp';
    
    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index', 'sethard', 'loadpriority', 
                                'loadjenispengembangan', 
                                'LoadjenispengembanganPreview',
                                'download',
                                'downloadbukti',
                                'save'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('preview', 'previewhard'),
                'expression' => '$user->isMember',
            ),
            array('deny', // deny all other users
                'users' => array('*'),
            ),
        );
    }

    
    public function SaveMe() {
        if (Yii::app()->request->isPostRequest) {
           //print_r($_POST);
           //print_r($_FILES);
           //die;
            list($ps_day, $ps_month, $ps_year) = explode('-', $_POST['periode_start']);
            list($pe_day, $pe_month, $pe_year) = explode('-', $_POST['periode_end']);

            $periode_start = $ps_year . '-' . $ps_month . '-' . $ps_day;
            $periode_end = $pe_year . '-' . $pe_month . '-' . $pe_day;
            /*
             * Check idp is new ?
             */
            $idp = Idp::model()->find('departement_id = :dp 
                                AND peserta_id = :ptid 
                                AND penilaian_id = :pid', array(':dp' => $_POST['departement_id'],
                ':ptid' => $_POST['peserta'],
                ':pid' => $_POST['penilaian_id'])
            );

            if (empty($idp)) {
                $idp = new Idp;
            } else {
                //echo 'lama';
            }
            
            $idp->departement_id = $_POST['departement_id'];
            $idp->peserta_id    = $_POST['peserta'];
            $idp->penilaian_id  = $_POST['penilaian_id'];
            $idp->jabatan       = $_POST['Idp']['jabatan'];
            $idp->unit_kerja    = $_POST['Idp']['unit_kerja'];
            $idp->atasan        = $_POST['Idp']['atasan'];
            $idp->periode_start = $periode_start;
            $idp->periode_end   = $periode_end;
            
            if ($idp->save()) {
                //DetailIdp::model()->deleteAll("idp_id = '" . $idp->id . "'");
                $priority = $_POST['PriorityIdp']['jenispengembangan_id'];
                foreach ((array) $priority as $indexkomptensi => $priorityChecked) {
                    
                    if (!empty($priorityChecked)) {
                        list($kompetensi_id, $jenispengembangan_id, $level, $detaillevel) = explode('_', $indexkomptensi);
                        $detailIdp = DetailIdp::model()->find('idp_id = :idp 
                                             AND departement_id = :dip
                                             AND kompetensi_id = :kid
                                             AND jenispengembangan_id = :jid
                                             AND level_sp_id = :lid
                                             AND leveldetail_sp_id = :ldid', array(':idp' => $idp->id,
                            ':dip' => $idp->departement_id,
                            ':kid' => $kompetensi_id,
                            ':jid' => $jenispengembangan_id,
                            ':lid' => $level,
                            ':ldid' => $detaillevel,
                        ));
                        if (empty($detailIdp)) {
                            $detailIdp = new DetailIdp;
                            $detailIdp->idp_id = $idp->id;
                        } else {
                            $filebuktiold = $detailIdp->bukti;
                        }
                        
                        $aktifitas = ( empty($_POST['aktifitas'][$indexkomptensi]) ? '' : $_POST['aktifitas'][$indexkomptensi]);
                        $timeframe = ( empty($_POST['timeframe'][$indexkomptensi]) ? '' : $_POST['timeframe'][$indexkomptensi]);
                        $tujuan = ( empty($_POST['tujuan'][$indexkomptensi]) ? '' : $_POST['tujuan'][$indexkomptensi]);
                        $bukti = ( empty($_POST['bukti'][$indexkomptensi]) ? '' : $_POST['bukti'][$indexkomptensi]);
                        $approve_date = ( empty($_POST['approve_date'][$indexkomptensi]) ? '' : $_POST['approve_date'][$indexkomptensi]);
                        $status = ( empty($_POST['status'][$indexkomptensi]) ? '' : $_POST['status'][$indexkomptensi]);
                        
                        $detailIdp->departement_id = $idp->departement_id;
                        
                        $detailIdp->kompetensi_id = $kompetensi_id;
                        
                        $detailIdp->jenispengembangan_id = $jenispengembangan_id;
                        
                        $detailIdp->level_sp_id = $level;
                        
                        $detailIdp->leveldetail_sp_id = $detaillevel;
                        $detailIdp->aktifitas = $aktifitas ;
                        
                        $detailIdp->timeframe = $this->convertDate($timeframe);
                        
                        $detailIdp->tujuan = $tujuan;
                        
                        $detailIdp->approved_by = Yii::app()->user->id;
                        
                        $folder = Yii::getPathOfAlias('webroot')."/files";  
                        $newFile = false;
                        if ( !empty($_FILES['DetailIdp']['name']['filebukti'][$indexkomptensi]) ){
                            
                            $time = time();
                            $detailIdp->bukti = CUploadedFile::getInstance($detailIdp,'filebukti['.$indexkomptensi.']');
                            
                            
                            $newfilename = $time.'_'.$indexkomptensi.'.'.$detailIdp->bukti->getExtensionName();
                            $extension = $detailIdp->bukti->getExtensionName();
                            
                            $detailIdp->bukti->saveAs( $folder . '/' . $newfilename ); 
                            $detailIdp->bukti = $newfilename;
                            $newFile = true;
                           
                            
                        }
                        //$detailIdp->bukti = $bukti;
                        $detailIdp->approve_date = $this->convertDate($approve_date);
                        $detailIdp->status = $status;
                        
                        if ( $detailIdp->save() ) {
                             if (!(empty($filebuktiold)) && $newFile){
                                 @unlink($folder.'/'.$filebuktiold);
                             }
                            
                        }else{
                            
                        }
                    }
                    
                }
                
                Yii::app()->user->setFlash('idp_success','Data IDP sudah tersimpan.');
                $return['status'] = 'success';
                echo json_encode($return);
            } else {
                $return['status'] = 'error';
                $return['error'] = $idp->getErrors();
                echo json_encode($return);
                
            }
        }
    }
    
    
    public function actionDownloadBukti(){

        //$model = new DetailIdp; 
        $name	= $_GET['file'];	
        $upload_path = Yii::getPathOfAlias('webroot')."/files";  

        if( file_exists( $upload_path.'/'.$name ) ){
            Yii::app()->getRequest()->sendFile( $name , file_get_contents( $upload_path.'/'.$name ) );
        }
        else{
            $this->render('download404');
        }	

    } 

    public function actionSave() {
        if (Yii::app()->request->isPostRequest) {
           
            list($ps_day, $ps_month, $ps_year) = explode('-', $_POST['periode_start']);
            list($pe_day, $pe_month, $pe_year) = explode('-', $_POST['periode_end']);

            $periode_start = $ps_year . '-' . $ps_month . '-' . $ps_day;
            $periode_end = $pe_year . '-' . $pe_month . '-' . $pe_day;
            /*
             * Check idp is new ?
             */
            $idp = Idp::model()->find('departement_id = :dp 
                                AND peserta_id = :ptid 
                                AND penilaian_id = :pid', array(':dp' => $_POST['departement_id'],
                ':ptid' => $_POST['peserta'],
                ':pid' => $_POST['penilaian_id'])
            );

            if (empty($idp)) {
                $idp = new Idp;
            } else {
                //echo 'lama';
            }
            
            $idp->departement_id = $_POST['departement_id'];
            $idp->peserta_id    = $_POST['peserta'];
            $idp->penilaian_id  = $_POST['penilaian_id'];
            $idp->jabatan       = $_POST['Idp']['jabatan'];
            $idp->unit_kerja    = $_POST['Idp']['unit_kerja'];
            $idp->atasan        = $_POST['Idp']['atasan'];
            $idp->periode_start = $periode_start;
            $idp->periode_end   = $periode_end;
            
            if ($idp->save()) {
                DetailIdp::model()->deleteAll("idp_id = '" . $idp->id . "'");
                $priority = $_POST['PriorityIdp']['jenispengembangan_id'];
                foreach ((array) $priority as $indexkomptensi => $priorityChecked) {
                    
                    if (!empty($priorityChecked)) {
                        list($kompetensi_id, $jenispengembangan_id, $level, $detaillevel) = explode('_', $indexkomptensi);
                        $detailIdp = DetailIdp::model()->find('idp_id = :idp 
                                             AND departement_id = :dip
                                             AND kompetensi_id = :kid
                                             AND jenispengembangan_id = :jid
                                             AND level_sp_id = :lid
                                             AND leveldetail_sp_id = :ldid', array(':idp' => $idp->id,
                            ':dip' => $idp->departement_id,
                            ':kid' => $kompetensi_id,
                            ':jid' => $jenispengembangan_id,
                            ':lid' => $level,
                            ':ldid' => $detaillevel,
                        ));
                        if (empty($detailIdp)) {
                            $detailIdp = new DetailIdp;
                            $detailIdp->idp_id = $idp->id;
                        }
                        
                        $aktifitas = ( empty($_POST['aktifitas'][$indexkomptensi]) ? '' : $_POST['aktifitas'][$indexkomptensi]);
                        $timeframe = ( empty($_POST['timeframe'][$indexkomptensi]) ? '' : $_POST['timeframe'][$indexkomptensi]);
                        $tujuan     = ( empty($_POST['tujuan'][$indexkomptensi]) ? '' : $_POST['tujuan'][$indexkomptensi]);
                        $bukti      = ( empty($_POST['bukti'][$indexkomptensi]) ? '' : $_POST['bukti'][$indexkomptensi]);
                        $approve_date = ( empty($_POST['approve_date'][$indexkomptensi]) ? '' : $_POST['approve_date'][$indexkomptensi]);
                        $status = ( empty($_POST['status'][$indexkomptensi]) ? '' : $_POST['status'][$indexkomptensi]);
                        
                        $detailIdp->departement_id = $idp->departement_id;
                        
                        $detailIdp->kompetensi_id = $kompetensi_id;
                        
                        $detailIdp->jenispengembangan_id = $jenispengembangan_id;
                        
                        $detailIdp->level_sp_id = $level;
                        
                        $detailIdp->leveldetail_sp_id = $detaillevel;
                        $detailIdp->aktifitas = $aktifitas ;
                        
                        $detailIdp->timeframe = $this->convertDate($timeframe);
                        
                        $detailIdp->tujuan = $tujuan;
                        $detailIdp->bukti = $bukti;
                        $detailIdp->approve_date = $this->convertDate($approve_date);
                        $detailIdp->status = $status;
                        
                        if ( $detailIdp->save()) {
                            //echo 'ok';
                            
                        }
                    }
                }
                
                Yii::app()->user->setFlash('idp_success','Data IDP sudah tersimpan.');
                $return['status'] = 'success';
                echo json_encode($return);
            } else {
                $return['status'] = 'error';
                $return['error'] = $idp->getErrors();
                echo json_encode($return);
                
            }
        }
    }

    public function actionIndex($id) {
        $params = array();
        $params['id'] = $id;
        $params['competency'] = 1;
        
        $loadPeserta = Peserta::model()->findByPk($id);
        $loadPenilaian = Penilaian::model()->find('peserta_id = :pid and type_competence = 1', array(':pid' => $id));

        if (!isset($loadPenilaian)) {
            $this->render('idp_empty');
            exit;
        }

        $model = $loadPenilaian;
        $detailNilai = Detailpenilaian::model()->kompetensinilaiArray($model);
        $jenisPengembangan = Jenispengembangan::model()
                ->findAll('departemen_id = :depid', array(':depid' => $model->departement_id)
        );
        $idp = $this->loadIdp(array(
            'departement_id' => $model->departement_id,
            'peserta_id' => $id,
            'penilaian_id' => $model->id
                )
        );

        if (empty($idp)) {
            $idp = new Idp();
        } else {
            $idp->periode_end = $this->deconvertDate($idp->periode_end);
            $idp->periode_start = $this->deconvertDate($idp->periode_start);

            $loadIdpByMaster = $this->loadDetailIdpByMaster($idp->id);
        }

        $priorityIdp = new PriorityIdp();


        $kompetensiForm['ringkasan'] = $this->ringkasanProfil($detailNilai);

        $this->render('idp', array(
            'penilaian' => $loadPenilaian,
            'idp' => $idp,
            'priorityIdp' => $priorityIdp,
            'departement_id' => $loadPenilaian->departement_id,
            'peserta' => $loadPeserta,
            'params' => $params,
            'jenisPengembangan' => $jenisPengembangan,
            'kompetensiData' => $kompetensiForm,
            'loadIdpByMaster' => $loadIdpByMaster
        ));
    }

    public function actionSethard($id) {
        
        
        if (!empty($_POST)){
            $this->SaveMe();
        }
        
        $params['competency'] = 2;
        $params['id'] = $id;
        $loadPeserta = Peserta::model()->findByPk($id);
        
        $loadPenilaian = Penilaian::model()->find('peserta_id = :pid and type_competence = 2', array(':pid' => $id));

        if (!isset($loadPenilaian)) {
            $this->render('idp_empty', array('peserta' => $loadPeserta,'params'=> $params,'model'=>$loadPenilaian));
            exit;
        }
        
        $model = $loadPenilaian;
        $detailNilai = Detailpenilaian::model()->kompetensinilaiArray($model);
        $jenisPengembangan = Jenispengembangan::model()
                ->findAll('departemen_id = :depid', array(':depid' => $model->departement_id)
        );
        
        $idp = $this->loadIdp(array(
            'departement_id' => $model->departement_id,
            'peserta_id' => $id,
            'penilaian_id' => $model->id
                )
        );
        $loadIdpByMaster = new stdClass();
        if (empty($idp)) {
            $idp = new Idp();
        } else {
            $idp->periode_end = $this->deconvertDate($idp->periode_end);
            $idp->periode_start = $this->deconvertDate($idp->periode_start);

            $loadIdpByMaster = $this->loadDetailIdpByMaster($idp->id);
        }

        $priorityIdp = new PriorityIdp();


        $kompetensiForm['ringkasan'] = $this->ringkasanProfil($detailNilai);
        
        $this->render('idp', array(
            'penilaian' => $loadPenilaian,
            'idp' => $idp,
            'priorityIdp' => $priorityIdp,
            'departement_id' => $loadPenilaian->departement_id,
            'peserta' => $loadPeserta,
            'params'=>$params,
            'jenisPengembangan' => $jenisPengembangan,
            'kompetensiData' => $kompetensiForm,
            'loadIdpByMaster' => $loadIdpByMaster
        ));
        
    }

    /* for soft */

    public function actionLoadjenispengembangan() {
        
        $priorityIdp = new PriorityIdp();
        $type_competence = ( empty($_POST['type_competence']) ? '' : $_POST['type_competence']) ;
        $nextLevel = ( empty($_POST['nextlevel']) ? '' : $_POST['nextlevel']) ;
        $return['status'] = 'success';
        $return['kompetensi_id'] = ( empty($_POST['kompetensi_id']) ? '' : $_POST['kompetensi_id']);
        $komp_id =  $return['kompetensi_id'];
        $return['kompetensi_name'] = (empty($_POST['kompetensi_name']) ? '' : $_POST['kompetensi_name']);
        $departement_id = (empty($_POST['departement_id']) ? '' :$_POST['departement_id'] );
        $jepe = $this->getJenispengembangan($departement_id);
        $output = array();
        $html = '';
        $datePicker = '';

        $subactivityInterface = '';
        
        foreach ((array) $jepe as $jpVal) {
            
            if ( !empty($jpVal) ) {
                $jvalId = ( empty( $jpVal->id) ? '' :  $jpVal->id);
                $nama_pengembangan = (empty($jpVal->nama_pengembangan) ? '':$jpVal->nama_pengembangan);
                $output[$jvalId] = $nama_pengembangan; // jenispengembangan;

                $html .= '<tr class="activity_' . $komp_id . '">' .
                        '<td><div style="padding-left:25px;font-weight:bold;">' .
                        $nama_pengembangan .
                        '</div></td>' .
                        '<td></td>' .
                        '<td></td>' .
                        '<td></td>' .
                        '<td style="text-align:center;"></td></tr>';

                $subactivityInterface .= '<tr class="form_' . $komp_id . '_' . $jvalId . '" style="display:none;">' .
                        '<td><div style="padding-left:25px;">' .
                        $nama_pengembangan .
                        '</div></td>' .
                        '<td></td>' .
                        '<td></td>' .
                        '<td></td>' .
                        '<td style="text-align:center;"></td></tr>';

                /* load by level */
                
                foreach ((array) $nextLevel as $level) {

                    $html .= '<tr class="activity_' . $komp_id . '">' .
                            '<td><div style="padding-left:25px;font-weight:bold;">' .
                            'LEVEL : ' . $level .
                            '</div></td>' .
                            '<td></td>' .
                            '<td></td>' .
                            '<td></td>' .
                            '<td style="text-align:center;"></td></tr>';
                    
                    $spdet = Penilaian::routeLevelSaranPengembangan($type_competence, 
                            array('departement_id' => $departement_id,
                                'kompetensi_id' => $komp_id,
                                'jenispengembangan_id' => $jvalId,
                                'level' => $level)
                    );
                    
                    
                    //print_r($spdet);//->detail
                    $no = 1;
                    if ( !empty($spdet->detail))
                    foreach ( $spdet->detail as $splevelDetil) {
                        
                        $splevelDetil->keterangan = ( empty ($splevelDetil->keterangan) ? '' : $splevelDetil->keterangan );
                        $splevelDetil->id = ( empty ($splevelDetil->id) ? '' : $splevelDetil->id );
                        $splevelDetilID = $splevelDetil->id;
                        $indexName          = $komp_id . '_' . $jvalId . '_' . $level . '_' . $splevelDetilID;

                        $detailKeterangan   = $splevelDetil->keterangan;
                        
                        $tujuan = '<select id="tujuan_' . $indexName . '" style="width:100px;" name="tujuan[' . $indexName . ']">
                                    <option value=""></option>
                                    <option value="1">Memperbaiki Kerja</option>
                                    <option value="2">Penugasan Khusus</option>
                                    <option value="3">Pengembangan Karir</option>
                                    <option value="4">Perubahan Jabatan</option>
                                  </select>';

                        $datePicker     = '<input type="input" name="timeframe[' . $indexName . ']" style="width:100px;" class="hasDatepicker" id="timeframe_' . $indexName . '">';
                        $dateApprove    = '<input type="input" name="approve_date[' . $indexName . ']" style="width:100px;" class="hasDatepicker" id="approve_date_' . $indexName . '">';
                        $bukti          = '<input type="file" name="DetailIdp[filebukti][' . $indexName . ']" >';
                        $bukti          .= '<br>File : <span id="filebukti_' . $indexName . '"></span>';
                        $statusApprove  = '<input type="checkbox" name="status[' . $indexName . ']" id="status_' . $indexName . '" value="1">';
                        $grouping_form  = "form_" . $indexName;

                        $subactivityInterface .= '<tr class="' . $grouping_form . '" style="display:none;">' .
                                '<td>' .
                                '<div style="padding-left:35px;">' .
                                '<div id="keterangan_aktifitas_'.$indexName.'" original="'.$detailKeterangan .'">'.$detailKeterangan .'</div>'. 
                                '<textarea style="width:90%;display:none;" name="aktifitas['.$indexName.']" id="aktifitas_'.$indexName.'"></textarea>'.
                                '<br>
                                 <div style="float:right;">'.
                                '<span>Approved By <span id="aproved_by_'.$indexName.'">'.Yii::app()->user->name.'</span></span>'.
                                //'<span class="button aktifitas_edit" relindex="'.$indexName.'">Edit</span>'.
                                //'<span class="button aktifitas_ubah" relindex="'.$indexName.'" style="display:none;">Ubah</span>'.
                                //'<span class="button aktifitas_cancel" relindex="'.$indexName.'"  style="display:none;">Batal</span>'.
                                '</div><div style="clear:both;"></div>'.
                                '</div>'.
                                '</td>' .
                                '<td>' . $datePicker . '</td>' .
                                '<td>' . $tujuan . '</td>' .
                                '<td>' . $bukti . '</td>' .
                                '<td style="text-align:center;">' . $statusApprove . '/' . $dateApprove . '</td></tr>';


                        $html .= '<tr class="activity_' . $komp_id . '">' .
                                '<td>' .
                                '<div style="padding-left:35px;">' .
                                $this->checkboxPriority(
                                        $priorityIdp, 'jenispengembangan_id[' . $indexName . ']', array('value' => 1,
                                    'rel-kompid' => $komp_id,
                                    'rel-jenispengembangan' => $jvalId,
                                    'rel-level' => $level,
                                    'rel-leveldetail' => $splevelDetilID,
                                        )
                                ) .
                                $detailKeterangan . '</div></td>' .
                                '<td></td>' .
                                '<td></td>' .
                                '<td></td>' .
                                '<td style="text-align:center;"></td></tr>';
                        

                    }
                }
            }
        }
        
        
        $return['data'] = $output;
        $return['html'] = $html;
        $return['subhtml'] = $subactivityInterface;

        $return['group_class'] = 'activity_' . $komp_id;
        
        echo json_encode($return);
    }

    public function actionLoadjenispengembanganPreview() {

        $priorityIdp = new PriorityIdp();
        $type_competence = $_POST['type_competence'];
        $nextLevel = $_POST['nextlevel'];
        $return['status'] = 'success';
        $return['kompetensi_id'] = $_POST['kompetensi_id'];
        $komp_id = $_POST['kompetensi_id'];
        $return['kompetensi_name'] = $_POST['kompetensi_name'];
        $jepe = $this->getJenispengembangan($_POST['departement_id']);
        $output = array();
        $html = '';
        $datePicker = '';

        $subactivityInterface = '';

        foreach ((array) $jepe as $jpVal) {

            $output[$jpVal->id] = $jpVal->nama_pengembangan; // jenispengembangan;

            $html .= '<tr class="activity_' . $komp_id . '">' .
                    '<td><div style="padding-left:25px;font-weight:bold;">' .
                    $jpVal->nama_pengembangan .
                    '</div></td>' .
                    '<td></td>' .
                    '<td></td>' .
                    '<td></td>' .
                    '<td style="text-align:center;"></td></tr>';

            $subactivityInterface .= '<tr class="form_' . $komp_id . '_' . $jpVal->id . '" style="display:none;">' .
                    '<td><div style="padding-left:25px;">' .
                    $jpVal->nama_pengembangan .
                    '</div></td>' .
                    '<td></td>' .
                    '<td></td>' .
                    '<td></td>' .
                    '<td style="text-align:center;"></td></tr>';

            /* load by level */
            foreach ((array) $nextLevel as $level) {

                $html .= '<tr class="activity_' . $komp_id . '">' .
                        '<td><div style="padding-left:25px;font-weight:bold;">' .
                        'LEVEL : ' . $level .
                        '</div></td>' .
                        '<td></td>' .
                        '<td></td>' .
                        '<td></td>' .
                        '<td style="text-align:center;"></td></tr>';
                $spdet = Penilaian::routeLevelSaranPengembangan($type_competence, array('departement_id' => $_POST['departement_id'],
                            'kompetensi_id' => $_POST['kompetensi_id'],
                            'jenispengembangan_id' => $jpVal->id,
                            'level' => $level)
                );
                foreach ((array) $spdet->detail as $splevelDetil) {
                    $indexName = $komp_id . '_' . $jpVal->id . '_' . $level . '_' . $splevelDetil->id;
                    $tujuan = '<select id="tujuan_' . $indexName . '" style="width:100px;" name="tujuan[' . $indexName . ']">
                  <option value=""></option>
                  <option value="1">Memperbaiki Kerja</option>
                  <option value="2">Penugasan Khusus</option>
                  <option value="3">Pengembangan Karir</option>
                  <option value="4">Perubahan Jabatan</option>
                </select><div id="texttujuan_'.$indexName.'"></div>';
                    $datePicker = '<div id="timeframe_' . $indexName . '"></div>';
                    $dateApprove = '<div id="approve_date_' . $indexName . '"></div>';
                    $bukti = '<div id="filebukti_' . $indexName . '"></div>';
                    $statusApprove = '<div id="status_' . $indexName . '"></div>';
                    $grouping_form = "form_" . $indexName;

                    $subactivityInterface .= '<tr class="' . $grouping_form . '" style="display:none;">' .
                            '<td>' .
                            '<div style="padding-left:35px;">' .
                            $splevelDetil->keterangan . '</div></td>' .
                            '<td>' . $datePicker . '</td>' .
                            '<td>' . $tujuan . '</td>' .
                            '<td>' . $bukti . '</td>' .
                            '<td style="text-align:center;">' . $statusApprove . '/' . $dateApprove . '</td></tr>';


                    $html .= '<tr class="activity_' . $_POST['kompetensi_id'] . '">' .
                            '<td>' .
                            '<div style="padding-left:35px;">' .
                            $this->checkboxPriority(
                                    $priorityIdp, 'jenispengembangan_id[' . $indexName . ']', array('value' => 1,
                                'rel-kompid' => $_POST['kompetensi_id'],
                                'rel-jenispengembangan' => $jpVal->id,
                                'rel-level' => $level,
                                'rel-leveldetail' => $splevelDetil->id,
                                    )
                            ) .
                            $splevelDetil->keterangan . '</div></td>' .
                            '<td></td>' .
                            '<td></td>' .
                            '<td></td>' .
                            '<td style="text-align:center;"></td></tr>';
                }
            }
        }

        $return['data'] = $output;
        $return['html'] = $html;
        $return['subhtml'] = $subactivityInterface;

        $return['group_class'] = 'activity_' . $_POST['kompetensi_id'];
        echo json_encode($return);
    }
    
    public function actionLoadpriority() {
        $idpDetail = $this->loadDetailIdp(array('idp' => $_POST['idp_id'],
            'departement_id' => $_POST['dept_id'],
            'kompetensi_id' => $_POST['kompid'],
            'jenispengembangan_id' => $_POST['jepengid'],
            'level' => $_POST['level'],
            'detaillevel' => $_POST['leveldetail']
        ));
        if (!empty($idpDetail)) {
            $return['output'] = true;
            $return['timeframe'] = $this->deconvertDate($idpDetail->timeframe);
            $return['tujuan'] = $idpDetail->tujuan;
            $return['bukti'] = (empty($idpDetail->bukti) ? '' : '<a href="'.Yii::app()->createUrl('penilaian/idp/downloadbukti').'?file='.$idpDetail->bukti.'">'.$idpDetail->bukti.'</a>');
            $return['approve_date'] = $this->deconvertDate($idpDetail->approve_date);
            $return['approve_by'] = $idpDetail->user->username;
            $return['status'] = $idpDetail->status;
            $return['aktifitas'] = $idpDetail->aktifitas;
        } else {
            $return['output'] = false;
        }
        echo json_encode($return);
    }

    private function getJenispengembangan($departement_id) {
        return $jenisPengembangan = Jenispengembangan::model()
                ->findAll('departemen_id = :depid', array(':depid' => $departement_id));


        /* $kompetensiSaranPengembangan = LevelSaranpengembangan::model()
          ->getSaranPengembangan(
          $penilaian->departement_id, $kompetensiId, $jp->id
          );
         * 
         */
    }

    private function checkboxPriority($model, $name, $option = array('value' => '')) {

        return CHtml::activeCheckBox($model, $name, array('class' => 'checkPriority',
                    'value' => $option['value'],
                    'rel-kompid' => $option['rel-kompid'],
                    'rel-jenispengembangan' => $option['rel-jenispengembangan'],
                    'rel-level' => $option['rel-level'],
                    'rel-leveldetail' => $option['rel-leveldetail'],
                        )
        );
    }

    private function ringkasanProfil($detailNilai) {
        $kuat = 0;
        $lemah = 0;
        $output = array();
        $output['weak'] = array();
        $output['strong'] = array();
        $output['weakarray'] = array();
        $output['strongarray'] = array();
        foreach ((array) $detailNilai as $jk => $gkomp) {
            foreach ((array) $gkomp as $kompid => $values) {
                if ($values['nilai_akhir'] < 0) {
                    $output['weak'] .= '<li>' . $values['title'] . '</li>';
                    $output['weakArray'][$jk][$kompid] = $values['title'];
                    $lemah++;
                } else {
                    $output['strong'] .= '<li>' . $values['title'] . '</li>';
                    $output['strongArray'][$jk][$kompid] = $values['title'];
                    $kuat++;
                }
            }
        }


        return $output;
    }

    /*
     * Ajax Action for calculate assessment
     * 
     * input is post only 
     */

    public function actionRecalculate() {
        $_POST['pid'] = 10;
        $PenilaianDetail = Detailpenilaian::model()
                ->findAll('penilaian_id = :pid'
                , array(':pid' => $_POST['pid'])
        );
        foreach ((array) $PenilaianDetail as $key => $data) {
            $asses = Assessment::model();
            //$inputNilai,$standard,$jenisNilai,$departement,$jumlahkompetensi,
            $jumlahkompetensi = $data->penilaian->jumlahKompetensiAvailable($data->jeniskompetensi_id);

            $asses->inputNilai = $data->nilai;
            $asses->standard = $data->nilai_default;
            $asses->departement = $data->penilaian->departement_id;
            $asses->jumlahkompetensi = $jumlahkompetensi;

            $result += $asses->calculate();
        }

        echo $result;
    }

    public function actionLoadProcessing() {
        $criteria = new CDbCriteria;
        if ($this->module->current_departement_id)
            $criteria->compare('departement_id', $this->module->current_departement_id);

        $Count = Masterskj::model()->count($criteria);

        //$criteria->with = array('dept');
        $criteria->offset = $_GET['iDisplayStart'];

        $criteria->limit = $_GET['iDisplayLength'];


        $items = Masterskj::model()
                ->findAll($criteria);
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $Count,
            "iTotalDisplayRecords" => $Count,
            "aaData" => array()
        );

        foreach ($items as $i => $iskj) {
            unset($row);

            foreach ($iskj as $field => $vale) {
               $row[] = $vale;
            }
            $row[] = $iskj->id; //for else
            $output['aaData'][] = $row;
        }

        //print_r($_GET);
        echo json_encode($output);
    }

    public function actionPreview($id,$competency = 1){
        $params = array();
        
        $loadPeserta = Peserta::model()->findByPk($id);
        $loadPenilaian = Penilaian::model()->find('peserta_id = :pid and type_competence = :competency',
                            array(':pid' => $id,
                                ':competency'=>$competency));

        if (!isset($loadPenilaian)) {
            $this->render('idp_empty');
            exit;
        }

        $model = $loadPenilaian;
        $detailNilai = Detailpenilaian::model()->kompetensinilaiArray($model);
        $jenisPengembangan = Jenispengembangan::model()
                ->findAll('departemen_id = :depid', array(':depid' => $model->departement_id)
        );
        $idp = $this->loadIdp(array(
            'departement_id' => $model->departement_id,
            'peserta_id' => $id,
            'penilaian_id' => $model->id
                )
        );

        if (empty($idp)) {
            $idp = new Idp();
        } else {
            $idp->periode_end = $this->deconvertDate($idp->periode_end);
            $idp->periode_start = $this->deconvertDate($idp->periode_start);

            $loadIdpByMaster = $this->loadDetailIdpByMaster($idp->id);
            $aktifitas = array();
            foreach ( $loadIdpByMaster as $detail ){
                $aktifitas[$detail->kompetensi_id]
                          [$detail->jenispengembangan_id]
                            ->jenis_pengembangan = $detail->jenispengembangan->nama_pengembangan;
                          
                $aktifitas[$detail->kompetensi_id]
                          [$detail->jenispengembangan_id]->detail[$detail->id] = $detail;
            }
        }

        $priorityIdp = new PriorityIdp();


        $kompetensiForm['ringkasan'] = $this->ringkasanProfil($detailNilai);

         $params = array(
            'penilaian' => $loadPenilaian,
            'idp' => $idp,
            'priorityIdp' => $priorityIdp,
            'departement_id' => $loadPenilaian->departement_id,
            'peserta' => $loadPeserta,
            'params' => $params,
            'aktifitas' => $aktifitas,
            'jenisPengembangan' => $jenisPengembangan,
            'kompetensiData' => $kompetensiForm,
            'loadIdpByMaster' => $loadIdpByMaster
        );
        $params['id'] = $id;
        $params['competency'] = $competency;
        $params['id'] = $id;
        
        $laporan = $this->renderPartial('//penilaian/idp/_cetak_idp_laporan',$params,true,true);
      
        $this->render('idp_preview', array(
            'penilaian' => $loadPenilaian,
            'idp' => $idp,
            'priorityIdp' => $priorityIdp,
            'departement_id' => $loadPenilaian->departement_id,
            'peserta' => $loadPeserta,
            'laporan'=>$laporan,
            'params'=>$params,
            'jenisPengembangan' => $jenisPengembangan,
            'kompetensiData' => $kompetensiForm,
            'loadIdpByMaster' => $loadIdpByMaster
        ));
    }
    
    
   /*
   * download Action report
   * 
   * input is post only 
   */
    public function actionDownload($id,$competency = 1)
    {
        $hasAccess 		= Userasesor::model()->hasAccess();
        $loadPeserta	= Peserta::model()->findByPk($id);
        
        $loadPenilaian = Penilaian::model()->find('peserta_id = :pid and type_competence = :competency', 
                            array(':pid' => $id,
                                  ':competency' => $competency  
                                ));
        /*if ( !isset($loadPenilaian) ){
          $this->redirect(array('/masters/pesertaasesor/penilaian/id/'.$id));
          exit;
        }*/

        $model = $loadPenilaian;
        
        $detailNilai = Detailpenilaian::model()->kompetensinilaiArray($model);
        $jenisPengembangan = Jenispengembangan::model()
                ->findAll('departemen_id = :depid', array(':depid' => $model->departement_id)
        );
        $idp = $this->loadIdp(array(
            'departement_id' => $model->departement_id,
            'peserta_id' => $id,
            'penilaian_id' => $model->id
                )
        );

        if (empty($idp)) {
            $idp = new Idp();
        } else {
            $idp->periode_end = $this->deconvertDate($idp->periode_end);
            $idp->periode_start = $this->deconvertDate($idp->periode_start);

            $loadIdpByMaster = $this->loadDetailIdpByMaster($idp->id);
            $aktifitas = array();
            foreach ( $loadIdpByMaster as $detail ){
                $aktifitas[$detail->kompetensi_id]
                          [$detail->jenispengembangan_id]
                            ->jenis_pengembangan = $detail->jenispengembangan->nama_pengembangan;
                          
                $aktifitas[$detail->kompetensi_id]
                          [$detail->jenispengembangan_id]->detail[$detail->id] = $detail;
            }
        }
        //print_r($loadIdpByMaster);
        
        $priorityIdp = new PriorityIdp();
        
        $kompetensiForm['ringkasan'] = $this->ringkasanProfil($detailNilai);
        
        $params = array(
            'penilaian' => $loadPenilaian,
            'idp' => $idp,
            'priorityIdp' => $priorityIdp,
            'departement_id' => $loadPenilaian->departement_id,
            'peserta' => $loadPeserta,
            'params' => $params,
            'aktifitas' => $aktifitas,
            'jenisPengembangan' => $jenisPengembangan,
            'kompetensiData' => $kompetensiForm,
            'loadIdpByMaster' => $loadIdpByMaster
        );
        
      $empty = '<table cellspacing="0" cellpadding="0" style="border:1px solid #aaa;margin-top:2px;"><tr><td style="width:20px;height:20px;background:#fff;color:#fff">.</td></tr></table>';
      Yii::import('application.extensions.phpdocx.Phpdocx',array('options'=>array('filetemp'=>'satu')));
      $filename 		= str_replace(',','',$loadPeserta->nama_peserta);
      
      $phpdocx = new Phpdocx(array('filetemp'=>$this->getCurrentViewPath()));

      $docx = new CreateDocx();
      $docx->setTemporaryDirectory($this->getCurrentViewPath());
      
		  $docx->addTemplate($this->getCurrentViewPath().'/'.Yii::app()->params['template_idp_laporan'][$this->module->current_departement_id]);
      //$docx->addFooter($footer_text, $paramsFooter);
      $laporan = $this->renderPartial('//penilaian/idp/_cetak_idp_laporan',$params,true,true);
      
      $docx->addTemplateVariable('laporan', $laporan,'html');
      /* halaman depan */
      $onlyfilename  = $filename.'.docx';
      $filename = $this->getCurrentViewPath().'/'.$filename;

      $filename_path = $docx->createDocx($filename);
      

      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename='.$onlyfilename);
      header('Content-Transfer-Encoding: binary');
      header('Expires: 0');
      header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
      header('Pragma: public');
      header('Content-Length: ' . filesize($filename_path));
      ob_clean();
      flush();
      readfile($filename_path);
      unlink($filename_path);
      exit;
    }
  
    public function getCurrentViewPath() {
        $controllername = $this->getId();
        $modulename = $this->module->getName();
        $newPath = "application.modules.{$modulename}.views.{$controllername}";
        $newPath = YiiBase::getPathOfAlias($newPath);
        return $newPath;
    }

    private function convertDate($date) {
        if ( empty($date) ) {
            return $date;
        }else {    
            list($ps_day, $ps_month, $ps_year) = explode('-', $date);
            return $ps_year . '-' . $ps_month . '-' . $ps_day;
        }
    }

    private function deconvertDate($date) {
        if ( empty($date) ) {
            return $date;
        }
        list($ps_year, $ps_month, $ps_day) = explode('-', $date);
        return $ps_day . '-' . $ps_month . '-' . $ps_year;
    }

    private function loadIdp($params = array()) {
        $idp = Idp::model()->find('departement_id = :dp 
                                AND peserta_id = :ptid 
                                AND penilaian_id = :pid', array(':dp' => $params['departement_id'],
            ':ptid' => $params['peserta_id'],
            ':pid' => $params['penilaian_id'])
        );
        return $idp;
    }

    private function loadDetailIdpByMaster($idp) {
        $detailIdp = DetailIdp::model()->findAll('idp_id = :idp', array(':idp' => $idp));
        return $detailIdp;
    }

    private function loadDetailIdp($params = array()) {
        $detailIdp = DetailIdp::model()->find('idp_id = :idp 
                                             AND departement_id = :dip
                                             AND kompetensi_id = :kid
                                             AND jenispengembangan_id = :jid
                                             AND level_sp_id = :lid
                                             AND leveldetail_sp_id = :ldid', array(':idp' => $params['idp'],
            ':dip' => $params['departement_id'],
            ':kid' => $params['kompetensi_id'],
            ':jid' => $params['jenispengembangan_id'],
            ':lid' => $params['level'],
            ':ldid' => $params['detaillevel'],
        ));
        return $detailIdp;
    }

}