<?php
/* @var $this LevelSaranpengembanganHardController */
/* @var $model LevelSaranpengembanganHard */

$this->breadcrumbs=array(
	'Level Saranpengembangan Hards'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LevelSaranpengembanganHard', 'url'=>array('index')),
	array('label'=>'Create LevelSaranpengembanganHard', 'url'=>array('create')),
	array('label'=>'Update LevelSaranpengembanganHard', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LevelSaranpengembanganHard', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LevelSaranpengembanganHard', 'url'=>array('admin')),
);
?>

<h1>View LevelSaranpengembanganHard #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'departemen_id',
		'kompetensi_id',
		'jenispengembangan_id',
		'level',
		'keterangan',
	),
)); ?>
