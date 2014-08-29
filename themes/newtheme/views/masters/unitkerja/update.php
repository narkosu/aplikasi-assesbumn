<?php
/* @var $this UnitkerjaController */
/* @var $model Unitkerja */

$this->breadcrumbs=array(
	'Unitkerjas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Unitkerja', 'url'=>array('index')),
	array('label'=>'Create Unitkerja', 'url'=>array('create')),
	array('label'=>'View Unitkerja', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Unitkerja', 'url'=>array('admin')),
);
?>
<div class="contentinner content-dashboard">                
<div class="row-fluid">
  <div class="span16"> 
<?php $this->renderPartial('_submenu'); ?>
<div id="subcontainer">
<h1>Update Unit Kerja</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>
</div>
</div>