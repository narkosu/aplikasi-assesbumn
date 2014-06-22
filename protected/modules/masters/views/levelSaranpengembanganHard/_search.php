<?php
/* @var $this LevelSaranpengembanganHardController */
/* @var $model LevelSaranpengembanganHard */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'departemen_id'); ?>
		<?php echo $form->textField($model,'departemen_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kompetensi_id'); ?>
		<?php echo $form->textField($model,'kompetensi_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jenispengembangan_id'); ?>
		<?php echo $form->textField($model,'jenispengembangan_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'level'); ?>
		<?php echo $form->textField($model,'level'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keterangan'); ?>
		<?php echo $form->textArea($model,'keterangan',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->