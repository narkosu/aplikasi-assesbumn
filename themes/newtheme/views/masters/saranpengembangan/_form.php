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
<?php /*
	<div class="rowrecord">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>
*/ ?>
	<div class="rowrecord">
  <?php
		$list=CHtml::listData(Departement::model()->findAll(), 'id', 'name');;
		?>
		<?php echo $form->labelEx($model,'departemen_id'); ?>
		<?php echo $form->dropDownList($model, 'departemen_id',$list, array('empty' => 'Departement'));
		?>
		<?php echo $form->error($model,'departemen_id'); ?>
	</div>

	<div class="rowrecord">
       <?php
		$komlist=CHtml::listData(Kompetensi::model()->findAll('departement_id = 3'), 'id', 'name');
		?>
		<?php echo $form->labelEx($model,'kompetensi_id'); ?>
		<?php echo $form->dropDownList($model, 'kompetensi_id',$komlist, array('empty' => 'Kompetensi'));?>
		<?php echo $form->error($model,'kompetensi_id'); ?>
	</div>

	<div class="rowrecord">
    <?php
		$jplist=CHtml::listData(JenisPengembangan::model()->findAll('departemen_id = 3'), 'id', 'nama_pengembangan');
		?>
		<?php echo $form->labelEx($model,'jenispengembangan_id'); ?>
    <?php echo $form->dropDownList($model, 'jenispengembangan_id',$jplist, array('empty' => 'Jenis Pengembangan'));?>
		<?php echo $form->error($model,'jenispengembangan_id'); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'nama_saran'); ?>
		<?php echo $form->textArea($model,'nama_saran',array('rowrecords'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'nama_saran'); ?>
	</div>

	<div class="rowrecord buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->