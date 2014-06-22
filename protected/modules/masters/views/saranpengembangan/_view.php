<?php
/* @var $this SaranpengembanganController */
/* @var $data Saranpengembangan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('departemen_id')); ?>:</b>
	<?php echo CHtml::encode($data->departemen_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kompetensi_id')); ?>:</b>
	<?php echo CHtml::encode($data->kompetensi_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenispengembangan_id')); ?>:</b>
	<?php echo CHtml::encode($data->jenispengembangan_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_saran')); ?>:</b>
	<?php echo CHtml::encode($data->nama_saran); ?>
	<br />


</div>