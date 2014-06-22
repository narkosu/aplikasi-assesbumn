
<div class="header-page">
	<div style="float:left;vertical-align: middle;">
		<h2 class="textTitle">RENCANA PENGEMBANGAN INDIVIDUAL : <?php echo $peserta->nama_peserta; ?></h2>
	</div>
	
	<div style="float:right;">
		<?php $this->renderPartial('_submenu_penilaian',array('params'=>$params,'model'=>$penilaian)); ?>
	</div>
	<div style="clear:both;"></div>
	
</div>

<div class="container-page">

<?php 

echo $this->renderPartial('_form_idp', 
          array(  
                  'idp'=>$idp,
                  'priorityIdp'=>$priorityIdp,
                  'kompetensiData'=>$kompetensiData,
                  'penilaian'=>$penilaian,
                  'departement_id'=>$departement_id,
                  'peserta'=>$peserta,
                  'jenisPengembangan'=>$jenisPengembangan,
                  'loadIdpByMaster'=>$loadIdpByMaster
                  //'output'=>$output
          )); ?>
</div>

<?php //echo $this->renderPartial('_form_idp', array('model'=>$model)); ?>