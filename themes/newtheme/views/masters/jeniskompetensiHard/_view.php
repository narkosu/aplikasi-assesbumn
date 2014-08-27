<?php
/* @var $this JeniskompetensiHardController */
/* @var $data JeniskompetensiHard */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('departement_id')); ?>:</b>
	<?php echo CHtml::encode($data->departement_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unitkerja_id')); ?>:</b>
	<?php echo CHtml::encode($data->unitkerja_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skj_id')); ?>:</b>
	<?php echo CHtml::encode($data->skj_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nilai_persentase')); ?>:</b>
	<?php echo CHtml::encode($data->nilai_persentase); ?>
	<br />


</div>