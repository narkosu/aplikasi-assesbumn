<?php
/* @var $this LevelSaranpengembanganDetailHardController */
/* @var $model LevelSaranpengembanganDetailHard */

$this->breadcrumbs=array(
	'Level Saranpengembangan Detail Hards'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LevelSaranpengembanganDetailHard', 'url'=>array('index')),
	array('label'=>'Create LevelSaranpengembanganDetailHard', 'url'=>array('create')),
	array('label'=>'View LevelSaranpengembanganDetailHard', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LevelSaranpengembanganDetailHard', 'url'=>array('admin')),
);
?>

<h1>Update LevelSaranpengembanganDetailHard <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>