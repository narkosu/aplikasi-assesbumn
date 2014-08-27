<?php
/* @var $this PegawaiController */
/* @var $model Pegawai */
/* @var $form CActiveForm */
?>
<div class="header-page">
	
	<div style="float:left;vertical-align: middle;">
		<h2 class="textTitle">Form Pegawai</h2>
	</div>
	<div style="float:right;">
		<?php $this->renderPartial('_submenu',array('params'=>$params)); ?>
	</div>
	<div style="clear:both;"></div>
	
</div>

<div class="container-page">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pegawai-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<div class="rowrecord">
  <?php echo $form->labelEx($model,'id_departemen'); ?>
		<?php
		$list=CHtml::listData(Departement::model()->findAll(), 'id', 'name');;
		?>
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
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'id_jabatan'); ?>
		<?php echo $form->textField($model,'id_jabatan',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'id_jabatan'); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'pendidikan'); ?>
		<?php echo $form->textField($model,'pendidikan',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'pendidikan'); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'tempat_lahir'); ?>
		<?php echo $form->textField($model,'tempat_lahir',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'tempat_lahir'); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'tgl_lahir'); ?>
		<?php echo $form->textField($model,'tgl_lahir'); ?>
		<?php echo $form->error($model,'tgl_lahir'); ?>
	</div>

	
	<div class="rowrecord buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>