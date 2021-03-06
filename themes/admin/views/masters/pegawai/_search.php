<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="rowrecord">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->label($model,'id_departemen'); ?>
		<?php echo $form->textField($model,'id_departemen'); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->label($model,'nip'); ?>
		<?php echo $form->textField($model,'nip',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->label($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->label($model,'id_jabatan'); ?>
		<?php echo $form->textField($model,'id_jabatan',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->label($model,'pendidikan'); ?>
		<?php echo $form->textField($model,'pendidikan',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->label($model,'tempat_lahir'); ?>
		<?php echo $form->textField($model,'tempat_lahir',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->label($model,'tgl_lahir'); ?>
		<?php echo $form->textField($model,'tgl_lahir'); ?>
	</div>

	<div class="rowrecord buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->