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
			<td style="padding:5px;border-right:1px solid #fff;border-top:1px solid #aaa;font-weight:bold;width:250px;border-bottom:1px solid #aaa;"><?php echo $value_komp->jenkom->name?></td>
			<td style="padding:5px;border-right:1px solid #fff;border-top:1px solid #aaa;border-bottom:1px solid #aaa;font-weight:bold;text-align: center;">1</td>
			<td style="padding:5px;border-right:1px solid #fff;border-top:1px solid #aaa;border-bottom:1px solid #aaa;font-weight:bold;text-align: center;">2</td>
			<td style="padding:5px;border-right:1px solid #fff;border-top:1px solid #aaa;border-bottom:1px solid #aaa;font-weight:bold;text-align: center;">3</td>
			<td style="padding:5px;border-right:1px solid #fff;border-top:1px solid #aaa;border-bottom:1px solid #aaa;font-weight:bold;text-align: center;">4</td>
			<td style="padding:5px;border-right:1px solid #fff;border-top:1px solid #aaa;border-bottom:1px solid #aaa;font-weight:bold;text-align: center;">5</td>
			<td style="padding:5px;width:100px;background: red;border-top:1px solid #aaa;border-bottom:1px solid #aaa;font-weight:bold;text-align: center;">%</td>
		</tr>
	<?php
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

        ?>
		<?php if (!empty($nilaiDefault) ) { ?>
		<tr style="font-weight:bold;">
		<td  style="width:250px;border-right:1px solid #eee;border-bottom:1px solid #eee;padding:5px;"><?php echo $noUrut.'. '.$value_komp->name?></td>
		<td  style="padding:5px;border-right:1px solid #eee;text-align: center;border-bottom:1px solid #eee;padding:5px 0px;<?php echo $style[1]?>">
			<?php echo (isset($selected[1]) ? 'X' :'')?>
		</td>
		<td  class= "nilaikompetensi" style="padding:5px;text-align: center;border-right:1px solid #eee;border-bottom:1px solid #eee;padding:5px 0px;<?php echo $style[2]?>">
			<?php echo (isset($selected[2]) ? 'X' :'')?>
		</td>
		<td  class= "nilaikompetensi" style="padding:5px;text-align: center;border-right:1px solid #eee;border-bottom:1px solid #eee;padding:5px 0px;<?php echo $style[3]?>">
			<?php echo (isset($selected[3]) ? 'X' :'')?>
		</td>
		<td  class= "nilaikompetensi" style="padding:5px;text-align: center;border-right:1px solid #eee;border-bottom:1px solid #eee;padding:5px 0px;<?php echo $style[4]?>">
			<?php echo (isset($selected[4]) ? 'X' :'')?>
		</td>
		<td  class= "nilaikompetensi" style="padding:5px;text-align: center;border-right:1px solid #eee;border-bottom:1px solid #eee;padding:5px 0px;<?php echo $style[5]?>">
			<?php echo (isset($selected[5]) ? 'X' :'')?>
		
		</td>
		
		<td class= "nilaikompetensi" style="border-bottom:1px solid #eee;text-align: center;padding:5px 0px;">
		<?php //echo $nilaiakhir?>
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
		<Td colspan="6">
			PEMENUHAN KOMPETENSI DALAM PROSENTASE
		</Td>
		<td style="text-align:center;">
			<?php echo $model->persentase_pemenuhan?>%
		</td>
	</tr>
</table>	