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

	<div class="row">
		<?php echo $form->labelEx($model,'departement_id'); ?>
		<?php echo $form->textField($model,'departement_id'); ?>
		<?php echo $form->error($model,'departement_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unitkerja_id'); ?>
		<?php echo $form->textField($model,'unitkerja_id'); ?>
		<?php echo $form->error($model,'unitkerja_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'skj_id'); ?>
		<?php echo $form->textField($model,'skj_id'); ?>
		<?php echo $form->error($model,'skj_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nilai_persentase'); ?>
		<?php echo $form->textField($model,'nilai_persentase'); ?>
		<?php echo $form->error($model,'nilai_persentase'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->