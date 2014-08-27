<?php
/* @var $this LevelSaranpengembanganDetailHardController */
/* @var $model LevelSaranpengembanganDetailHard */

$this->breadcrumbs=array(
	'Level Saranpengembangan Detail Hards'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LevelSaranpengembanganDetailHard', 'url'=>array('index')),
	array('label'=>'Create LevelSaranpengembanganDetailHard', 'url'=>array('create')),
	array('label'=>'Update LevelSaranpengembanganDetailHard', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LevelSaranpengembanganDetailHard', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LevelSaranpengembanganDetailHard', 'url'=>array('admin')),
);
?>

<h1>View LevelSaranpengembanganDetailHard #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_saranpengembangan',
		'keterangan',
	),
)); ?>
