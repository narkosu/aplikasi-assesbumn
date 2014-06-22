<?php
/* @var $this LevelSaranpengembanganDetailHardController */
/* @var $data LevelSaranpengembanganDetailHard */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_saranpengembangan')); ?>:</b>
	<?php echo CHtml::encode($data->id_saranpengembangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />


</div>