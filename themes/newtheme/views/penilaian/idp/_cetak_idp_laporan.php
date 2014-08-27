
<?php
$isLoaded = array();
$loadedPriority = array();
$loaded = '';
$idpID = '';
$type_competence  = 1;
$tujuan = array(1=> 'Memperbaiki Kerja',
                2=> 'Penugasan Khusus',
                3=> 'Pengembangan Karir',
                4=> 'Perubahan Jabatan'
                );
/*------------*/
foreach ((array) $loadIdpByMaster as $valueDetail){
    $loadedPriority[$valueDetail->kompetensi_id] = $valueDetail->kompetensi_id;
}
$ringkasan = $kompetensiData['ringkasan'];
$countJP = count($jenisPengembangan);
?>

<div  class="form" style="border:0px;padding:0px">
  <table id="tblkompetensi" cellspacing="0" cellpadding="0" style="width:100%;font-size:12px;border:1px solid #000;font-family: arial;font-size:12px;">
    <tr>
      <th style="background:#eee;text-align:left;border-bottom:1px solid #000;border-right:1px solid #000;padding:5px;">Nama Lengkap</th>
      <th style="background:#eee;text-align:left;border-bottom:1px solid #000;border-right:1px solid #000;padding:5px;">Jabatan</th>
      <th style="background:#eee;text-align:left;border-bottom:1px solid #000;border-right:1px solid #000;padding:5px;">Unit Kerja</th>
      <th style="background:#eee;text-align:left;border-bottom:1px solid #000;border-right:1px solid #000;padding:5px;">Atasan Langsung</th>
      <th style="background:#eee;text-align:left;border-bottom:1px solid #000;padding:5px;">Periode (1 Tahun)</th>
    </tr>
    <tr>
      <td style="text-align:left;border-bottom:1px solid #000;border-right:1px solid #000;padding:5px;"><?php echo $peserta->nama_peserta; ?></td>
      <td style="text-align:left;border-bottom:1px solid #000;border-right:1px solid #000;padding:5px;"><?php echo $idp->jabatan; ?></td>
      <td style="text-align:left;border-bottom:1px solid #000;border-right:1px solid #000;padding:5px;"><?php echo $idp->unit_kerja; ?></td>
      <td style="text-align:left;border-bottom:1px solid #000;border-right:1px solid #000;padding:5px;"><?php echo $idp->atasan; ?></td>
      <td style="text-align:left;border-bottom:1px solid #000;padding:5px;">
          <?php
            echo $idp->periode_start;
          ?> s/d 
          <?php
            echo $idp->periode_end;
          ?>
      </td>
    </tr>
    <tr>
      <th style="background:#eee;width:500px;text-align:left;border-bottom:1px solid #000;border-right:1px solid #000;padding:5px;" colspan="3">Kompetensi</th>
      <th style="background:#eee;text-align:left;border-bottom:1px solid #000;padding:5px;" colspan="2">Prioritas</th>
      
    </tr>
    <?php
    $activityInterface = '';
    foreach ((array) $kompetensiData['ringkasan']['weakArray'] as $groupid => $kompetensis) {
      ?>
      <?php
      foreach ((array) $kompetensis as $kompetensiId => $kompetensi) {
          $tempData['kompetensi'][$kompetensiId] = $kompetensi;
        $activityInterface .= '<tr style="display:none;" id="subinterface_' . $kompetensiId . '" class="activity_' . $kompetensiId . '"><td colspan="5"><b>' . $kompetensi . '</b></td></tr>';
        //$sub_activityInterface =  '<tr style="display:none;" id="interface_'.$kompetensiId.'" class="activity_'.$kompetensiId.'"><td colspan="5"></td></tr>';
        $getLevel = Assessment::model()->levelPengembangan($penilaian->id, $groupid, $kompetensiId);
        ?>
        <tr id="interface_<?php echo $kompetensiId ?>">
          <td colspan="3" style="vertical-align:top;text-align:left;border-bottom:1px solid #000;border-right:1px solid #000;padding:5px;">
            <span id="title_<?php echo $kompetensiId ?>">
             <?php echo $kompetensi; ?> 
            </span></td>
          <td colspan="2" style="vertical-align:top;text-align:left;border-bottom:1px solid #000;padding:5px;" id="priority_<?php echo $kompetensiId ?>">
              <?php echo ( !empty($loadedPriority[$kompetensiId]) ? $kompetensi : '' )?>
          </td>
          
        </tr>
      <?php }
    }
    ?>
    <tr id="trActivity">
      <th colspan="2" style="background:#eee;text-align:left;border-bottom:1px solid #000;border-right:1px solid #000;padding:5px;">Aktifitas</th>
      <th style="background:#eee;text-align:left;border-bottom:1px solid #000;border-right:1px solid #000;padding:5px;">Tujuan</th>
      <th colspan="2" style="background:#eee;text-align:left;border-bottom:1px solid #000;padding:5px;">Bukti</th>
      
    </tr>
    <?php foreach ((array) $aktifitas as $komp_id=>$detail_aktifitas) {
    ?>
    <tr id="trActivity">
      <th colspan="5" style="text-align:left;text-align:left;border-bottom:1px solid #000;padding:5px 5px 5px 20px;">
          <?php echo $tempData['kompetensi'][$komp_id] ?>
      </th>
    </tr>
     <?php foreach ( (array) $detail_aktifitas as $jepeng_id=>$aktifitases) {
    ?>
        <tr id="trActivity">
          <th  colspan="5" style="text-align:left;text-align:left;border-bottom:1px solid #000;padding:5px 5px 5px 30px;"><?php echo $aktifitases->jenis_pengembangan ?></th>
          
        </tr>
        <?php foreach ((array) $aktifitases->detail as $detail_id=>$detail_aktifitas) {
           /* $spdet = Penilaian::routeLevelSaranPengembangan($type_competence, 
                            array('departement_id' => $penilaian->departement_id,
                            'kompetensi_id' => $komp_id,
                            'jenispengembangan_id' => $jepeng_id,
                            'level' => $detail_aktifitas->level_sp_id,
                            'detail_level' => $detail_aktifitas->level_sp_id,
                                )
                );
            * 
            */
    ?>
        <tr id="trActivity">
          <td colspan="2" style="text-align:left;border-bottom:1px solid #000;border-right:1px solid #000;padding:5px 5px 5px 40px;">
              <?php if ( empty($detail_aktifitas->aktifitas) ) {  ?>
                <?php if ( $competency == 2 ) { ?>
                    <?php echo $detail_aktifitas->leveldetailhard->keterangan ?>
                <?php } else{ ?>
                    <?php echo $detail_aktifitas->leveldetail->keterangan ?>
                <?php } ?>
              <?php } else { ?>
                <?php echo $detail_aktifitas->aktifitas ?>
              <?php } ?>
          
          </td>
          <td style="text-align:left;border-bottom:1px solid #000;border-right:1px solid #000;padding:5px;"><?php echo $tujuan[$detail_aktifitas->tujuan] ?></td>
          <td colspan="2" style="text-align:left;border-bottom:1px solid #000;padding:5px;"><?php echo $detail_aktifitas->bukti ?></td>
          
        </tr>
        <?php }?>
     <?php } ?>
    <?php } ?>
        <tr>
          <td colspan="2" style="font-weight:bold;text-align:left;border-right:1px solid #000;padding:5px;">
              Tanggal & Tanda Tangan Pegawai
          
          </td>
          <td colspan="3" style="font-weight:bold;text-align:left;padding:5px;">
              Tanggal & Tanda Tangan Atasan
          </td>
          
        </tr>
        <tr>
          <td colspan="2" style="text-align:left;height:40px;border-right:1px solid #000;padding:5px;">
              
          
          </td>
          <td colspan="3" style="text-align:left;height:40px;padding:5px;">
              
          </td>
          
        </tr>
  </table>

  
</div><!-- form -->
