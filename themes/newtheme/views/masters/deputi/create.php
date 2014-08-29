<?php
/* @var $this DeputiController */
/* @var $model Deputi */

$this->breadcrumbs=array(
	'Deputis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Deputi', 'url'=>array('index')),
	array('label'=>'Manage Deputi', 'url'=>array('admin')),
);
?>
<div class="contentinner content-dashboard">                
<div class="row-fluid">
  <div class="span16"> 
<?php $this->renderPartial('_submenu'); ?>
<div id="subcontainer">
<h1>Create Deputi</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>
</div>
</div>