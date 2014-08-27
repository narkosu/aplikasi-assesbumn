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

	<div class="rowrecord">
  <?php
		$list=CHtml::listData(Departement::model()->findAll(), 'id', 'name');;
		?>
		<?php echo $form->labelEx($model,'departement_id'); ?>
		<?php echo $form->dropDownList($model, 'departement_id',$list, array('empty' => 'Departement'));
		?>
		<?php echo $form->error($model,'departement_id'); ?>
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
    <?php
		$jklist=CHtml::listData(JeniskompetensiHard::model()->findAll(), 'id', 'name');;
		?>
		<?php echo $form->labelEx($model,'jeniskompetensi_id'); ?>
		<?php echo $form->dropDownList($model, 'jeniskompetensi_id',$jklist, array('empty' => 'Jenis Kompetensi'));
		?>
		<?php echo $form->error($model,'jeniskompetensi_id'); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>145)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'alias'); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'nilai'); ?>
		<?php echo $form->textField($model,'nilai'); ?>
		<?php echo $form->error($model,'nilai'); ?>
	</div>
<?php /*
	<div class="rowrecord">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
*/?>
	<div class="rowrecord buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->