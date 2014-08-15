<?php
/* @var $this LevelSaranpengembanganHardController */
/* @var $model LevelSaranpengembanganHard */

$this->breadcrumbs=array(
	'Level Saranpengembangan Hards'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LevelSaranpengembanganHard', 'url'=>array('index')),
	array('label'=>'Manage LevelSaranpengembanganHard', 'url'=>array('admin')),
);
?>

<h1>Create LevelSaranpengembanganHard</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>