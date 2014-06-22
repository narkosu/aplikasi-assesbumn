<?php
/* @var $this JeniskompetensiHardController */
/* @var $model JeniskompetensiHard */

$this->breadcrumbs=array(
	'Jeniskompetensi Hards'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JeniskompetensiHard', 'url'=>array('index')),
	array('label'=>'Create JeniskompetensiHard', 'url'=>array('create')),
	array('label'=>'View JeniskompetensiHard', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage JeniskompetensiHard', 'url'=>array('admin')),
);
?>

<h1>Update JeniskompetensiHard <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>