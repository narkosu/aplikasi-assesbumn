<?php
/* @var $this JeniskompetensiHardController */
/* @var $model JeniskompetensiHard */

$this->breadcrumbs=array(
	'Jeniskompetensi Hards'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JeniskompetensiHard', 'url'=>array('index')),
	array('label'=>'Manage JeniskompetensiHard', 'url'=>array('admin')),
);
?>

<h1>Create JeniskompetensiHard</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>