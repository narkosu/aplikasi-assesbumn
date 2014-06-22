<?php
/* @var $this SaranpengembanganController */
/* @var $model Saranpengembangan */

$this->breadcrumbs=array(
	'Saranpengembangans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Saranpengembangan', 'url'=>array('index')),
	array('label'=>'Create Saranpengembangan', 'url'=>array('create')),
	array('label'=>'Update Saranpengembangan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Saranpengembangan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Saranpengembangan', 'url'=>array('admin')),
);
?>

<h1>View Saranpengembangan #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'departemen_id',
		'kompetensi_id',
		'jenispengembangan_id',
		'nama_saran',
	),
)); ?>
