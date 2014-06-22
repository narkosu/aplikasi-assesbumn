<?php
/* @var $this JeniskompetensiHardController */
/* @var $model JeniskompetensiHard */

$this->breadcrumbs=array(
	'Jeniskompetensi Hards'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JeniskompetensiHard', 'url'=>array('index')),
	array('label'=>'Create JeniskompetensiHard', 'url'=>array('create')),
	array('label'=>'View JeniskompetensiHard', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage JeniskompetensiHard', 'url'=>array('admin')),
);
?>
<div class="header-page">
	<div style="float:left;vertical-align: middle;">
		<h2 class="textTitle">Update Jenis Kompetensi Hard</h2>
	</div>
	<div style="float:right;">
		<?php $this->renderPartial('_submenu'); ?>
	</div>
	<div style="clear:both;"></div>
</div>

<div class="container-page">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
