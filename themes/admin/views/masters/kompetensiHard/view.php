<?php
/* @var $this KompetensiHardController */
/* @var $model KompetensiHard */

$this->breadcrumbs=array(
	'Kompetensi Hards'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List KompetensiHard', 'url'=>array('index')),
	array('label'=>'Create KompetensiHard', 'url'=>array('create')),
	array('label'=>'Update KompetensiHard', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete KompetensiHard', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KompetensiHard', 'url'=>array('admin')),
);
?>

<div class="header-page">
	<div style="float:left;vertical-align: middle;">
		<h2 class="textTitle">Kompetensi Hard</h2>
	</div>
	<div style="float:right;">
		<?php $this->renderPartial('_submenu'); ?>
	</div>
	<div style="clear:both;"></div>
</div>

<div class="container-page">
<?php //echo $this->renderPartial('_form', array('model'=>$model)); ?>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'skj.skj_name',
		'jenisKompetensi.name',
		'name'
	),
)); ?>
</div>
