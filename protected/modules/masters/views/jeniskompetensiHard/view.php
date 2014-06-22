<?php
/* @var $this JeniskompetensiHardController */
/* @var $model JeniskompetensiHard */

$this->breadcrumbs=array(
	'Jeniskompetensi Hards'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List JeniskompetensiHard', 'url'=>array('index')),
	array('label'=>'Create JeniskompetensiHard', 'url'=>array('create')),
	array('label'=>'Update JeniskompetensiHard', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete JeniskompetensiHard', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JeniskompetensiHard', 'url'=>array('admin')),
);
?>

<h1>View JeniskompetensiHard #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'departement_id',
		'unitkerja_id',
		'skj_id',
		'name',
		'nilai_persentase',
	),
)); ?>
