<?php
/* @var $this PesertaasesorController */
/* @var $model Pesertaasesor */

$this->breadcrumbs=array(
	'Pesertaasesors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pesertaasesor', 'url'=>array('index')),
	array('label'=>'Manage Pesertaasesor', 'url'=>array('admin')),
);
?>

<div class="header-page">
	<div style="float:left;vertical-align: middle;">
		<h2 class="textTitle">RENCANA PENGEMBANGAN INDIVIDUAL : <?php echo $peserta->nama_peserta; ?></h2>
	</div>
	
	<div style="float:right;">
		<?php $this->renderPartial('_submenu_penilaian',array('params'=>$params,'model'=>$model)); ?>
	</div>
	<div style="clear:both;"></div>
	
</div>
<div>
  BELUM ADA PENILAIAN
</div>

<?php //echo $this->renderPartial('_form_idp', array('model'=>$model)); ?>