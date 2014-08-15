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
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'nama_provider'); ?>
		<?php echo $model->nama_provider; ?>
		
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'alamat'); ?>
		<?php echo $model->alamat; ?>
		
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'contact_person'); ?>
		<?php echo $model->contact_person; ?>
		
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'no_telp'); ?>
		<?php echo $model->no_telp ?>
		
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'jenis_service'); ?>
		<?php echo $model->jenis_service; ?>
		
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'jenis_perusahaan'); ?>
		<?php echo $model->jenis_perusahaan; ?>
		
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'keterangan'); ?>
		<?php echo $model->keterangan; ?>
		
	</div>

	<div class="rowrecord">
		<?php echo $form->labelEx($model,'file'); ?>
		<?php if ( !empty($model->file) ) { ?>
      <a href="<?php echo Yii::app()->createUrl('masters/provider/loadfile/filename/'.$model->file)?>"><?php echo $model->file ?></a>  
    <?php  } ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->
</div>