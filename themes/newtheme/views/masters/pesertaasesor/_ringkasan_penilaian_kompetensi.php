
<style>
	#tblkompetensi td.nilaikompetensi{
		text-align:center;
		
	}
	<?php 
  $preview = isset($preview) ? $preview : '';
  if ($preview ) { ?>
		#tblkompetensi{
		border: 1px solid #aaa;		
		}
		#tblkompetensi td.nilaikompetensi{
			text-align:center;
			border:1px solid #aaa;
		}
		
		#tblkompetensi tr td:first-child{
			padding-left:10px;
		}
		
		#tblkompetensi th{
			text-align:center;
			background: #eee;
			border:1px solid #aaa;
		}
		#tblkompetensi tr.jeniskompetensi td{
			text-align:center;
			border:1px solid #aaa;
			background: #fff;
			
		}
	<?php } ?>
	
</style>
<div style="float:left;width:100%;padding:10px 20px 0px 0px;">
		<?php 
			$kompetensi = Kompetensi::model()->findAll('departement_id = "'.$this->module->current_departement_id.'"');
		?>
		<table id="tblkompetensi" style="width:100%;font-size:12px;">
			<tr>
				<th style="border-left:1px solid #aaa;border-top:1px solid #aaa;">Area Kekuatan</th>
				<th style="border-left:1px solid #aaa;border-top:1px solid #aaa;border-right:1px solid #aaa;">Area yang Memerlukan Peningkatan</th>
			</tr>
		<?php
			$nowjkom = '';
			$total_akhir = 0;
      //print_r($nilai);
      if ( !empty($kompetensi) )
			foreach ($kompetensi as $ko=>$value_komp) {
				$jkom 			= $value_komp->jeniskompetensi_id;
				unset($nilaiDefault);
        if ( !empty($itemkompetensi[$jkom]) ) {
            $nilaiDefault 	= $itemkompetensi[$jkom][$value_komp->id];
        } else {
            $nilaiDefault = 0;
        }
        
				unset($style);
				unset($selected);
        if ( !empty($nilai[$jkom]) ) {
            $nilaiselected 				= (empty($nilai[$jkom][$value_komp->id]['nilai']) ? '' : $nilai[$jkom][$value_komp->id]['nilai']);
            $nilaiakhir 				= (empty($nilai[$jkom][$value_komp->id]['nilai_akhir']) ? '' : $nilai[$jkom][$value_komp->id]['nilai_akhir']);
            $total_akhir				+= $nilaiakhir;
        } else { 
            $nilaiselected 			= 0;
            $nilaiakhir 				= 0;
            $total_akhir				+= $nilaiakhir;
        }
        
				$selected[$nilaiselected] 	= 'checked';
				$style[$nilaiDefault] 		= "background:#fff;";
				
        $style[1] = empty($style[1]) ? '' : $style[1];
        
				if ( $jkom != $nowjkom ){
					$nowjkom = $jkom;
			?>
				<tr style="font-weight:bold;" dataid="<?php echo $jkom?>" >
					<td colspan="2" style="font-weight:bold;border-bottom:1px solid #aaa;border-top:1px solid #aaa;"><?php echo $value_komp->jenkom->name?></td>
					
				</tr>
			<?php	
				}
			?>
				<?php if (!empty($nilaiDefault) ) { 
            $weakArray = (empty($ringkasan['weakArray'][$jkom][$value_komp->id]) ? '' : $ringkasan['weakArray'][$jkom][$value_komp->id]);
            $strongArray = (empty($ringkasan['strongArray'][$jkom][$value_komp->id]) ? '' : $ringkasan['strongArray'][$jkom][$value_komp->id]);
            
        ?>
				<tr id="row_<?php echo $jkom?>_<?php echo $value_komp->id?>" data-id="<?php echo $jkom?>_<?php echo $value_komp->id?>" data-title="<?php echo $value_komp->name?>">
				<td  style="width:50%;border-bottom:1px solid #eee;padding:5px 5px;">
				<?php echo $strongArray ?>
				</td>
				<td   style="border-left:1px solid #aaa;border-bottom:1px solid #eee;padding:5px 5px;<?php echo $style[1]?>">
					<?php echo $weakArray ?>
				</td>
				

				</tr>
			<?php
				}
			} ?>
			
		</table>	
</div>		
