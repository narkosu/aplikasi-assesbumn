<?php
/* @var $this KompetensiHardController */
/* @var $model KompetensiHard */

$this->breadcrumbs=array(
	'Kompetensi Hards'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List KompetensiHard', 'url'=>array('index')),
	array('label'=>'Create KompetensiHard', 'url'=>array('create')),
	array('label'=>'View KompetensiHard', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage KompetensiHard', 'url'=>array('admin')),
);
?>

<h1>Update KompetensiHard <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>