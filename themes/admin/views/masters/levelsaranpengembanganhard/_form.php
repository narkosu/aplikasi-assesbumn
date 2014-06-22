<?php
/* @var $this LevelSaranpengembanganHardController */
/* @var $model LevelSaranpengembanganHard */
/* @var $form CActiveForm */
?>

<div class="form">
    <div style="float:left;width:300px;border-right:1px solid #eee;">
        <?php $form=$this->beginWidget('CActiveForm', array(
          'id'=>'level-saranpengembangan-hard-form',
          'enableAjaxValidation'=>false,
        )); ?>

          <p class="note">Fields with <span class="required">*</span> are required.</p>

          <?php echo $form->errorSummary($model); ?>

          <div class="rowrecord">
            <?php
            $list=CHtml::listData(Departement::model()->findAll(), 'id', 'name');;
            ?>
            <?php echo $form->labelEx($model,'departemen_id'); ?>
            <?php echo $form->dropDownList($model, 'departemen_id',$list, array('empty' => 'Departement'));
            ?>
            <?php echo $form->error($model,'departemen_id'); ?>
          </div>

          <div class="rowrecord">
            <?php
            $kompetensilist=CHtml::listData(KompetensiHard::model()->findAll(), 'id', 'name');;
            ?>
            <?php echo $form->labelEx($model,'kompetensi_id'); ?>
            <?php echo $form->dropDownList($model, 'kompetensi_id',$kompetensilist, array('empty' => 'Kompetensi'));
            ?>
            <?php echo $form->error($model,'kompetensi_id'); ?>
            <?php /*<?php echo $form->labelEx($model,'kompetensi_id'); ?>
            <?php echo $form->textField($model,'kompetensi_id'); ?>
            <?php echo $form->error($model,'kompetensi_id'); ?>
             * 
             */?>
          </div>

          <div class="rowrecord">
             <?php
            $jenisPengembanglist=CHtml::listData(Jenispengembangan::model()->findAll(), 'id', 'nama_pengembangan');;
            ?>
            <?php echo $form->labelEx($model,'jenispengembangan_id'); ?>
            <?php echo $form->dropDownList($model, 'jenispengembangan_id',$jenisPengembanglist, array('empty' => 'Jenis Pengembangan'));
            ?>
            <?php echo $form->error($model,'jenispengembangan_id'); ?>

          </div>

          <div class="rowrecord">
            <?php echo $form->labelEx($model,'level'); ?>
            <?php echo $form->textField($model,'level'); ?>
            <?php echo $form->error($model,'level'); ?>
          </div>

          <div class="rowrecord buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
          </div>

        <?php $this->endWidget(); ?>
    </div>
    <div style="float:left;width:600px;">
       <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
		<thead>
			<tr>
				<th width="10">No</th>
				<th >Keterangan</th>
				<th width="60" >--</th>
			</tr>
		</thead>
    <tfoot>
			<tr>
				<td width="10"></td>
				<td colspan="2" style="text-align: right;"><a href="<?php echo Yii::app()->createUrl('masters/levelsaranpengembangandetailhard/create/saran_id/'.$model->id)?>" class="btn">Tambah Detail</a></td>
			</tr>
		</tfoot>
		<tbody>
			  <?php if (!empty($detail)) {
            $no = 1;
           foreach ($detail as $detailSaran) {
        ?>
        <tr>
				<td width="10"><?php echo $no++?></td>
				<td ><?php echo $detailSaran->keterangan?></td>
				<td width="60" >
            <a href="<?php echo Yii::app()->createUrl('masters/levelsaranpengembangandetailhard/update/id/'.$detailSaran->id)?>">Edit</a>
            <a href="<?php echo Yii::app()->createUrl('masters/levelsaranpengembangandetailhard/delete/id/'.$detailSaran->id)?>" onclick="return confirm('Yakin dihapus ?');">Delete</a>
        </td>
			</tr>
        <?php
           } 
        }?>
     </tbody>
		</table>
        
    </div>
        
 
</div><!-- form -->

