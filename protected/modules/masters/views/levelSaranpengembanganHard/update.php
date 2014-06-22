<?php
/* @var $this LevelSaranpengembanganHardController */
/* @var $model LevelSaranpengembanganHard */

$this->breadcrumbs=array(
	'Level Saranpengembangan Hards'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LevelSaranpengembanganHard', 'url'=>array('index')),
	array('label'=>'Create LevelSaranpengembanganHard', 'url'=>array('create')),
	array('label'=>'View LevelSaranpengembanganHard', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LevelSaranpengembanganHard', 'url'=>array('admin')),
);
?>

<h1>Update LevelSaranpengembanganHard <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>