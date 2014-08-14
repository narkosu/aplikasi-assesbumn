<?php
/* @var $this MasterskjController */
/* @var $model Masterskj */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'masterskj-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model,'','',array('class'=>'alert-error')); ?>

<div class="form">
	<div class="record">
		<?php
		$list=CHtml::listData(Departement::model()->findAll(), 'id', 'name');;
		?>
		<?php echo $form->labelEx($model,'departement_id'); ?>
		<?php echo $form->dropDownList($model, 'departement_id',$list, array('empty' => 'Departement'));
		?>
		<?php echo $form->error($model,'departement_id'); ?>
	</div>

	<div class="record">
		<?php echo $form->labelEx($model,'skj_name'); ?>
		<?php echo $form->textField($model,'skj_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'skj_name'); ?>
	</div>
  
  <div class="record">
		<?php echo $form->labelEx($model,'tahun'); ?>
		<?php echo $form->textField($model,'tahun',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'tahun'); ?>
	</div>
  <div class="record">
		<?php echo $form->labelEx($model,'tgl_selesai'); ?>
		<?php echo $form->textField($model,'tgl_selesai',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'tgl_selesai'); ?>
	</div>  
<div class="record">
		
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model, 'type',array('1'=>'Soft Kompetensi','2'=>'Hard Kompetensi'), array('empty' => 'Type'));
		?>
		<?php echo $form->error($model,'type'); ?>
	</div>
    <?php /*
	<div class="record">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
*/?>
	<div class="record buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'button pill')); ?>
	</div>

</div><!-- form -->
<?php $this->endWidget(); ?>
