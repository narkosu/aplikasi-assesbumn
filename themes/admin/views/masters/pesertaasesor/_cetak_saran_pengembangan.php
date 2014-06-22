<?php 
			$kompetensi = Kompetensi::model()->findAll('departement_id = "'.$this->module->current_departement_id.'"');
			$getsaranarray = Saranpengembangan::model()->getsaranarray($this->module->current_departement_id);
		?>
		<table id="tblkompetensi" style="font-family:'arial narrow';border:1px solid #000;width:610px;font-size:9pt;" cellpadding="0" cellspacing="0">
			<tr style="font-size:12pt;background: #000;color: #fff;">
				<td style="width:50px;text-align: center;">No.</td>
				<td style="border-left:1px solid #fff;text-align: center;width:100px">Kompetensi</td>
				<td  style="border-left:1px solid #fff;text-align: center;width:170px">Jenis Kegiatan Pengembangan</td>
				<td  style="border-left:1px solid #fff;text-align: center;width:290px">Keterangan</td>
			</tr>
		<?php
			$nowjkom = '';
			$no = 1;
      $total_akhir = '';
			foreach ((array) $kompetensi as $ko=>$value_komp) {
				$jkom 			= $value_komp->jeniskompetensi_id;
				unset($nilaiDefault);
        if ( !empty($itemkompetensi[$jkom][$value_komp->id]) )
            $nilaiDefault 	= $itemkompetensi[$jkom][$value_komp->id];
        else
            $nilaiDefault 	= '';
				unset($style);
				unset($selected);
        if ( !empty($nilai[$jkom][$value_komp->id]) ) {
            $nilaiselected 				= $nilai[$jkom][$value_komp->id]['nilai'];
            $nilaiakhir 				= $nilai[$jkom][$value_komp->id]['nilai_akhir'];
        } else {
            $nilaiselected 				= 0;
            $nilaiakhir 				= 0;
        }
        
				$total_akhir				+= $nilaiakhir;
				$selected[$nilaiselected] 	= 'checked';
				$style[$nilaiDefault] 		= "background:#c0c;";
				$style[1] = (empty($style[1]) ? '' : $style[1]);
        $style[2] = (empty($style[2]) ? '' : $style[2]);
        $style[3] = (empty($style[3]) ? '' : $style[3]);
        $style[4] = (empty($style[4]) ? '' : $style[4]);
        $style[5] = (empty($style[5]) ? '' : $style[5]);
        $style[6] = (empty($style[6]) ? '' : $style[6]);
        
        $selected[1] = ( empty($selected[1]) ? '' : $selected[1]);
        $selected[2] = ( empty($selected[2]) ? '' : $selected[2]);
        $selected[3] = ( empty($selected[3]) ? '' : $selected[3]);
        $selected[4] = ( empty($selected[4]) ? '' : $selected[4]);
        $selected[5] = ( empty($selected[5]) ? '' : $selected[5]);
        $selected[6] = ( empty($selected[6]) ? '' : $selected[6]);
				if ( $jkom != $nowjkom ){
					$nowjkom = $jkom;
          
          /*
			?>
				<tr style="font-weight:bold;" dataid="<?php echo $jkom?>" >
					<td colspan="4" style="font-weight:bold;border-bottom:1px solid #aaa;border-top:1px solid #aaa;"><?php echo $value_komp->jenkom->name?></td>
					
				</tr>
			<?php	
				*/
          
        }
			?>
			<?php if (!empty($nilaiDefault) ) {
				$loadfirst = true;
        
				if ( !empty($ringkasan['weakArray'][$jkom][$value_komp->id]) ) {
				?>
				<?php 
        
        if ( !empty($getsaranarray[$value_komp->id]) )
        foreach( $getsaranarray[$value_komp->id] as $jenispeng =>$sarpeng ) {
						$loadsubfirst = true;	
						foreach( $sarpeng  as $sarid=>$types){
                
					?>
						<tr >
							<td style="text-align: center;border-right:1px solid #000;padding:5px 5px;<?php echo ($loadfirst ? 'border-top:1px solid #000;' : '') ?>">
                  <?php echo ($loadfirst ? $no.'.' : '') ?></td>
							<td style="border-right:1px solid #000;padding:5px 5px;<?php echo ($loadfirst ? 'border-top:1px solid #000;' : '') ?>">
								<?php
								if ( $loadfirst ){
									echo $ringkasan['weakArray'][$jkom][$value_komp->id];
								}?>
								
							</td>
							<td style="border-right:1px solid #000;padding:5px 5px;<?php echo ($loadfirst ? 'border-top:1px solid #000;' : ( $loadsubfirst ? 'border-top:1px solid #000;': '')) ?>">
								<?php
								$forsub = $loadsubfirst;
								if ( $loadsubfirst ) {
                    
									echo $types['jenis_pengembangan'];
                  
									$loadsubfirst = false;
								}
								?>
							</td>
							<td style="padding:5px 5px;<?php echo ($loadfirst ? 'border-top:1px solid #000;' : ( $forsub ? 'border-top:1px solid #000;': '')) ?>">
							<table cellspacing="0" cellpadding="0" style="font-size: 9pt;font-family: 'arial narrow';">
                  <tr><td style="vertical-align: top;width:10px;">&bull;</td>
                      <td><?php echo $types['saran_pengembangan'];?></td></tr>
              </table>
								
							</td>
							</tr>
							<?php
								if ( $loadfirst ){
									$loadfirst = false;
									$no++;
								}	
							}
						
						}
					}
				}
				
			} ?>
			
		</table>	
</div>		
