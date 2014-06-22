<?php
/* @var $this LevelSaranpengembanganDetailHardController */
/* @var $model LevelSaranpengembanganDetailHard */

$this->breadcrumbs=array(
	'Level Saranpengembangan Detail Hards'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LevelSaranpengembanganDetailHard', 'url'=>array('index')),
	array('label'=>'Manage LevelSaranpengembanganDetailHard', 'url'=>array('admin')),
);
?>

<h1>Create LevelSaranpengembanganDetailHard</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>