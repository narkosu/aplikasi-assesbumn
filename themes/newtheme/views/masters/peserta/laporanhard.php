<?php
/* @var $this PesertaController */
/* @var $dataProvider CActiveDataProvider */

?>
<style>
    table.report th{
        border:1px solid #000;
    }
    
    table.report td{
        border:1px solid #000;
        
    }
    .center{
        text-align:center;
    }
    .rotates{
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);

        /* also accepts left, right, top, bottom coordinates; not required, but a good idea for styling */
        -webkit-transform-origin: 50% 50%;
        -moz-transform-origin: 50% 50%;
        -ms-transform-origin: 50% 50%;
        -o-transform-origin: 50% 50%;
        transform-origin: 50% 50%;

        /* Should be unset in IE9+ I think. */
        filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    }
</style>
<div class="contentinner content-dashboard">                
<div class="row-fluid">
  <div class="span16"> 
<div class="header-page">
	
	<div style="float:left;vertical-align: middle;">
		<h2 class="textTitle">LAPORAN HARD</h2>
    
	</div>
    
	<div style="float:right;">
		<?php $this->renderPartial('_submenulaporan',array('params'=>$params)); ?>
	</div>
	<div style="clear:both;"></div>
	
</div>
<?php 

$masterSKJ = Masterskj::model()->findAll();
?>
<div style="">
    <div style="float:left">
        <select id="skjview">
            <option value="">SKJ</option>
            <?php foreach ((array) $masterSKJ as $skj ) {
                $selected = ( $skjid == $skj->id ? 'selected' : '');
                ?>
            <option value="<?php echo $skj->id?>" <?php echo $selected?>><?php echo $skj->skj_name?></option>
            <?php } ?>

        </select>
    </div>
    <div style="float:left">
        
					<div>
						<?php echo CHtml::dropDownList('itemskj_id', 
                        (empty($_GET['itemskj']) ? '' : $_GET['itemskj'] ), 
                        $listDataItemSkj,
                        array('empty' => 'ITEM SKJ', 'id' => 'itemskjview')
                    );
						?>
					</div>
    </div>
    
    <div style="float:left">
        <select id="kompetensiview" name="selectKompetensi">
            <option value="">KOMPETENSI</option>
            <?php 
            if ( !empty($komptensiList) )
            foreach ( $komptensiList as $keyKomp=>$kompetensi ) {
                $selected = ( $selectKompetensi == $keyKomp ? 'selected' : '');
                ?>
            <option value="<?php echo $keyKomp?>" <?php echo $selected?>><?php echo $kompetensi['name']?></option>
            <?php } ?>
            <?php echo $selectKompetensi ?>
        </select>
    </div>
     
    <div style="clear:both"></div>
</div>
<?php 

if ( empty($skjid) ) { ?>
<div>Silahkan pilih SKJ terlebih dahulu</div>
<?php }  else if ( empty($selectKompetensi) ) { 
    
    ?>
<div class="container-page" style="border:none;">
    <table class="report">
        <thead>
            <tr>
        <th rowspan="3">No</th>
        <th rowspan="3">NAMA LENGKAP</th>
        <th rowspan="3">TEMPAT & TANGGAL LAHIR</th>
        <th rowspan="3">JABATAN</th>
        <th rowspan="3">PENDIDIKAN</th>
        <th colspan="11">KOMPETENSI YANG DINILAI & PERSYARATAN TINGKAT KEMAHIRAN</th>
    </tr>
    <tr>
        <?php 
        
        foreach ((array) $jenisKompetensi as $rowJk ){
            $colspan = (isset($masterKompetensi[$rowJk->id]) ? count($masterKompetensi[$rowJk->id]) : '');
            ?>
        <th colspan="<?php echo $colspan?>"><?php echo $rowJk->name?></th>
        <?php } ?>
    </tr>
    
    <tr>
        <?php 
        
        $dumyKompetensi = array();
        foreach ((array) $jenisKompetensi as $rowJk ){ 
            
            if ( isset($masterKompetensi[$rowJk->id]) )
             foreach ((array) $masterKompetensi[$rowJk->id] as $kompId=>$rowKomp ){ 
                $dumyKompetensi[] = array('jk'=>$rowJk->id,'k'=>$kompId);
                ?>
            <th style="height:200px;width:30px;position: relative;">
                <div class="rotates" style="position: absolute;
bottom: 102px;
left: -77px;width:200px;"><?php echo $rowKomp['name'] ?></div></th>
            <?php } ?>
        <?php } ?>
        
    </tr>
        </thead>
        <tbody>
            <?php 
            $nomor = 1;
            foreach ((array) $data as $row ) { ?>
            <tr>
                <td class="center"><?php echo $nomor?>.</td>
                <td><?php echo $row->nama_peserta ?></td>
                <td><?php echo (empty($row->tempat_lahir) ? '-' : $row->tempat_lahir); ?> 
                    / <?php echo (empty($row->tanggal_lahir) ? '-' : $row->tanggal_lahir);  ?></td>
                <td><?php echo $row->jabatan ?></td>
                <td><?php echo $row->pendidikan ?></td>
                
                <?php foreach ((array) $dumyKompetensi as $mk ){
                    if ( isset($dataPenilaian[$row->id]) ){
                        $nilainya = (empty($dataPenilaian[$row->id]['nilai'][$mk['jk']][$mk['k']]['nilai']) ? '' : $dataPenilaian[$row->id]['nilai'][$mk['jk']][$mk['k']]['nilai'] );
                        $defaultnya = (empty($dataPenilaian[$row->id]['nilai'][$mk['jk']][$mk['k']]['default']) ? '' : $dataPenilaian[$row->id]['nilai'][$mk['jk']][$mk['k']]['default'] );
                    }else{
                        $nilainya = '';
                    }
                    
                    
                    ?>
                <td class="center">
                    <?php echo $nilainya?>
                    
                </td>
                <?php } ?>
            </tr>
            <?php
            $nomor++;
            
                    } ?>
        </tbody>
            
    </table>

</div>
<?php } else {
    
    foreach ((array) $jenisKompetensi as $rowJk ){
            //$colspan = (isset($masterKompetensi[$rowJk->id]) ? count($masterKompetensi[$rowJk->id]) : '');
            
            $paramJenis[$rowJk->id]= $rowJk->name;
    }
    
    //print_r($paramJenis);
    //print_r($komptensiList);
    
    ?>


    <div class="container-page" style="border:none;">
        <table class="report">
            <thead>
                <tr>
            <th rowspan="3">No</th>
            <th rowspan="3">NAMA LENGKAP</th>
            <th rowspan="3">TEMPAT & TANGGAL LAHIR</th>
            <th rowspan="3">JABATAN</th>
            <th rowspan="3">PENDIDIKAN</th>
            <th colspan="3">KOMPETENSI YANG DINILAI & PERSYARATAN TINGKAT KEMAHIRAN</th>
        </tr>
        
        <tr>
            <th colspan="3">
                <?php
                $komptensiList[$selectKompetensi]['jenisKompetensi'] = empty($komptensiList[$selectKompetensi]['jenisKompetensi']) ? '' : $komptensiList[$selectKompetensi]['jenisKompetensi'];
                
                $jenisKomp = (empty($paramJenis[$komptensiList[$selectKompetensi]['jenisKompetensi']]) ? '' : $paramJenis[$komptensiList[$selectKompetensi]['jenisKompetensi']] );
                $nameKomp = (empty($komptensiList[$selectKompetensi]['name']) ? '' : $komptensiList[$selectKompetensi]['name']);
                 echo $jenisKomp; ?>
                : <?php echo $nameKomp; ?>
            </th>
            
        </tr>
        <tr>
            <th colspan="">Standar SKJ</th>
            <th colspan="">Nilai</th>
            <th colspan="">Gap</th>
            
        </tr>
        
         </thead>
         <tbody>
            <?php 
            $nomor = 1;
            $default = '';
            $nilainya = '';
            $defaultnya = '';
            foreach ((array) $data as $row ) { 
                if ( isset($dataPenilaian[$row->id]) ){
                        if (!empty($komptensiList[$selectKompetensi]) )
                            $JenisKompId = $komptensiList[$selectKompetensi]['jenisKompetensi'];
                        else
                            $JenisKompId = '';

                        if (!empty($dataPenilaian[$row->id]['nilai'][$JenisKompId][$selectKompetensi])){
                            $nilai = $dataPenilaian[$row->id]['nilai'][$JenisKompId][$selectKompetensi]['nilai'];
                        }else{
                            $nilai = '';
                        }
                        
                        $default = (empty($dataPenilaian[$row->id]['nilai'][$JenisKompId][$selectKompetensi]['default']) ? '' : $dataPenilaian[$row->id]['nilai'][$JenisKompId][$selectKompetensi]['default']);
                        $nilainya = (empty($nilai) ? '' : $nilai );
                        $defaultnya = (empty($default) ? '' : $default );
                }else{
                    $nilainya = '';
                }
                    
                ?>
            <tr>
                <td class="center"><?php echo $nomor?>.</td>
                <td><?php echo $row->nama_peserta ?></td>
                <td><?php echo (empty($row->tempat_lahir) ? '-' : $row->tempat_lahir); ?> 
                    / <?php echo (empty($row->tanggal_lahir) ? '-' : $row->tanggal_lahir);  ?></td>
                <td><?php echo $row->jabatan ?></td>
                <td><?php echo $row->pendidikan ?></td>
                <td style="text-align: center;"><?php 
                    echo $defaultnya;
                ?></td>
                <td style="text-align: center;">
                    <?php 
                    echo $nilainya;
                ?>
                </td>
                <td style="text-align: center;"><?php 
                    echo ($nilainya - $defaultnya);
                ?></td>
            </tr>
            <?php } ?>
         </tbody>
        </table>

    </div>

<?php
}

?>
  </div>
  </div>
  </div>
<?php 
Yii::app()->clientScript->registerScript('formnilai_s', "
$('#skjview').change(function(){
    var val = $(this).val();
    if ( val != ''){
    window.location.href = '".Yii::app()->createUrl('masters/peserta/rekapitulasihard/skjid/')."/'+$(this).val();
    }
});
$('#itemskjview').change(function(){
    var skjid = $('#skjview').val();
    var val = $(this).val();
    if ( val != ''){
    window.location.href = '".Yii::app()->createUrl('masters/peserta/rekapitulasihard/skjid/')
                                ."/'+ skjid +'?itemskj='+ val;
    }
});
$('#kompetensiview').change(function(){
    var kompId = $(this).val();
    var itemskj = $('#itemskjview').val();
    var skjid =  $('#skjview').val();
    if ( skjid != ''){
    window.location.href = '".Yii::app()->createUrl('masters/peserta/rekapitulasihard/skjid/')
                                ."/'+skjid+'?itemskj='+ itemskj+'&selectKompetensi='+kompId;
    }
});

$(document).delegate('.tulisnilai','click',function(){

}

)");
?>

