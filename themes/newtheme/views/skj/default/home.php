<div class="contentinner content-dashboard">                
<div class="row-fluid">
  <div class="span16"> 
      <div class="header-page">
	<div style="float:left;vertical-align: middle;">
		<h2 class="textTitle">Daftar SKJ</h2>
	</div>
	<div style="float:right;">
		<?php $this->renderPartial('_submenu'); ?>
	</div>
	<div style="clear:both;"></div>
</div>

<div class="container-page">
	<?php $this->widget('ext.cdatatables.cdatatables',array(
			'id'=>'example',
			'options'=>array(
					'bProcessing'=> true,
					'bServerSide'=> true,
					'sAjaxSource' => Yii::app()->createUrl('/skj/default/loadprocessing'),
					'aoColumns'=> array(
									  'null',
              array("mDataProp"=> "departement",
                "sName"=> "Depertement"),
              'null','null', 
              array("mDataProp"=> "tgl_selesai",
                "sName"=> "Tgl Berakhir"),
              array("mDataProp"=> "type",
                "sName"=> "Type"),

 							array("sName"=> "ID",
								"bSearchable"=> false,
								"bSortable"=> false,
								"fnRender"=> "js:function (oObj) {
								return '<span class=\"button-group\">'+
										'<a href=\"".Yii::app()->createUrl('skj/masterskj/update/id/')."/' + oObj.aData[0] + '\" class=\"button icon edit\">Edit</a>'+
										'<a href=\"#\" class=\"button icon remove danger\">Remove</a>'+
										'<a href=\"".Yii::app()->createUrl('skj/itemskj/index/id/')."/' + oObj.aData[0] + '\" class=\"button icon settings\">View</a>'+
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
				<th width="100">Departement</th>
				<th >Nama SKJ</th>
				<th >Tahun</th>
				<th width="100">Tanggal Berakhir</th>
				<th >Type</th>
				<th width="210">--</th>
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