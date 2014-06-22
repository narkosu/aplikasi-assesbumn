<style>
  #tblkompetensi td.nilaikompetensi{
    text-align:center;

  }

  #tblkompetensi{
    border: 1px solid #aaa;		
  }
  #tblkompetensi td.nilaikompetensi{
    text-align:center;
    border:1px solid #aaa;
  }

  #tblkompetensi tr td:first-child{
    padding-left:10px;
  }

  #tblkompetensi th{
    text-align:center;
    background: #eee;
    border:1px solid #aaa;
  }
  #tblkompetensi tr.jeniskompetensi td{
    text-align:center;
    border:1px solid #aaa;
    background: #fff;

  }
  #tblkompetensi td{
    border:1px solid #aaa;
  }
  .subTable td.first{
    border-left:0px !important;
  }
  .subTable td.last{
    border-right:0px !important;
  }
  .subTable td._top{
    border-top:0px !important;
  }
  .container-page{
    border:0px !important;
  }
</style>
<?php
$isLoaded = array();
$loadedPriority = array();
$loaded = '';
$idpID = '';
foreach ((array) $loadIdpByMaster as $valueDetail){
  $idpID = $valueDetail->idp_id;
  $idxName =  $valueDetail->kompetensi_id . '_' .
              $valueDetail->jenispengembangan_id . '_' .
              $valueDetail->level_sp_id . '_' .
              $valueDetail->leveldetail_sp_id;
  
  if ( !$isLoaded[$valueDetail->kompetensi_id] ){
    $isLoaded[$valueDetail->kompetensi_id] = true;

    $loaded .= "$('#titleKompetensi_".$valueDetail->kompetensi_id."').trigger('click');";
   
  }
  
  $loadedPriority[$valueDetail->kompetensi_id] .= "$(document).find('#PriorityIdp_jenispengembangan_id_".$idxName."').trigger('click');";
  
}

/*------------*/

$ringkasan = $kompetensiData['ringkasan'];
$countJP = count($jenisPengembangan);
?>

<div  class="form" style="border:0px;padding:0px">
  
  <?php
  $form = $this->beginWidget('CActiveForm', array(
      'id' => 'idp-form',
      'enableAjaxValidation' => false,
  ));
  ?>
  <input type="hidden" id="departement_id" name="departement_id" value="<?php echo $penilaian->departement_id ?>">
  <input type="hidden" id="penilaian_id" name="penilaian_id" value="<?php echo $penilaian->id ?>">
  <input type="hidden" id="peserta" name="peserta" value="<?php echo $penilaian->peserta_id ?>">
  <input type="hidden" id="idpid" name="idpid" value="<?php echo $idpID ?>">
  <table id="tblkompetensi" style="width:100%;font-size:12px;border:1px solid #eee;">
    <tr>
      <th>Nama Lengkap</th>
      <th>Jabatan</th>
      <th>Unit Kerja</th>
      <th>Atasan Langsung</th>
      <th>Periode (1 Tahun)</th>

    </tr>
    <tr>
      <td ><?php echo $peserta->nama_peserta; ?></td>
      <td></td>
      <td></td>
      <td></td>
      <td>
        <?php
        echo $idp->periode_start;
        ?> s/d 
        <?php
        echo $idp->periode_end;
        ?>

      </td>

    </tr>
    <tr>
      <th style="width:500px;">Kompetensi</th>
      <th>Level yang dicapai</th>
      <th>Level yang dibutuhkan</th>
      <th>Prioritas</th>
      <th>Level yang harus dicapai</th>

    </tr>
    <?php
    $activityInterface = '';
    foreach ((array) $kompetensiData['ringkasan']['weakArray'] as $groupid => $kompetensis) {
      ?>
      <?php
      foreach ((array) $kompetensis as $kompetensiId => $kompetensi) {
        $activityInterface .= '<tr style="display:none;" id="subinterface_' . $kompetensiId . '" class="activity_' . $kompetensiId . '"><td colspan="5"><b>' . $kompetensi . '</b></td></tr>';
        //$sub_activityInterface =  '<tr style="display:none;" id="interface_'.$kompetensiId.'" class="activity_'.$kompetensiId.'"><td colspan="5"></td></tr>';
        $getLevel = Assessment::model()->levelPengembangan($penilaian->id, $groupid, $kompetensiId);
        ?>
        <tr id="interface_<?php echo $kompetensiId ?>">
          <td style="vertical-align:top;">
            <span id="title_<?php echo $kompetensiId ?>">
              <?php
              echo CHtml::ajaxLink($kompetensi, CController::createUrl('/penilaian/idp/LoadjenispengembanganPreview'), array(
                  'type' => 'POST',
                  'url' => CController::createUrl('/penilaian/idp/LoadjenispengembanganPreview'),
                  'dataType' => 'json',
                  'success' => "js:function(res){
                                    var depId = $('#departement_id').val();
                                    var thisBlock = $('#titleKompetensi_'+res.kompetensi_id);
                                    if (thisBlock.attr('isactive') == 'true' ){
                                      thisBlock.attr('isactive','false');
                                      
                                      $('.'+res.group_class).hide();
                                     
                                    }else{
                                      thisBlock.attr('isactive','true');
                                      $('#interface_'+res.kompetensi_id).show();
                                      $(res.html).insertAfter('#interface_'+res.kompetensi_id);
                                      $(res.subhtml)
                                        .insertAfter('#subinterface_'+res.kompetensi_id);

                                    }
                                    ".$loadedPriority[$kompetensiId]."
                                   
                                  }",
                  //"update'=>'#loadKompetensi',
                  
                  'data' =>
                      array('type_competence'=>$penilaian->type_competence,'nextlevel' => $getLevel->next_level, 'kompetensi_id' => $kompetensiId, 'kompetensi_name' => $kompetensi, 'departement_id' => $penilaian->departement_id),
                  ), 
                  array('rel-kompid' => $kompetensiId, 'id' => 'titleKompetensi_' . $kompetensiId, 'class' => 'showoff')
              );
              ?>
            </span></td>
          <td style="vertical-align:top;"><?php echo $getLevel->current ?></td>
          <td style="vertical-align:top;"><?php echo $getLevel->default ?></td>
          <td style="vertical-align:top;" id="priority_<?php echo $kompetensiId ?>"></td>
          <td style="vertical-align:top;"><?php echo implode(',', $getLevel->next_level) ?></td>
        </tr>
        <?php //echo $sub_activityInterface ?>
      <?php } ?>
    <?php } ?>
    <tr id="trActivity">
      <th>Aktifitas</th>
      <th>Timeframe</th>
      <th>Tujuan</th>
      <th>Bukti</th>
      <th>Status/Tanggal</th>
    </tr>
    
    <?php echo $activityInterface ?>
  </table>

    
  <?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
  /*<![CDATA[*/
  jQuery(function($) {
    $(".showoff").click(function() {
      if ($(this).attr('isactive') != 'true') {

        return true;
      } else {
        $('.activity_' + $(this).attr('rel-kompid')).toggle();
        return false;

      }
    });
    
    $(document).delegate(
    ".checkPriority",'click',function(){
      var kompid = $(this).attr('rel-kompid');  
      var deptid = $('#departement_id').val();  
      var idpid = $('#idpid').val();  
      var jepengid = $(this).attr('rel-jenispengembangan');  
      var level = $(this).attr('rel-level');  
      var leveldetail = $(this).attr('rel-leveldetail');  
      var elform = "form_" + kompid + "_" + jepengid + "_" + level + "_" + leveldetail;
      var groupjepengform = "form_" + kompid + "_" + jepengid;
      var idxName = kompid+'_'+jepengid+'_'+level+'_'+leveldetail;
      $("."+groupjepengform).show();
      $("."+elform).toggle();
      
      $.ajax({'type' : 'post',
        'url': '<?php echo Yii::app()->createUrl('penilaian/idp/loadpriority')?>',
        'dataType' : 'json',
        'success' : function(res){
            if (res.output){
              $("#timeframe_"+idxName).html(res.timeframe);
              $("#bukti_"+idxName).html(res.bukti);
              var $textTujuan = $("#tujuan_"+idxName).find('option[value="'+res.tujuan+'"]').html();
              $("#texttujuan_"+idxName).html($textTujuan);
              $("#tujuan_"+idxName).hide();
              $("#approve_date_"+idxName).html(res.approve_date);
              if ( res.status == 1){
                $("#status_"+idxName).html('Disetujui');
              }else{
                $("#status_"+idxName).html('Belum Disetujui');
              }
            }
              
              
        },
       'data':{'idp_id':idpid,'dept_id':deptid,'kompid':kompid,'jepengid':jepengid,'level':level,'leveldetail':leveldetail}
      });
    });
    
    $("#saveAll").click(function(){
      var $data = $("#idp-form").serialize();
    
      console.log($data);
      $.ajax({'type' : 'post',
        'url': '<?php echo Yii::app()->createUrl('penilaian/idp/save')?>',
        'dataType' : 'json',
        'success' : function(res){
          console.log('sudah diproses');
        },
       'data':$data
      });
    });
    
    <?php
    
    ?>
  });
  
</script>
<?php
Yii::app()->clientScript->registerScript('trigger', $loaded);
?>