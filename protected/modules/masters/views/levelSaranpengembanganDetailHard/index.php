<?php
/* @var $this LevelSaranpengembanganDetailHardController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Level Saranpengembangan Detail Hards',
);

$this->menu=array(
	array('label'=>'Create LevelSaranpengembanganDetailHard', 'url'=>array('create')),
	array('label'=>'Manage LevelSaranpengembanganDetailHard', 'url'=>array('admin')),
);
?>

<h1>Level Saranpengembangan Detail Hards</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
