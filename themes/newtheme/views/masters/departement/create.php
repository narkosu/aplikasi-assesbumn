<?php
/* @var $this DepartementController */
/* @var $model Departement */

$this->breadcrumbs=array(
	'Departements'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Departement', 'url'=>array('index')),
	array('label'=>'Manage Departement', 'url'=>array('admin')),
);
?>
<div class="contentinner content-dashboard">                
<div class="row-fluid">
  <div class="span16">
<?php $this->renderPartial('_submenu'); ?>
<div id="subcontainer">
	<h1>Create Departement</h1>
	
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>
</div>
</div>