<?php
/* @var $this SaranpengembanganController */
/* @var $model Saranpengembangan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'saranpengembangan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'departemen_id'); ?>
		<?php echo $form->textField($model,'departemen_id'); ?>
		<?php echo $form->error($model,'departemen_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kompetensi_id'); ?>
		<?php echo $form->textField($model,'kompetensi_id'); ?>
		<?php echo $form->error($model,'kompetensi_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jenispengembangan_id'); ?>
		<?php echo $form->textField($model,'jenispengembangan_id'); ?>
		<?php echo $form->error($model,'jenispengembangan_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_saran'); ?>
		<?php echo $form->textArea($model,'nama_saran',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'nama_saran'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->