<?php
/* @var $this KompetensiHardController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kompetensi Hards',
);

$this->menu=array(
	array('label'=>'Create KompetensiHard', 'url'=>array('create')),
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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kompetensi-hard-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'skj.skj_name',
		'jenisKompetensi.name',
		'name',
		
		/*
		'nilai',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>
    