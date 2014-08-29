<?php
/* @var $this UnitkerjaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Unitkerjas',
);

$this->menu=array(
	array('label'=>'Create Unitkerja', 'url'=>array('create')),
	array('label'=>'Manage Unitkerja', 'url'=>array('admin')),
);
?>
<div class="contentinner content-dashboard">                
<div class="row-fluid">
  <div class="span16"> 
<?php $this->renderPartial('_submenu'); ?>
<div id="subcontainer">
<h1>Unit Kerja</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'unitkerja-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'dept.name',
		'deput.deputi_name',
		'unitkerja_name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>
</div>
</div>
</div>
