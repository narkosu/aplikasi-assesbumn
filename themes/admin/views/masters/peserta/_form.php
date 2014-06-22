<?php
/* @var $this PesertaController */
/* @var $model Peserta */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'peserta-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($model,'','',array('class'=>'alert-error')); ?>
<?php if ( Yii::app()->user->hasFlash('update_success') ) { ?>
<div class="alert-success"><?php echo Yii::app()->user->getFlash('update_success')?></div>
<?php } ?>
<div class="form">

	<div class="rowrecord">
		<?php
		$list=CHtml::listData(Departement::model()->findAll(), 'id', 'name');;
		?>
		<?php echo $form->labelEx($model,'id_departemen'); ?>
		<?php echo $form->dropDownList($model, 'id_departemen',$list, array('empty' => 'Departement'));
		?>
		<?php echo $form->error($model,'id_departemen'); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'nip'); ?>
		<?php echo $form->textField($model,'nip',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nip'); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'nama_peserta'); ?>
		<?php echo $form->textField($model,'nama_peserta',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nama_peserta'); ?>
	</div>
 
  <div class="rowrecord">
		<?php echo $form->labelEx($model,'tmt_jabatan'); ?>
		<?php echo $form->textField($model,'tmt_jabatan',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'tmt_jabatan'); ?>
	</div>  
  
  <div class="rowrecord">
		<?php echo $form->labelEx($model,'golongan'); ?>
		<?php echo $form->textField($model,'golongan',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'golongan'); ?>
	</div>    
    
  <div class="rowrecord">
		<?php echo $form->labelEx($model,'tmt_golongan'); ?>
		<?php echo $form->textField($model,'tmt_golongan',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'tmt_golongan'); ?>
	</div>
  
  <div class="rowrecord">
		<?php echo $form->labelEx($model,'eselon'); ?>
		<?php echo $form->textField($model,'eselon',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'eselon'); ?>
	</div>
  
  <div class="rowrecord">
		<?php echo $form->labelEx($model,'tmt_eselon'); ?>
		<?php echo $form->textField($model,'tmt_eselon',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'tmt_eselon'); ?>
	</div>
  
  <div class="rowrecord">
		<?php echo $form->labelEx($model,'pendidikan'); ?>
		<?php echo $form->textField($model,'pendidikan',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'pendidikan'); ?>
	</div>  
  <div class="rowrecord">
		<?php echo $form->labelEx($model,'pelatihan'); ?>
      <div id="form_pelatihan">  
        <?php if ( !$model->isNewRecord ) { 
        $newPelatihan =  explode('|',$model->pelatihan);    
        foreach ( $newPelatihan as $pelatihan ) {
        ?>  
        <input size="30" maxlength="30" name="Peserta[pelatihan][]" id="Peserta_pelatihan_0" type="text" value="<?php echo $pelatihan?>"><br>
        <?php 
            }

        } else { ?>
            <input size="30" maxlength="30" name="Peserta[pelatihan][]" id="Peserta_pelatihan_0" type="text" value=""><br>
            <input size="30" maxlength="30" name="Peserta[pelatihan][]" id="Peserta_pelatihan_2" type="text" value=""><br>
            <input size="30" maxlength="30" name="Peserta[pelatihan][]" id="Peserta_pelatihan_3" type="text" value=""><br>
        <?php } ?>
      </div>    
        <div><button type="button" id="new_pelatihan" class="button pill">Tambah pelatihan</button></div>    
		<?php /* echo $form->textField($model,'pendidikan',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'pendidikan'); */ ?>
	</div> 
    
  <?php if ( !$model->isNewRecord ) { ?>
  <div class="rowrecord">
		<?php echo Chtml::checkBox('ismember',($_POST['ismember'] == 1 ? true :false),array('style'=>'float:left;margin-right:5px;'));//$form->labelEx($model,'nama_peserta'); ?>
		<?php echo Chtml::label('set / update hak akses','ismember'); ?>
		
	</div>
  <div class="rowrecord">
		<?php echo $form->labelEx($user,'username'); ?>
		<?php echo $form->textField($user,'username',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($user,'username'); ?>
	</div>
  
  <div class="rowrecord">
		<?php echo $form->labelEx($user,'password'); ?>
		<?php echo $form->passwordField($user,'password',array('value'=>'','size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($user,'password'); ?>
	</div>
  <?php } ?>
	<div class="rowrecord buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'button pill')); ?>
	</div>

</div><!-- form -->
<?php $this->endWidget(); ?>

<?php 
Yii::app()->clientScript->registerScript('formpelatihan', "
$('#new_pelatihan').click(function(){
    $('#form_pelatihan').append('<input size=\"30\" maxlength=\"30\" name=\"Peserta[pelatihan][]\" type=\"text\" value=\"\"><br>');
});

");
?>