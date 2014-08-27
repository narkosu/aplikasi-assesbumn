<?php /*<div class="speedbar">
    <div class="speedbar-content">
		<ul class="menu-drop">
			<li><a href="#"><i class="icon-chevron-down"></i></a>
				<ul>
					<li><a href="<?php echo Yii::app()->createUrl('masters/departement')?>">Departement</a></li>
					<li><a href="<?php echo Yii::app()->createUrl('masters/deputi')?>">Deputi</a></li>
					<li><a href="<?php echo Yii::app()->createUrl('masters/unitkerja')?>">Unit Kerja</a></li>
					<li><a href="<?php echo Yii::app()->createUrl('masters/jabatan')?>">Jabatan</a></li>
					<li><a href="<?php echo Yii::app()->createUrl('masters/tingkatjabatan')?>">Tingkat Jabatan</a></li>
					<li><a href="<?php echo Yii::app()->createUrl('masters/jeniskompetensi')?>">Jenis Kompetensi</a></li>
					<li><a href="<?php echo Yii::app()->createUrl('masters/kompetensi')?>">Kompetensi</a></li>
				</ul>  
			</li>
		</ul>
		<ul class="menu-speedbar">
			<li><a href="<?php echo Yii::app()->createUrl('masters/'.$this->id.'/create')?>">Tambah Baru</a></li>
			<li><a href="<?php echo Yii::app()->createUrl('masters/'.$this->id.'')?>" class="act_linkx">Daftar</a></li>
			
		</ul>
	</div>
</div>*/?>

<?php $here = Yii::app()->controller->action->id;?>
<div class="speedbar">
    <div class="speedbar-content">
		<span class="button-group">
			  <a href="<?php echo Yii::app()->createUrl('masters/'.$this->id.'/create/saran_id/'.$model->id_saranpengembangan)?>" <?php echo ( $here == 'create') ? 'class = "button icon act_link"':'class = "button icon act_link"' ?>>Tambah</a>
        <a href="<?php echo Yii::app()->createUrl('masters/levelsaranpengembanganhard/update/id/'.$model->id_saranpengembangan)?>" <?php echo ( $here == 'index') ? 'class = "button icon act_link"':'class = "button icon act_link"' ?>>Daftar</a>
        
		</span>
		<?php /*
		<ul class="menu-speedbar">
			<li><a href="<?php echo Yii::app()->createUrl('masters/peserta/asesor')?>">Daftar Peserta</a></li>
			<li><a href="<?php echo Yii::app()->createUrl('masters/'.$this->id.'/penilaian/id/'.$model->peserta_id)?>" <?php echo ( $here == 'penilaian') ? 'class = "act_link"':'' ?>>Form</a></li>
			<?php if ( !$model->isNewRecord ) { ?> 
			<li><a href="<?php echo Yii::app()->createUrl('masters/'.$this->id.'/preview/id/'.$model->peserta_id)?>" <?php echo ( $here == 'preview') ? 'class = "act_link"':'' ?>>Preview</a></li>
			<li><a href="<?php echo Yii::app()->createUrl('masters/'.$this->id.'/download/id/'.$model->peserta_id)?>" <?php echo ( $here == 'print') ? 'class = "act_link"':'' ?>>Download Doc</a></li>
			<?php } ?>
			
		</ul>
		*/?>
	</div>
</div>