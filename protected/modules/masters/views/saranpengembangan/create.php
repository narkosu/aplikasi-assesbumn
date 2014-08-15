<?php
/* @var $this SaranpengembanganController */
/* @var $model Saranpengembangan */

$this->breadcrumbs=array(
	'Saranpengembangans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Saranpengembangan', 'url'=>array('index')),
	array('label'=>'Manage Saranpengembangan', 'url'=>array('admin')),
);
?>

<h1>Create Saranpengembangan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>