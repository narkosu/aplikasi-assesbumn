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

<div class="header-page">
	<div style="float:left;vertical-align: middle;">
		<h2 class="textTitle">Jenis Kompetensi Hard</h2>
	</div>
	<div style="float:right;">
		<?php $this->renderPartial('_submenu'); ?>
	</div>
	<div style="clear:both;"></div>
</div>

<div class="container-page">
    
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'dept.name',
		'unitkerja.unitkerja_name',
		'skj.skj_name',
		'name',
		'nilai_persentase',
	),
)); ?>
</div>

