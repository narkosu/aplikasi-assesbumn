<?php
/* @var $this JeniskompetensiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jeniskompetensis',
);

$this->menu=array(
	array('label'=>'Create Jeniskompetensi', 'url'=>array('create')),
	array('label'=>'Manage Jeniskompetensi', 'url'=>array('admin')),
);
?>
<div class="contentinner content-dashboard">                
<div class="row-fluid">
  <div class="span16"> 

<div id="subcontainer">
<h1>Jenis Kompetensi</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'unitkerja-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'dept.name',
		'name',
		'keterangan',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>
</div>
</div>
</div>
