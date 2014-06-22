<?php
/* @var $this KompetensiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kompetensis',
);

$this->menu=array(
	array('label'=>'Create Kompetensi', 'url'=>array('create')),
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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kompetensi-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'dept.name',
		array('header'=>'Jenis Kompetensi','name'=>'jenkom.name'),
		'name',
		'alias',
		'nilai',
		/*
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>
