<?php
/* @var $this MasterskjController */
/* @var $model Masterskj */

$this->breadcrumbs=array(
	'Masterskjs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Masterskj', 'url'=>array('index')),
	array('label'=>'Create Masterskj', 'url'=>array('create')),
	array('label'=>'View Masterskj', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Masterskj', 'url'=>array('admin')),
);
?>
<div class="contentinner content-dashboard">                
<div class="row-fluid">
  <div class="span16"> 
<div class="header-page">
	<div style="float:left;vertical-align: middle;">
		<h2 class="textTitle">Update SKJ <?php echo $model->skj_name; ?></h2>
	</div>
	<div style="float:right;">
		<?php $this->renderPartial('_submenu',array('params'=>$params)); ?>
	</div>
	<div style="clear:both;"></div>
</div>

<div class="container-page">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>
</div>
</div>