<?php
/* @var $this PesertaController */
/* @var $model Peserta */

$this->breadcrumbs=array(
	'Pesertas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Peserta', 'url'=>array('index')),
	array('label'=>'Manage Peserta', 'url'=>array('admin')),
);
?>
<div class="contentinner content-dashboard">                
<div class="row-fluid">
  <div class="span16"> 
<div class="header-page">
	
	<div style="float:left;vertical-align: middle;">
		<h2 class="textTitle">Level Saran Pengembangan Hard</h2>
	</div>
	<div style="float:right;">
		<?php $this->renderPartial('_submenu',array('model'=>$model)); ?>
	</div>
	<div style="clear:both;"></div>
	
</div>

<div class="container-page">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<div style="clear: both"></div>
</div>
</div>
</div>
</div>