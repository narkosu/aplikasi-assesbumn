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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'jeniskompetensi-hard-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'dept.name',
		'unitkerja.unitkerja_name',
		'skj.skj_name',
		'name',
		'nilai_persentase',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

</div>
