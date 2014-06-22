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
  if ( empty($loadedPriority[$valueDetail->kompetensi_id]) ){
      $loadedPriority[$valueDetail->kompetensi_id] = '';
  }
  
  $idpID = $valueDetail->idp_id;
  $idxName =  $valueDetail->kompetensi_id . '_' .
              $valueDetail->jenispengembangan_id . '_' .
              $valueDetail->level_sp_id . '_' .
              $valueDetail->leveldetail_sp_id;
  
  if ( empty($isLoaded[$valueDetail->kompetensi_id]) ){
    $isLoaded[$valueDetail->kompetensi_id] = true;

    $loaded .= "$('#titleKompetensi_".$valueDetail->kompetensi_id."').trigger('click');";
   
  }
  
  $loadedPriority[$valueDetail->kompetensi_id] .= "$(document).find('#PriorityIdp_jenispengembangan_id_".$idxName."').trigger('click');";
  
}

/*------------*/

$ringkasan = $kompetensiData['ringkasan'];
$countJP = count($jenisPengembangan);

?>
<?php if ( Yii::app()->user->hasFlash('idp_success') ) { ?>
<div class="alert alert-success">
    <?php echo Yii::app()->user->getFlash('idp_success');?>
</div>
<?php } ?>
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
      <td style="vertical-align:top;" ><?php echo $peserta->nama_peserta; ?></td>
      <td style="vertical-align:top;">
          <?php echo $form->textField($idp,'jabatan',array('size'=>20, 'style'=>'width:106px')); ?>
      </td>
      <td style="vertical-align:top;">
          <?php echo $form->textField($idp,'unit_kerja',array('size'=>20, 'style'=>'width:106px')); ?>
      </td>
      <td style="vertical-align:top;">
          <?php echo $form->textField($idp,'atasan',array('size'=>20, 'style'=>'width:106px')); ?>
      </td>
      <td style="vertical-align:top;">
        <?php 
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'periode_start',
            'value'=>$idp->periode_start,
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat'=>'dd-mm-yy',
                
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;width:50px;',
                
            ),
        ));
        ?> - 
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'periode_end',
            'value'=>$idp->periode_end,
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat'=>'dd-mm-yy'
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;width:50px;',
                
            ),
        ));
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
            <?php
            /* echo CHtml::activeCheckBox($priorityIdp, 'kompetensi_id[' . $kompetensiId . ']', array('class' => 'checkPriority',
              'value'=>$kompetensiId,
              'ajax' =>
              array(
              'type' => 'POST',
              'url' => CController::createUrl('/penilaian/idp/loadpriority'),
              'dataType' => 'json',
              'success' => "js:function(res){
              var depId = $('#departement_id').val();

              if ($('#PriorityIdp_kompetensi_id_'+res.kompetensi_id).is(':checked') ){
              $('#interface_'+res.kompetensi_id).show();
              $(res.html).insertAfter('#interface_'+res.kompetensi_id);

              $('#priority_'+res.kompetensi_id).html($('#title_'+res.kompetensi_id).html());
              }else{
              $('#priority_'+res.kompetensi_id).html('');
              $('.'+res.group_class).hide();
              $('#interface_'+res.kompetensi_id).hide();
              }
              }",
              //"update'=>'#loadKompetensi',
              'data'=>array('nextlevel'=>$getLevel->next_level,'kompetensi_id'=>'js:this.value','kompetensi_name'=>$kompetensi,'departement_id'=>$penilaian->departement_id),
              ),
              'return' => true
              )
              ) */
            ?>

            <span id="title_<?php echo $kompetensiId ?>">
              <?php
              
              echo CHtml::ajaxLink($kompetensi, CController::createUrl('/penilaian/idp/Loadjenispengembangan'), array(
                  'type' => 'POST',
                  'url' => CController::createUrl('/penilaian/idp/Loadjenispengembangan'),
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
                                    ". ( empty($loadedPriority[$kompetensiId]) ? '' : $loadedPriority[$kompetensiId]) ."
                                   
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
    <?php } 
    
    ?>
    <tr id="trActivity">
      <th>Aktifitas</th>
      <th>Timeframe</th>
      <th>Tujuan</th>
      <th>Bukti</th>
      <th>Status/Tanggal</th>
    </tr>
    
    <?php echo $activityInterface ?>
  </table>

  
    <div class="rowrecord buttons">
    <?php echo CHtml::Button($penilaian->isNewRecord ? 'Create' : 'Save',array('id'=>'saveAll')); ?>
    </div>
  
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
              $("#timeframe_"+idxName).val(res.timeframe);
              $("#bukti_"+idxName).val(res.bukti);
              $("#tujuan_"+idxName).find('option[value="'+res.tujuan+'"]').attr('selected','selected');
              $("#approve_date_"+idxName).val(res.approve_date);
              $("#aktifitas_"+idxName).val(res.aktifitas);
              
              if ( res.aktifitas != '')
                $("#keterangan_aktifitas_"+idxName).html(res.aktifitas);
              if ( res.status == 1){
                $("#status_"+idxName).attr('checked','checked');
              }else{
                $("#status_"+idxName).removeAttr('checked');
              }
            }
              
              
        },
       'data':{'idp_id':idpid,'dept_id':deptid,'kompid':kompid,'jepengid':jepengid,'level':level,'leveldetail':leveldetail}
      });
    }).delegate('.aktifitas_edit','click',function(){
        var relindex = $(this).attr('relindex');
        $("#aktifitas_"+relindex).show();
        $('.aktifitas_edit[relindex="'+relindex+'"]').hide();
        $('.aktifitas_ubah[relindex="'+relindex+'"]').show();
        $('.aktifitas_cancel[relindex="'+relindex+'"]').show();
    
    }).delegate('.aktifitas_cancel','click',function(){
        var relindex = $(this).attr('relindex');
        $("#aktifitas_"+relindex).hide();
        $('.aktifitas_edit[relindex="'+relindex+'"]').show();
        $('.aktifitas_ubah[relindex="'+relindex+'"]').hide();
        $('.aktifitas_cancel[relindex="'+relindex+'"]').hide();
    
    }).delegate('.aktifitas_ubah','click',function(){
        var relindex = $(this).attr('relindex');
        var value = $("#aktifitas_"+relindex).val();
        
        if ( value != ''){
            $("#keterangan_aktifitas_"+relindex).html(value);
        }else{
            $("#keterangan_aktifitas_"+relindex)
                    .html($("#keterangan_aktifitas_"+relindex)
                    .attr('original'));
        }
        
        $("#aktifitas_"+relindex).hide();
        
        $('.aktifitas_edit[relindex="'+relindex+'"]').show();
        $('.aktifitas_ubah[relindex="'+relindex+'"]').hide();
        $('.aktifitas_cancel[relindex="'+relindex+'"]').hide();
    
    });
    
    $("#saveAll").click(function(){
      var $data = $("#idp-form").serialize();
    $.ajax({'type' : 'post',
        'url': '<?php echo Yii::app()->createUrl('penilaian/idp/save')?>',
        'dataType' : 'json',
        'success' : function(res){
            window.location.href = '<?php echo Yii::app()->createUrl('penilaian/idp/sethard/id/'.$peserta->id)?>'; 
            
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