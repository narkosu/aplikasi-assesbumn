<?php
/* @var $this PesertaasesorController */
/* @var $model Pesertaasesor */
/* @var $form CActiveForm */
$depid = $departement_id;
?>

<?php $this->renderPartial('_submenu_penilaian',array('model'=>$model)); ?>
<div id="subcontainer">
	
	<div class="form" >
	<h1 style="text-align: center;">LAPORAN INDIVIDUAL
	ASSESSMENT KOMPETENSI
	</h1>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'pesertaasesor-form',
		'enableAjaxValidation'=>false,
	)); ?>
	
		<?php /*<p class="note">Fields with <span class="required">*</span> are required.</p>*/?>
	
		<?php echo $form->errorSummary($model); ?>
		<input type="hidden" name="peserta_id" value="<?php echo $peserta->id?>">
		<input type="hidden" name="penilaian_id" value="<?php echo $model->id?>">
		<div style="width:1000px;margin:0 auto;">
			<table>
				<Tr>
					<td width="100"><?php echo CHtml::label("Nomor Test",''); ?></td>
					<td width="10">:</td>
					<td><?php echo $peserta->nip; ?></td>
				</Tr>
				<Tr>
					<td width="100"><?php echo CHtml::label("Nama",''); ?></td>
					<td width="10">:</td>
					<td><?php echo $peserta->nama_peserta; ?></td>
				</Tr>
				
			</table>
		<h3 style="text-align: center;">HASIL ASSESSMENT KOMPETENSI</h3>
		<div id="headerloadKompetensi" style="font-weight:bold;">I. PROFIL KOMPETENSI</div>
		<div id="loadKompetensi">
			<?php 
				echo $output['loadkompetensi'];
			 ?>
		</div>
		<div style="clear:both;"></div>
		<div id="headeruraianKompetensi" style="font-weight:bold;">II. URAIAN PROFIL KOMPETENSI</div>
		<div id="uraianKompetensi">
			
			<?php
				echo $output['uraianKompetensi'];
			?>
			
		</div>
		<div style="clear:both;"></div>
		<div id="headerringkasanKompetensi" style="font-weight:bold;">III. RINGKASAN PROFIL KOMPETENSI</div>
		<div id="ringkasanprofile">
		<table>
			<Tr>
				<th>Area Kekuatan</th>
				<th>Area Kelemahan</th>
			</Tr>
			<Tr>
				<td id="strongarea" style="vertical-align: top;"><ul><?php echo $output['ringkasan']['strong']?></ul></td>
				<td id="weaknessarea"  style="vertical-align: top;"><ul><?php echo  $output['ringkasan']['weak']?></ul></td>
			</Tr>
		</table>	
		</div>
		<?php /*
		<div style="clear:both;"></div>
		<div id="headersaranpengembangan"  style="font-weight:bold;">VI. SARAN PENGEMBANGAN</div>
		<div style="clear:both;"></div>
		<div id="saranpengembangan">
		<?php 
			echo $output['saranpengembangan'];
		?>
		</div>
		<div style="clear:both;"></div>
		*/?>
	</div>
	<?php $this->endWidget(); ?>
	
	</div><!-- form -->
</div>