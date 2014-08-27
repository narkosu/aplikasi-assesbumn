<?php $here = Yii::app()->controller->action->id; ?>
<div class="speedbar">
    <div class="speedbar-content">
        <span class="button-group">
            <a href="<?php echo Yii::app()->createUrl('masters/peserta/asesor') ?>" class="button icon home">Daftar Peserta</a>
            
            <?php if (!$model->isNewRecord) { ?> 
                <?php 
                if ( !empty($params['typecompetency'] ) ){ 
                    
                    ?>
                    <a href="<?php echo Yii::app()->createUrl('masters/' . $this->id . '/penilaianhard/id/' . $model->peserta_id) ?>" <?php echo ( $here == 'penilaian') ? 'class = "button icon act_link"' : 'class = "button icon act_link"' ?>>Form</a>
                    <a href="<?php echo Yii::app()->createUrl('masters/' . $this->id . '/previewhard/id/' . $model->peserta_id) ?>" <?php echo ( $here == 'preview') ? 'class = "button icon act_link"' : 'class = "button icon act_link"' ?>>Preview</a>
                    <a href="<?php echo Yii::app()->createUrl('penilaian/laporan/downloadhard/id/' . $model->peserta_id) ?>" <?php echo ( $here == 'print') ? 'class = "button icon act_link"' : 'class = "button icon act_link"' ?>>Download Doc</a>
                <?php } else { ?>
                    <a href="<?php echo Yii::app()->createUrl('masters/' . $this->id . '/penilaian/id/' . $model->peserta_id) ?>" <?php echo ( $here == 'penilaian') ? 'class = "button icon act_link"' : 'class = "button icon act_link"' ?>>Form</a>
                    <a href="<?php echo Yii::app()->createUrl('masters/' . $this->id . '/preview/id/' . $model->peserta_id) ?>" <?php echo ( $here == 'preview') ? 'class = "button icon act_link"' : 'class = "button icon act_link"' ?>>Preview</a>
                    <a href="<?php echo Yii::app()->createUrl('penilaian/laporan/download/id/' . $model->peserta_id) ?>" <?php echo ( $here == 'print') ? 'class = "button icon act_link"' : 'class = "button icon act_link"' ?>>Download Doc</a>
                <?php } ?>
            <?php } ?>
        </span>

    </div>
</div>