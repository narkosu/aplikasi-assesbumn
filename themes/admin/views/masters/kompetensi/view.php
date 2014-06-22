<?php
/* @var $this KompetensiController */
/* @var $model Kompetensi */

$this->breadcrumbs=array(
	'Kompetensis'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Kompetensi', 'url'=>array('index')),
	array('label'=>'Create Kompetensi', 'url'=>array('create')),
	array('label'=>'Update Kompetensi', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Kompetensi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kompetensi', 'url'=>array('admin')),
);
?>
<div class="header-page">
	<div style="float:left;vertical-align: middle;">
		<h2 class="textTitle">Kompetensi</h2>
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
		'jenkom.name',
		'name',
		'alias',
		'nilai',
		
	),
)); ?>
</div>
