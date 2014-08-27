
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
<div style="float:left;width:100%;padding:10px 20px 0px 0px;">
		<?php 
      if ( !empty($model) ) { 
      $departement_id = $this->module->current_departement_id;
			$itemSKJ = Itemskj::model()->findByPk($model->itemskj_id);
      $_Jeniskompetensi = (!empty($itemSKJ) ? $itemSKJ->routeJeniskompetensi():array());
      
      //$kompetensi = Kompetensi::model()->findAll('departement_id = "'.$departement_id.'"');
			//$getsaranarray = Saranpengembangan::model()->getsaranarray($departement_id);
		
      //$kompetensi = Kompetensi::model()->findAll('departement_id = "'.$this->module->current_departement_id.'"');
		?>
		<table id="tblkompetensi" style="width:100%;font-size:12px;">
			<tr>
				<th style="border-left:1px solid #aaa;border-top:1px solid #aaa;">Area Kekuatan</th>
				<th style="border-left:1px solid #aaa;border-top:1px solid #aaa;border-right:1px solid #aaa;">Area yang Memerlukan Peningkatan</th>
			</tr>
		<?php
			$nowjkom = '';
			foreach( (array) $_Jeniskompetensi as $jk=>$valJk){
        $jkom = $valJk->id;
			//foreach ($kompetensi as $ko=>$value_komp) {
			?>	
				
				
				<tr style="font-weight:bold;" dataid="<?php echo $jkom?>" >
					<td colspan="2" style="font-weight:bold;border-bottom:1px solid #aaa;border-top:1px solid #aaa;">
              <?php //echo $value_komp->jenkom->name?></td>
					
				</tr>
			
        <?php 
        $total_akhir = '';
        foreach ( (array) $valJk->kompetensi as $kom=>$value_komp){ 
          
          unset($nilaiDefault);
          $nilaiDefault 	= $itemkompetensi[$jkom][$value_komp->id];
          unset($style);
          unset($selected);
          if ( !empty($nilai[$jkom]) ) {
            $nilaiselected 				= $nilai[$jkom][$value_komp->id]['nilai'];
            $nilaiakhir 				= $nilai[$jkom][$value_komp->id]['nilai_akhir'];
          }else{
            $nilaiselected 				= 0;
            $nilaiakhir 				= 0;
          }
          
          $total_akhir				+= $nilaiakhir;
          $selected[$nilaiselected] 	= 'checked';
          $style[$nilaiDefault] 		= "background:#fff;";
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
			?>
          <?php if (!empty($nilaiDefault) ) { ?>
          <tr id="row_<?php echo $jkom?>_<?php echo $value_komp->id?>" data-id="<?php echo $jkom?>_<?php echo $value_komp->id?>" data-title="<?php echo $value_komp->name?>">
          <td  style="width:50%;border-bottom:1px solid #eee;padding:5px 5px;">
          <?php echo (empty($ringkasan['strongArray'][$jkom][$value_komp->id]) ? '' : $ringkasan['strongArray'][$jkom][$value_komp->id]) ?>
          </td>
          <td   style="border-left:1px solid #aaa;border-bottom:1px solid #eee;padding:5px 5px;<?php echo $style[1]?>">
            <?php echo (empty($ringkasan['weakArray'][$jkom][$value_komp->id]) ? '' : $ringkasan['weakArray'][$jkom][$value_komp->id]) ?>
          </td>


          </tr>
        <?php
          }
			}
      }?>
			
		</table>	
      <?php } ?>
</div>		