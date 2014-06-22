<style>
	#tblkompetensi td.nilaikompetensi{
		text-align:center;
		
	}
</style>
<?php $preview = isset($preview) ? $preview : '';?>
<div style="float:left;width:100%;padding:0px 10px;">
		<?php 
			//$Jeniskompetensi = Jeniskompetensi::model()->findAll('departement_id = "'.$departement_id.'"');
      $itemskj_id = ( empty($itemskj_id) ? $model->itemskj_id : $itemskj_id );
      $itemSKJ = Itemskj::model()->findByPk($itemskj_id);
      
      $Jeniskompetensi = (!empty($itemSKJ) ? $itemSKJ->routeJeniskompetensi():array());
		?>
		<table id="tbljeniskompetensi" style="font-size:12px;">
			
		<?php
			$nowjkom = '';
			foreach ((array) $Jeniskompetensi as $ko=>$value_komp) {
				
			?>
			<tr style="font-weight:bold;">
				<?php if ( isset($preview) ) { ?>
					<td style="font-weight:bold;">
					<?php echo $value_komp->name?>
					</td>
				<?php } else { ?>
					<td style="font-weight:bold;">
					<?php echo $value_komp->name?>
					</td>
				<?php } ?>
				</tr>
				<tr style="font-weight:bold;">
					<td style='text-align:justify;'>
						<?php if ( $preview ) { ?>
							<?php echo nl2br($uraian[$value_komp->id])?>
						<?php } else { ?>
							<textarea class="textarea98" name="uraian[<?php echo $value_komp->id?>]"><?php echo $uraian[$value_komp->id]?></textarea>
						<?php } ?>
					</td>
				</tr>
			<?php	
				}
			?>
				
		</table>	
		<?php /*<div><span class="button" style="border:1px solid #eee;">Simpan Uraian</span></div> */?>
</div>		