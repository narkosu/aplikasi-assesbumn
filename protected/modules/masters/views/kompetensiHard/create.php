<?php
/* @var $this KompetensiHardController */
/* @var $model KompetensiHard */

$this->breadcrumbs=array(
	'Kompetensi Hards'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KompetensiHard', 'url'=>array('index')),
	array('label'=>'Manage KompetensiHard', 'url'=>array('admin')),
);
?>

<h1>Create KompetensiHard</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>