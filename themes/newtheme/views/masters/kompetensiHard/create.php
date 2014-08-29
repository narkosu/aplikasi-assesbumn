<?php
/* @var $this KompetensiHardController */
/* @var $model KompetensiHard */

$this->breadcrumbs=array(
	'Kompetensi Hards'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List KompetensiHard', 'url'=>array('index')),
	array('label'=>'Manage KompetensiHard', 'url'=>array('admin')),
);
?>
<div class="contentinner content-dashboard">                
<div class="row-fluid">
  <div class="span16"> 


<div class="header-page">
	<div style="float:left;vertical-align: middle;">
		<h2 class="textTitle">Tambah Kompetensi Hard</h2>
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

