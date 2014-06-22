<?php 
	$kompetensi = Kompetensi::model()->findAll('departement_id = "'.$this->module->current_departement_id.'"');
?>
 <?php
$itemskj_id = ( empty($itemskj_id) ? $model->itemskj_id : $itemskj_id );
$itemSKJ = Itemskj::model()->findByPk($itemskj_id);

$_Jeniskompetensi = (!empty($itemSKJ) ? $itemSKJ->routeJeniskompetensi() : array());
$departement_id = $this->module->current_departement_id;
?>
<table id="tblkompetensi" style="width:100%;border:1px solid #000;font-size:11pt;font-family:'Arial Narrow';" cellspacing="1" cellpadding="2">
	<tr>
		<th style="background: #FF9900;font-size:11pt;font-weight:bold;padding:5px;color: #fff;border-right:1px solid #fff;" >KOMPETENSI</th>
		<th  style="background: #FF9900;font-size:11pt;font-weight:bold;padding:5px;color: #fff;" colspan="6">TINGKAT KEMAHIRAN</th>
	</tr>
<?php
    foreach ((array) $_Jeniskompetensi as $jk => $valJk) {
    ?>
		<tr style="font-weight:bold; background: #666699;color: #fff;" >
			<td style="padding:5px;border-right:1px solid #fff;border-top:1px solid #aaa;font-weight:bold;width:250px;border-bottom:1px solid #aaa;"><?php echo $valJk->name?></td>
			<td style="padding:5px;border-right:1px solid #fff;border-top:1px solid #aaa;border-bottom:1px solid #aaa;font-weight:bold;text-align: center;">1</td>
			<td style="padding:5px;border-right:1px solid #fff;border-top:1px solid #aaa;border-bottom:1px solid #aaa;font-weight:bold;text-align: center;">2</td>
			<td style="padding:5px;border-right:1px solid #fff;border-top:1px solid #aaa;border-bottom:1px solid #aaa;font-weight:bold;text-align: center;">3</td>
			<td style="padding:5px;border-right:1px solid #fff;border-top:1px solid #aaa;border-bottom:1px solid #aaa;font-weight:bold;text-align: center;">4</td>
			<td style="padding:5px;border-right:1px solid #fff;border-top:1px solid #aaa;border-bottom:1px solid #aaa;font-weight:bold;text-align: center;">5</td>
			<td style="padding:5px;width:100px;background: red;border-top:1px solid #aaa;border-bottom:1px solid #aaa;font-weight:bold;text-align: center;">GAP</td>
		</tr>
	<?php
    $total_akhir = 0;
    $noUrut = 1;
    foreach ((array) $valJk->kompetensi as $kom => $value_komp) {

        $jkom = $valJk->id;
        unset($nilaiDefault);
        $nilaiDefault = $itemkompetensi[$jkom][$value_komp->id];
        unset($style);
        unset($selected);
        $nilaiselected = $nilai[$jkom][$value_komp->id]['nilai'];
        $nilaiakhir = $nilai[$jkom][$value_komp->id]['nilai_akhir'];
        $total_akhir += $nilaiakhir;
        $selected[$nilaiselected] = 'checked';
        $style[$nilaiDefault] = "background:#e1e1e1;";
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
		<tr style="font-weight:bold;">
		<td  style="width:250px;border-right:1px solid #eee;border-bottom:1px solid #eee;padding:5px;"><?php echo $noUrut.'. '.$value_komp->name?></td>
		<td  style="padding:5px;border-right:1px solid #eee;text-align: center;border-bottom:1px solid #eee;padding:5px 0px;<?php echo $style[1]?>">
			<?php echo (!empty($selected[1]) ? 'X' :'')?>
		</td>
		<td  class= "nilaikompetensi" style="padding:5px;text-align: center;border-right:1px solid #eee;border-bottom:1px solid #eee;padding:5px 0px;<?php echo $style[2]?>">
			<?php echo (!empty($selected[2]) ? 'X' :'')?>
		</td>
		<td  class= "nilaikompetensi" style="padding:5px;text-align: center;border-right:1px solid #eee;border-bottom:1px solid #eee;padding:5px 0px;<?php echo $style[3]?>">
			<?php echo (!empty($selected[3]) ? 'X' :'')?>
		</td>
		<td  class= "nilaikompetensi" style="padding:5px;text-align: center;border-right:1px solid #eee;border-bottom:1px solid #eee;padding:5px 0px;<?php echo $style[4]?>">
			<?php echo (!empty($selected[4]) ? 'X' :'')?>
		</td>
		<td  class= "nilaikompetensi" style="padding:5px;text-align: center;border-right:1px solid #eee;border-bottom:1px solid #eee;padding:5px 0px;<?php echo $style[5]?>">
			<?php echo (!empty($selected[5]) ? 'X' :'')?>
		
		</td>
		
		<td class= "nilaikompetensi" style="border-bottom:1px solid #eee;text-align: center;padding:5px 0px;">
		<?php echo $nilaiakhir?>
		</td>
		</tr>
	<?php
			$noUrut++;
		}
    }
	} ?>
	<?php /*<tr class="row_gap">
		<Td colspan="7">
			Gap Kompetensi
		</Td>
		<td style="text-align:center;">
			<?php echo $total_akhir?>
		</td>
	</tr>*/?>
	<tr class="row_persentase" style="font-weight:bold;background: red;color:#fff;">
		<Td colspan="5">
			GAP KOMPETENSI
		</Td>
    <Td >
			TOTAL
		</Td>
		<td style="text-align:center;">
			<?php echo $total_akhir ?>
		</td>
	</tr>
</table>	