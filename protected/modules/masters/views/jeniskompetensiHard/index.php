<?php
/* @var $this JeniskompetensiHardController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jeniskompetensi Hards',
);

$this->menu=array(
	array('label'=>'Create JeniskompetensiHard', 'url'=>array('create')),
	array('label'=>'Manage JeniskompetensiHard', 'url'=>array('admin')),
);
?>

<h1>Jeniskompetensi Hards</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
