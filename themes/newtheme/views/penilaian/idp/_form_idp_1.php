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
	
</style>
<?php

$ringkasan  = $kompetensiData['ringkasan'];
$countJP    = count($jenisPengembangan);

?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pesertaasesor-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php //echo $form->errorSummary($model); ?>
  
  <table id="tblkompetensi" style="width:100%;font-size:12px;border:1px solid #eee;">
    <tr>
      <th>Kompetensi</th>
      <th>Jenis Pengembangan</th>
      <th>Level</th>
      <th>Level Dibutuhkan</th>
      <th>Aktifitas Pengembangan</th>
      <th>Timeframe</th>
      <th>Review</th>
      <th>Tanggal Selesai</th>
    </tr>
    <?php foreach ( (array) $kompetensiData['ringkasan']['weakArray'] as $groupid=>$kompetensis) { ?>
      <?php foreach ( (array) $kompetensis as $kompetensiId=>$kompetensi) { 
        $getLevel = Assessment::model()->levelPengembangan($penilaian->id,$groupid,$kompetensiId);
        
        
        ?>
          <tr>
            <td rowspan="<?php echo $countJP+1?>" style="vertical-align:top;"><?php echo $kompetensi?></td>
          </tr>
          <?php 
          foreach ( (array) $jenisPengembangan as $jp){
            $nextlevel = implode(',',$getLevel->next_level);
            $spdet = LevelSaranpengembangan::model()
                                  ->detail($penilaian->departement_id,
                                            $kompetensiId,
                                            $jp->id,
                                            $nextlevel);
                ?>
              <tr>
                <td><?php echo $jp->nama_pengembangan;?></td>
                <td style="text-align:center;">
                  <?php
                  echo $getLevel->current;
                  ?>
                </td>
                <td style="text-align:center;"><?php echo implode(',',$getLevel->next_level)?></td>
                <td>
                  <ul>
                  <?php foreach ((array) $spdet->detail as $sardet) {
                  ?>
                    <li>
                  <?php echo $sardet->keterangan.'<br>';?>
                    </li>
                  <?php } ?>
                  </ul>
                </td>
                <td>
                  <?php                    
                  $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                          'name'=>'expectationDate_'.$kompetensiId.$jp->id,
                          // additional javascript options for the date picker plugin
                          'options'=>array(
                              'showAnim'=>'fold',
                          ),
                          'htmlOptions'=>array(
                              'style'=>'height:20px;width:50px;'
                          ),
                  ));                             
                  ?> 
                  <?php //echo $form->error($model,'start_date_time'); ?>
                  
                </td>
                <td><textarea></textarea></td>
                <td><?php                    
                  $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                          'name'=>'doneDate_'.$kompetensiId.$jp->id,
                          // additional javascript options for the date picker plugin
                          'options'=>array(
                              'showAnim'=>'fold',
                          ),
                          'htmlOptions'=>array(
                              'style'=>'height:20px;width:50px;'
                          ),
                  ));                             
                  ?></td>
              </tr>
          <?php
           }
          ?>
        
      <?php } ?>
    <?php } ?>
  </table>
  
  <?php /*
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
  */?>
<?php $this->endWidget(); ?>

</div><!-- form -->