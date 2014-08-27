<?php
$params = (empty($params) ? array() : $params);
/* @var $this ProviderController */
/* @var $model Provider */
/* @var $form CActiveForm */
?>
<div class="header-page">
	
	<div style="float:left;vertical-align: middle;">
		<h2 class="textTitle">Form Provider</h2>
	</div>
	<div style="float:right;">
		<?php $this->renderPartial('_submenu',array('params'=>$params)); ?>
	</div>
	<div style="clear:both;"></div>
	
</div>

<div class="container-page">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'provider-form',
	'enableAjaxValidation'=>false,
  'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>


	<div class="rowrecord">
		<?php echo $form->labelEx($model,'nama_provider'); ?>
		<?php echo $form->textField($model,'nama_provider',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nama_provider'); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'alamat'); ?>
		<?php echo $form->textField($model,'alamat',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'alamat'); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'contact_person'); ?>
		<?php echo $form->textField($model,'contact_person',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'contact_person'); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'no_telp'); ?>
		<?php echo $form->textField($model,'no_telp',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'no_telp'); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'jenis_service'); ?>
		<?php echo $form->textField($model,'jenis_service',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'jenis_service'); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'jenis_perusahaan'); ?>
		<?php echo $form->textField($model,'jenis_perusahaan',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'jenis_perusahaan'); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'keterangan'); ?>
		<?php echo $form->textArea($model,'keterangan',array('rowrecords'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'keterangan'); ?>
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'file'); ?>
		<?php echo $form->fileField($model,'file',array('size'=>60,'maxlength'=>255)); ?>
    <?php if ( !empty($model->file) ) { ?>
      <a href="<?php echo Yii::app()->createUrl('masters/provider/loadfile/filename/'.$model->file)?>"><?php echo $model->file ?></a>  
    <?php  } ?>
		<?php echo $form->error($model,'file'); ?>
	</div>

	<div class="rowrecord buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'button pill')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>