<style>
  #tblkompetensi td.nilaikompetensi{
    text-align:center;

  }

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
  #tblkompetensi td{
    border:1px solid #aaa;
  }
  .subTable td.first{
    border-left:0px !important;
  }
  .subTable td.last{
    border-right:0px !important;
  }
  .subTable td._top{
    border-top:0px !important;
  }
  .container-page{
    border:0px !important;
  }
</style>
<?php
$ringkasan = $kompetensiData['ringkasan'];
$countJP = count($jenisPengembangan);
?>
<div class="form" style="border:0px;padding:0px;">
  <?php
  $form = $this->beginWidget('CActiveForm', array(
      'id' => 'pesertaasesor-form',
      'enableAjaxValidation' => false,
  ));
  ?>

  <table id="tblkompetensi" style="width:100%;font-size:12px;border:1px solid #eee;">
    <tr>
      <th colspan="3">Nama Lengkap</th>
      <th>Jabatan</th>
      <th>Unit Kerja</th>
      <th>Atasan Langsung</th>
      <th>Periode (1 Tahun)</th>

    </tr>
    <tr>
      <td colspan="3"><?php echo $peserta->nama_peserta; ?></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>

    </tr>
    <tr>
      <th colspan="3">Kompetensi</th>
      <th>Prioritas</th>
      <th>Tujuan</th>
      <th>Rencana</th>
      <th>Bukti</th>

    </tr>
    <?php foreach ((array) $kompetensiData['ringkasan']['weakArray'] as $groupid => $kompetensis) { ?>
      <?php
      foreach ((array) $kompetensis as $kompetensiId => $kompetensi) {
        $getLevel = Assessment::model()->levelPengembangan($penilaian->id, $groupid, $kompetensiId);
        ?>
        <tr>
          <td rowspan="<?php echo $countJP + 1 ?>" style="vertical-align:top;"><?php echo $kompetensi ?></td>
        </tr>
        <?php
        foreach ((array) $jenisPengembangan as $jp) {
          $nextlevel = implode(',', $getLevel->next_level);
          $spdet = LevelSaranpengembangan::model()
                  ->detail($penilaian->departement_id, $kompetensiId, $jp->id, $nextlevel);
          ?>
          <tr>
            <td><?php echo $jp->nama_pengembangan; ?></td>

            <td style="text-align:center;padding:0px;">
              <table style="border:0px;" class="subTable">
                <?php
                $kompetensiSaranPengembangan = LevelSaranpengembangan::model()
                        ->getSaranPengembangan(
                        $penilaian->departement_id, $kompetensiId, $jp->id
                );
                foreach ((array) $kompetensiSaranPengembangan as $sarpeng) {
                  ?>
                  <tr>
                    <td class="first _top">
                      <?php echo $sarpeng->level; ?>
                    </td>
                    <td class="last _top">
                      <ul>
                        <?php foreach ((array) $sarpeng->findDetail($jp->id)->detail as $det) {
                          ?>
                          <li>
                            <?php echo $det->keterangan . '<br>'; ?>
                          </li>

                        <?php } ?>
                      </ul>
                    </td>
                  </tr>
                <?php } ?>
              </table>

            </td>

            <td style="vertical-align:top;padding:0px;">
              <table style="border:0px;" class="subTable">
                <tr>
                  <td class="first _top" style="width:10px;"><?php echo implode(',', $getLevel->next_level) ?></td>
                  <td class="last _top">
                    <ul>
                      <?php foreach ((array) $spdet->detail as $sardet) {
                        ?>
                        <li>
                          <?php echo $sardet->keterangan . '<br>'; ?>
                          <?php $_saveTo[$kompetensiId.'_'.$jp->id][$sardet->id] = '<select>
                                    <option>Memperbaiki Kerja</option>
                                    <option>Penugasan Khusus</option>
                                    <option>Pengembangan Karir</option>
                                    <option>Perubahan Jabatan</option>
                                  </select>';
                          ?>
                        </li>
                      <?php } ?>
                    </ul>
                  </td>
                </tr>
              </table>
            </td>
            <td style="vertical-align:top;">
              <?php
              foreach ((array) $_saveTo[$kompetensiId.'_'.$jp->id] as $detail ){
                echo $detail;
              }
              ?>
            </td>
            <td  style="vertical-align:top;">
              <?php
              foreach ((array) $_saveTo[$kompetensiId.'_'.$jp->id] as $detail ){
                echo '<textarea style="width:100px;"></textarea>';
              }
              ?>
              
            </td>

            <td style="vertical-align:top;">
              <?php
              foreach ((array) $_saveTo[$kompetensiId.'_'.$jp->id] as $detail ){
                echo '<textarea style="width:100px;"></textarea>';
              }
              ?>
            </td>
          </tr>
          <?php
        }
        ?>

      <?php } ?>
    <?php } ?>
  </table>

  <?php /*
    <div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>
   */ ?>
  <?php $this->endWidget(); ?>

</div><!-- form -->