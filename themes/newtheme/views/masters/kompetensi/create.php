<?php
/* @var $this KompetensiController */
/* @var $model Kompetensi */

$this->breadcrumbs=array(
	'Kompetensis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kompetensi', 'url'=>array('index')),
	array('label'=>'Manage Kompetensi', 'url'=>array('admin')),
);
?>
<div class="contentinner content-dashboard">                
<div class="row-fluid">
  <div class="span16"> 
<div class="header-page">
	<div style="float:left;vertical-align: middle;">
		<h2 class="textTitle">Kompetensi</h2>
	</div>
	<div style="float:right;">
		<?php $this->renderPartial('_submenu'); ?>
	</div>
	<div style="clear:both;"></div>
</div>

<div class="container-page">

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>
</div>
</div>