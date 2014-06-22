<?php
/* @var $this KompetensiHardController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kompetensi Hards',
);

$this->menu=array(
	array('label'=>'Create KompetensiHard', 'url'=>array('create')),
	array('label'=>'Manage KompetensiHard', 'url'=>array('admin')),
);
?>

<h1>Kompetensi Hards</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
