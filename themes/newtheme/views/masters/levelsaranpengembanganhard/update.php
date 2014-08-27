<?php
/* @var $this SaranpengembanganController */
/* @var $model Saranpengembangan */

$this->breadcrumbs=array(
	'Saranpengembangans'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Saranpengembangan', 'url'=>array('index')),
	array('label'=>'Create Saranpengembangan', 'url'=>array('create')),
	array('label'=>'View Saranpengembangan', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Saranpengembangan', 'url'=>array('admin')),
);
?>
<div class="contentinner content-dashboard">                
<div class="row-fluid">
  <div class="span16"> 
<div class="header-page">
	
	<div style="float:left;vertical-align: middle;">
		<h2 class="textTitle">Update Level Saran Pengembangan Hard</h2>
	</div>
	<div style="float:right;">
		<?php $this->renderPartial('_submenu',array('model'=>$model)); ?>
	</div>
	<div style="clear:both;"></div>
	
</div>

<div class="container-page">
<?php echo $this->renderPartial('_form', array('model'=>$model,'detail'=>$detail)); ?>
<div style="clear: both"></div>
</div>
</div>
</div>
</div>