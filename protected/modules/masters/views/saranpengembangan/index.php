<?php
/* @var $this PesertaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Saran Pengembangan',
);


?>

<div class="header-page">
	
	<div style="float:left;vertical-align: middle;">
		<h2 class="textTitle">Saran Pengembangan</h2>
	</div>
	<div style="float:right;">
		<?php $this->renderPartial('_submenu',array('params'=>$params, 'model'=>$model)); ?>
	</div>
	<div style="clear:both;"></div>
	
</div>

<div class="container-page">
  
  
<?php $this->widget('ext.cdatatables.cdatatables',array(
			'id'=>'example',
			'options'=>array(
					'bProcessing'=> true,
					'bServerSide'=> true,
					'sAjaxSource' => Yii::app()->createUrl('/masters/saranpengembangan/loadprocessing'),
					'aoColumns'=> array(
							array(  "mDataProp"=> "id",
                      "sName"=> "id",
                      "bSearchable"=> false,
                      "bSortable"=> false,
                      "fnRender"=> "js:function (oObj) {
                        
                          return oObj.aData['id'];

                      }"
                  
                  ),
              array(  "mDataProp"=> "departemen_id",
                      "sName"=> "departemen_id",
                      "bSearchable"=> false,
                      "bSortable"=> false,
                      "fnRender"=> "js:function (oObj) {
                        
                          return oObj.aData['departemen_id'];

                      }"
                  
                  ),
              array(  "mDataProp"=> "kompetensi_id",
                      "sName"=> "kompetensi_id",
                      "bSearchable"=> false,
                      "bSortable"=> false,
                      "fnRender"=> "js:function (oObj) {
                        
                          return oObj.aData['kompetensi_id'];

                      }"
                  
                  ),
              array(  "mDataProp"=> "jenispengembangan_id",
                      "sName"=> "jenispengembangan_id",
                      "bSearchable"=> false,
                      "bSortable"=> false,
                      "fnRender"=> "js:function (oObj) {
                        
                          return oObj.aData['jenispengembangan_id'];

                      }"
                  
                  ),
               array(  "mDataProp"=> "level",
                      "sName"=> "level",
                      "bSearchable"=> false,
                      "bSortable"=> false,
                      "fnRender"=> "js:function (oObj) {
                        
                          return oObj.aData['level'];

                      }"
                  
                  ),
              array(  "mDataProp"=> "nama_saran",
                      "sName"=> "nama_saran",
                      "bSearchable"=> false,
                      "bSortable"=> false,
                      "fnRender"=> "js:function (oObj) {
                        
                          return oObj.aData['nama_saran'];

                      }"
                  
                  ),
                  
 							array(
                "mDataProp"=> "ids",
                "sName"=> "ids",
								"bSearchable"=> false,
								"bSortable"=> false,
								"fnRender"=> "js:function (oObj) {
								return '<span class=\"button-group\">'+
										'<a href=\"".Yii::app()->createUrl('masters/saranpengembangan/update/id/')."/'+oObj.aData['ids']+'\" class=\"button icon edit\">Edit</a>'+
										//'<a href=\"#\" class=\"button icon remove danger\">Remove</a>'+
                    
										'</span>';
                    
									
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
				<th width="100">Departemen</th>
				<th >Kompetensi</th>
				<th >Jenis Pengembangan</th>
				<th >Level</th>
				<th >Saran Pengembangan</th>
				<th width="60" >--</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
		</table>
	
	</div>
</div>
<?php
Yii::app()->clientScript->registerScript('peserta', "
  $(document).delegate('.pilihasessor','click',function(){
  var pid = $(this).attr('pid');
    $.ajax({
        url:'".Yii::app()->createUrl('masters/pesertaasesor/ajaxform/pid/')."/'+pid,
        success:function(form){
          $('#tempatenya').html(form);
          $('#editplace').show();
        }
      })
      
  });
");
 ?>
