<?php
/* @var $this JeniskompetensiHardController */
/* @var $model JeniskompetensiHard */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jeniskompetensi-hard-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="rowrecord">
  <?php echo $form->labelEx($model,'departement_id'); ?>
		<?php
		$list=CHtml::listData(Departement::model()->findAll(), 'id', 'name');;
		?>
		<?php echo $form->dropDownList($model, 'departement_id',$list, array('empty' => 'Departement'));
		?>
		<?php echo $form->error($model,'departement_id'); ?>
</div>

	<div class="rowrecord">
    <?php echo $form->labelEx($model,'unitkerja_id'); ?>
		<?php
		$uklist = (($model->isNewRecord) ?  
						CHtml::listData(Unitkerja::model()->findAll(),'id','unitkerja_name') : CHtml::listData(Unitkerja::model()->findAll('departement_id=:deptid', 
						array(':deptid'=>(int) $model->departement_id)), 'id', 'unitkerja_name'));
		?>
		<?php echo $form->dropDownList($model,'unitkerja_id',$uklist);
		?>
		<?php echo $form->error($model,'unitkerja_id'); ?>
	</div>

	<div class="rowrecord">
		<?php
		$skjlist=CHtml::listData(Masterskj::model()->findAll(), 'id', 'skj_name');;
		?>
		<?php echo $form->labelEx($model,'skj_id'); ?>
		<?php echo $form->dropDownList($model, 'skj_id',$skjlist, array('empty' => 'SKJ'));
		?>
		<?php echo $form->error($model,'skj_id'); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'nilai_persentase'); ?>
		<?php echo $form->textField($model,'nilai_persentase'); ?>
		<?php echo $form->error($model,'nilai_persentase'); ?>
	</div>

	<div class="rowrecord buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->