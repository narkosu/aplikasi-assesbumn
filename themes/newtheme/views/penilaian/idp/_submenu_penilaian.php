<?php 
$here = Yii::app()->controller->action->id; ?>
<div class="speedbar">
  <div class="speedbar-content">
    <span class="button-group">
      
        <?php /*<a href="" id="saveButton" <?php echo ( $here == 'print') ? 'class = "button icon act_link"' : 'class = "button icon act_link"' ?>>Simpan</a>*/?>
        <?php if ($params['competency'] == 1 ) { ?>
        <a href="<?php echo Yii::app()->createUrl('penilaian/idp/index/id/'.$params['id'])?>"  <?php echo ( $here == 'index') ? 'class = "button icon active"' : 'class = "button icon act_link"' ?> id="PreviewButton" <?php echo ( $here == 'print') ? 'class = "button icon act_link"' : 'class = "button icon act_link"' ?>>IDP</a>
        <?php } else { ?>
        <a href="<?php echo Yii::app()->createUrl('penilaian/idp/sethard/id/'.$params['id'])?>"  <?php echo ( $here == 'sethard') ? 'class = "button icon active"' : 'class = "button icon act_link"' ?> id="PreviewButton" <?php echo ( $here == 'print') ? 'class = "button icon act_link"' : 'class = "button icon act_link"' ?>>IDP</a>
        <?php } ?>
        <?php if ($model) { ?> 
            <?php if ( $model->isNewRecord ) { ?>
            <a href="<?php echo Yii::app()->createUrl('penilaian/idp/preview/id/'.$params['id'].'/competency/'.$params['competency'])?>" id="PreviewButton" <?php echo ( $here == 'preview') ? 'class = "button icon active"' : 'class = "button icon act_link"' ?>>Preview</a>
            <a href="<?php echo Yii::app()->createUrl('penilaian/idp/download/id/'.$params['id'].'/competency/'.$params['competency'])?>" id="download" <?php echo ( $here == 'download') ? 'class = "button icon active"' : 'class = "button icon act_link"' ?>>Download as Doc</a>
            <a href="#" id="cancelButton" <?php echo ( $here == 'print') ? 'class = "button icon active"' : 'class = "button icon act_link"' ?>>Cancel</a>
            <?php } ?>
        <?php } ?>
    </span>

  </div>
</div>
<?php
Yii::app()->clientScript->registerScript('search', "
  $('#saveButton').click(function(){
    //alert('Save in progress');
    alert($('#idp-form').serialize());
    return false;
  });
  
  $('#cancelButton').click(function(){
    alert('cancel in progress');
  });
  
");
?>

