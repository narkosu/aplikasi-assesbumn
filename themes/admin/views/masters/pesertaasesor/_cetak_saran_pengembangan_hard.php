
<style>
	#tblkompetensi td.nilaikompetensi{
		text-align:center;
		
	}
	<?php if (  isset($preview)  ) { ?>
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

<div style="float:left;width:90%;padding:0px 10px;">
		<?php 
      $departement_id = $this->module->current_departement_id;
			$itemSKJ = Itemskj::model()->findByPk($model->itemskj_id);
      $_Jeniskompetensi = (!empty($itemSKJ) ? $itemSKJ->routeJeniskompetensi():array());
      
      //$kompetensi = Kompetensi::model()->findAll('departement_id = "'.$departement_id.'"');
			$getsaranarray = LevelSaranpengembanganHard::model()
                        ->getsaranarray($departement_id);
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
      if ( !empty($_Jeniskompetensi) )
      foreach( $_Jeniskompetensi as $jk=>$valJk){
			//foreach ((array) $kompetensi as $ko=>$value_komp) {
			
			?>
				<tr style="font-weight:bold;" dataid="<?php echo $jk?>" >
					<td colspan="4" style="font-weight:bold;border-bottom:1px solid #aaa;border-top:1px solid #aaa;"><?php echo $valJk->name?></td>
					
				</tr>
			
			<?php 
      $total_akhir = '';
      foreach (  $valJk->kompetensi as $kom=>$value_komp){ 
            $jkom 			= $valJk->id;
            
            unset($nilaiDefault);
            $nilaiDefault 	= $itemkompetensi[$jkom][$value_komp->id];
            unset($style);
            unset($selected);
            $nilaiselected 				= $nilai[$jkom][$value_komp->id]['nilai'];
            $nilaiakhir 				= $nilai[$jkom][$value_komp->id]['nilai_akhir'];
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
            $level = $nilaiselected + 1;
          ?>
          <?php if (!empty($nilaiDefault) ) {
            $loadfirst = true;
            if ( !empty($ringkasan['weakArray'][$jkom][$value_komp->id]) ) {
                
            ?>
            <?php 
            if ( !empty($getsaranarray[$value_komp->id]))
            foreach( $getsaranarray[$value_komp->id] as $jenispeng =>$sarpeng ) {
                $loadsubfirst = true;	
                
                foreach( $sarpeng  as $sarid=>$types){
              ?>
                <tr >
                  <td style="border-left:1px solid #aaa;border-bottom:1px solid #eee;padding:5px 5px;<?php echo ($loadfirst ? 'border-top:1px solid #aaa;' : '') ?>"><?php echo ($loadfirst ? $no : '') ?></td>
                  <td style="border-left:1px solid #aaa;border-bottom:1px solid #eee;padding:5px 5px;<?php echo ($loadfirst ? 'border-top:1px solid #aaa;' : '') ?>">
                    <?php
                    if ( $loadfirst ){
                      echo $ringkasan['weakArray'][$jkom][$value_komp->id];
                    }?>

                  </td>
                  <td style="border-left:1px solid #aaa;border-bottom:1px solid #eee;padding:5px 5px;<?php echo ($loadfirst ? 'border-top:1px solid #aaa;' : '') ?>">

                    <?php if ( $loadsubfirst ) {
                      echo $types['jenis_pengembangan'];
                      $loadsubfirst = false;

                    }
                    ?>

                  </td>
                  <td style="border-left:1px solid #aaa;border-right:1px solid #aaa;border-bottom:1px solid #eee;padding:5px 5px;<?php echo ($loadfirst ? 'border-top:1px solid #aaa;' : '') ?>">
                    <?php 
                    if ( !empty($types['saran_pengembangan']) ){
                            foreach( $types['saran_pengembangan'] as $detail ) {
                                echo $detail.'<br>';
                            }
                      }
                      
                      ?>
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

          }
      }    
      ?>
			
		</table>	
</div>		