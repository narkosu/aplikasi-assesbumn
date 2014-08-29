<div class="speedbar">
    <div class="speedbar-content">
		
		<Div style="float:left;">
			
			
			<span class="button-group">
				<a href="<?php echo Yii::app()->createUrl($this->module->id.'/deputi')?>" class="button icon home">Deputi</a>
				<a href="<?php echo Yii::app()->createUrl($this->module->id.'/deputi/create')?>" class="button icon add">Tambah</a>
				<a href="<?php echo Yii::app()->createUrl($this->module->id.'/deputi')?>" class="button icon log">Daftar</a>
			</span>
			<?php /*
			<div style="float:left;text-transform:uppercase;color:#fff;margin-top:9px;padding:5px;"><?php echo $this->module->id?> : </div>
			<ul class="menu-speedbar">
				<li><a href="<?php echo Yii::app()->createUrl($this->module->id.'/masterskj/create')?>">Tambah Baru</a></li>
				<li><a href="<?php echo Yii::app()->createUrl($this->module->id.'/'.$this->id.'')?>" class="act_linkx">Daftar</a></li>
				
			</ul>*/?>
		</Div>
		<div style="clear:both;"></div>
	</div>
</div>