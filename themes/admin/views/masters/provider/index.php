<div class="header-page">
	<div style="float:left;vertical-align: middle;">
		<h2 class="textTitle">Daftar Provider</h2>
	</div>
	<div style="float:right;">
		<?php $this->renderPartial('_submenu'); ?>
	</div>
	<div style="clear:both;"></div>
</div>

<div class="container-page">
<div style="width:100%">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'provider-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nama_provider',
		'alamat',
		'contact_person',
		'no_telp',
		'jenis_service',
		/*
		'jenis_perusahaan',
		'keterangan',
		'created_at',
		'file',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
	</div>
</div>