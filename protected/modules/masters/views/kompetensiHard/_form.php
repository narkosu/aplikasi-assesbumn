<?php
/* @var $this KompetensiHardController */
/* @var $model KompetensiHard */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kompetensi-hard-form',
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
		<?php echo $form->labelEx($model,'skj_id'); ?>
		<?php echo $form->textField($model,'skj_id'); ?>
		<?php echo $form->error($model,'skj_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jeniskompetensi_id'); ?>
		<?php echo $form->textField($model,'jeniskompetensi_id'); ?>
		<?php echo $form->error($model,'jeniskompetensi_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>145)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nilai'); ?>
		<?php echo $form->textField($model,'nilai'); ?>
		<?php echo $form->error($model,'nilai'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->