<?php
/* @var $this JeniskompetensiController */
/* @var $model Jeniskompetensi */

$this->breadcrumbs=array(
	'Jeniskompetensis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Jeniskompetensi', 'url'=>array('index')),
	array('label'=>'Manage Jeniskompetensi', 'url'=>array('admin')),
);
?>
<div class="contentinner content-dashboard">                
<div class="row-fluid">
  <div class="span16"> 
<?php $this->renderPartial('_submenu'); ?>
<div id="subcontainer">
<h1>Tambah Jenis Kompetensi</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>
</div>
</div>