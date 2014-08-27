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
    <h2 style="text-align:center;">RENCANA PENGEMBANGAN INDIVIDUAL</h2>
<?php echo $laporan ?>
</div>

<?php //echo $this->renderPartial('_form_idp', array('model'=>$model)); ?>