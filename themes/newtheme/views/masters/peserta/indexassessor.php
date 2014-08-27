<?php
/* @var $this PesertaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pesertas',
);

$this->menu=array(
	array('label'=>'Create Peserta', 'url'=>array('create')),
	array('label'=>'Manage Peserta', 'url'=>array('admin')),
);
?>
<div class="contentinner content-dashboard">                
<div class="row-fluid">
  <div class="span16"> 
<div class="header-page">
	
	<div style="float:left;vertical-align: middle;">
		<h2 class="textTitle">Daftar Peserta</h2>
	</div>
	
	<div style="clear:both;"></div>
</div>
<div class="container-page">
<?php $this->widget('ext.cdatatables.cdatatables',array(
			'id'=>'example',
			'options'=>array(
					'bProcessing'=> true,
					'bServerSide'=> true,
					'sAjaxSource' =>  $urlAjax,
					'aoColumns'=> array(
									  array( "mDataProp"=> "id" ),array( "mDataProp"=> "id_departemen" ),
									  array( "mDataProp"=> "peserta.nip" ),array( "mDataProp"=> "peserta.nama_peserta" ),

 							array(
									"mDataProp"=> "ids",
									"sName"=> "ID",
								"bSearchable"=> false,
								"bSortable"=> false,
								"fnRender"=> "js:function (oObj) {
									return '<a class=\"table-action-deletelinks\" href=\"".Yii::app()->createUrl('masters/pesertaasesor/penilaian/id')."/' + oObj.aData['id'] + '\">SOFT</a>'+
                          '<a class=\"table-action-deletelinks\" href=\"".Yii::app()->createUrl('masters/pesertaasesor/penilaianhard/id')."/' + oObj.aData['id'] + '\">HARD</a>'
                          ;
									
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
				<th >Nip</th>
				<th >Nama</th>
				<th >edit</th>
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

