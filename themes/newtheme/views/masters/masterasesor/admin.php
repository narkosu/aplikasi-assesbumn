<?php
/* @var $this MasterasesorController */
/* @var $model Masterasesor */

$this->breadcrumbs=array(
	'Masterasesors'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Masterasesor', 'url'=>array('index')),
	array('label'=>'Create Masterasesor', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('masterasesor-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="contentinner content-dashboard">                
<div class="row-fluid">
  <div class="span16">  
    <div class="header-page">
      <div style="float:left;vertical-align: middle;">
        <h2 class="textTitle">Daftar Asesor</h2>
      </div>

      <div style="float:right;">
        <?php $this->renderPartial('_submenu',array('params'=>$params)); ?>
      </div>
      <div style="clear:both;"></div>

    </div>

    <div class="container-page">
      <?php $this->widget('ext.cdatatables.cdatatables',array(
          'id'=>'example',
          'options'=>array(
              'bProcessing'=> true,
              'bServerSide'=> true,
              'sAjaxSource' => Yii::app()->createUrl('/masters/masterasesor/loadprocessing'),
              'aoColumns'=> array(
                        'null','null','null','null',

                  array("sName"=> "ID",
                    "bSearchable"=> false,
                    "bSortable"=> false,
                    "fnRender"=> "js:function (oObj) {
                    return '<span class=\"button-group\">'+
                        '<a href=\"".Yii::app()->createUrl('masters/masterasesor/update/id/')."/' + oObj.aData[4] + '\" class=\"button icon edit\">Edit</a>'+
                        '<a href=\"#\" class=\"button icon remove danger\">Remove</a>'+
                        '<a href=\"".Yii::app()->createUrl('masters/masterasesor/assesspeserta/id/')."/' + oObj.aData[4] + '\" class=\"button icon user\">Peserta</a>'+
                        '</span>';
                      //return '<a class=\"table-action-deletelink\" href=\"DeleteData.php?test=test&id=' + oObj.aData[4] + '\">Edit</a>';

                        }"
                  )

                )

            )
          ));
    ?>

      <div style="width:100%">
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
        <thead>
          <tr>
            <th width="50">Id</th>
            <th width="100">Kode Asesor</th>
            <th >Nama Asesor</th>
            <th >Telp</th>
            <th width="215">--</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
        </table>

      </div>
    </div>
  </div>
  </div>
  </div>
    