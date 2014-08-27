<?php
/* @var $this LevelSaranpengembanganDetailHardController */
/* @var $model LevelSaranpengembanganDetailHard */

$this->breadcrumbs=array(
	'Level Saranpengembangan Detail Hards'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LevelSaranpengembanganDetailHard', 'url'=>array('index')),
	array('label'=>'Create LevelSaranpengembanganDetailHard', 'url'=>array('create')),
	array('label'=>'View LevelSaranpengembanganDetailHard', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LevelSaranpengembanganDetailHard', 'url'=>array('admin')),
);
?>
<div class="contentinner content-dashboard">                
<div class="row-fluid">
  <div class="span16"> 
<div class="header-page">
	
	<div style="float:left;vertical-align: middle;">
		<h2 class="textTitle">Level Saran Pengembangan Hard Detail : <?php echo $masterModel->jenpeng->nama_pengembangan?> </h2>
	</div>
	<div style="float:right;">
		<?php $this->renderPartial('_submenu',array('model'=>$model, 'masterModel'=>$masterModel)); ?>
	</div>
	<div style="clear:both;"></div>
	
</div>

<div class="container-page">
<?php echo $this->renderPartial('_form', array('model'=>$model, 'masterModel'=>$masterModel)); ?>
<div style="clear: both"></div>
</div>
</div>
</div>
</div>