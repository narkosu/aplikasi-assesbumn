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

<div class="header-page">
	
	<div style="float:left;vertical-align: middle;">
		<h2 class="textTitle">Update Saran Pengembangan </h2>
	</div>
	<div style="float:right;">
		<?php $this->renderPartial('_submenu',array('params'=>$params,'model'=>$model)); ?>
	</div>
	<div style="clear:both;"></div>
	
</div>

<div class="container-page">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<div style="clear: both"></div>
</div>