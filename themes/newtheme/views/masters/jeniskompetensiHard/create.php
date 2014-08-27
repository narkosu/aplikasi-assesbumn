<?php
/* @var $this JeniskompetensiHardController */
/* @var $model JeniskompetensiHard */

$this->breadcrumbs=array(
	'Jeniskompetensi Hards'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JeniskompetensiHard', 'url'=>array('index')),
	array('label'=>'Manage JeniskompetensiHard', 'url'=>array('admin')),
);
?>

<?php
/* @var $this JeniskompetensiHardController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jeniskompetensi Hards',
);

$this->menu=array(
	array('label'=>'Create JeniskompetensiHard', 'url'=>array('create')),
	array('label'=>'Manage JeniskompetensiHard', 'url'=>array('admin')),
);
?>

<div class="header-page">
	<div style="float:left;vertical-align: middle;">
		<h2 class="textTitle">Jenis Kompetensi Hard</h2>
	</div>
	<div style="float:right;">
		<?php $this->renderPartial('_submenu'); ?>
	</div>
	<div style="clear:both;"></div>
</div>

<div class="container-page">
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
