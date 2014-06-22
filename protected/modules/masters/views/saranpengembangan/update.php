<?php
/* @var $this SaranpengembanganController */
/* @var $model Saranpengembangan */

$this->breadcrumbs=array(
	'Saranpengembangans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Saranpengembangan', 'url'=>array('index')),
	array('label'=>'Create Saranpengembangan', 'url'=>array('create')),
	array('label'=>'View Saranpengembangan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Saranpengembangan', 'url'=>array('admin')),
);
?>

<h1>Update Saranpengembangan <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>