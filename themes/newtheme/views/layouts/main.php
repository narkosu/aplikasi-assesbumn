<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>SISTEM INFORMASI ASSESSMENT <?php echo (Yii::app()->user->getState('current_departement_name')); ?></title>
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl?>/css/style.default.css" type="text/css" />
<link id="addonstyle" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl?>/css/style.dark.css" type="text/css" />
<link id="addonstyle" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl?>/css/buttons.css" type="text/css" />
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/js/bootstrap.min.js"></script>

<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
</head>

<body>
<!-- START OF HEADER -->

    	

<div class="mainwrapper fullwrapper">
		
    <div class="headerpanel">
        	<a href="" class="showmenu"></a><h1 > SISTEM INFORMASI ASSESSMENT <?php echo (Yii::app()->user->getState('current_departement_name')); ?></h1>  
            
            <div class="headerright">
                
    					<div class="dropdown userinfo">
              			
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">Hi, <?php echo Yii::app()->user->name?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!--<li><a href="editprofile.html"><span class="icon-edit"></span> Edit Profile</a></li>-->
                        <!--<li><a href=""><span class="icon-wrench"></span> Ganti Password</a></li>-->
                        <!--<li class="divider"></li>-->
                        <li><a href="<?php echo Yii::app()->createUrl('site/logout')?>"><span class="icon-off"></span> Sign Out</a></li>
                    </ul>
                </div><!--dropdown-->
    		
            </div><!--headerright-->
            
    	</div><!--headerpanel-->
		
		
    <!-- START OF LEFT PANEL -->
    <div class="leftpanel">
    
    		<div class="datewidget">Hari ini : <?php echo date('d M Y')?></div>
        <?php /*
    		<div class="plainwidget">
            <h6>Nama:<strong> Nirta Aditya</strong></h6>
            <h6>NIP:<strong> 123456789</strong></h6>
            <h6>Satker:<strong> Nama satuan kerja</strong></h6>
        </div><!--plainwidget-->
        */?>
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">MENU UTAMA</li>
               <?php if (Yii::app()->user->getIsSuperAdmin()) { ?>
                    <li>
                        <a <?php //// echo ($this->menuactive=='master' ? 'class="active"':'')?> href="<?php echo Yii::app()->createUrl('masters') ?>"
                           <?php echo ($this->id == 'default' ? 'class="active"' : '') ?>>
                            <span class="icon-align-justify"></span> Master
                        </a>
                    </li>
                    <!--<li><a href="<?php echo Yii::app()->createUrl('masters/anggota') ?>" ><i class="icon-group"></i> <span>Anggota Admin</span></a></li>-->
                    <li>
                        <a <?php // // echo ($this->menuactive=='asesor' ? 'class="active"':'')?> href="<?php echo Yii::app()->createUrl('masters/masterasesor') ?>" >
                            <span class="icon-ok"></span> Asesor
                        </a>
                    </li>
                    
                    <li>
                        <a <?php // echo ($this->menuactive=='peserta' ? 'class="active"':'')?> href="<?php echo Yii::app()->createUrl('masters/peserta') ?>" >
                           <span class="icon-th-list"></span> Peserta
                        </a>
                    </li>
                    <li>
                        <a <?php // echo ($this->menuactive=='form_idp' ? 'class="active"':'')?> href="<?php echo Yii::app()->createUrl('masters/peserta/idp') ?>" >
                            <span class="icon-list-alt"></span> Form IDP
                        </a>
                    </li>
                    <li>
                        <a <?php // echo ($this->menuactive=='laporan' ? 'class="active"':'')?> href="<?php echo Yii::app()->createUrl('masters/peserta/rekapitulasi') ?>" >
                            <span class="icon-book"></span> Laporan
                        </a>
                    </li>


                <?php } ?>
                <?php if (Yii::app()->user->getIsAuthor()) { ?>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('#') ?>" >
                            <i class="icon-group"></i> <span>Profil</span>
                        </a>
                    </li>

                    <li><a href="<?php echo Yii::app()->createUrl('masters/peserta/asesor') ?>" ><i class="icon-group"></i> <span>Peserta</span></a></li>

                <?php } ?>
                <?php
                //print_r(Yii::app()->user->getUserPeserta());
                ?>

                <?php if (Yii::app()->user->getIsMember()) { ?>
                    <li><a href="<?php echo Yii::app()->createUrl('masters/peserta/view/id/' . Yii::app()->user->getUserPeserta()->peserta_id) ?>" >
                            <i class="icon-group"></i> <span>Profil</span></a>
                    </li>

                    <li><a href="<?php echo Yii::app()->createUrl('penilaian/laporan/preview/id/' . Yii::app()->user->getUserPeserta()->peserta_id) ?>" >
                            <i class="icon-group"></i> <span>Penilaian SOFT</span></a>
                    </li>
                    <li><a href="<?php echo Yii::app()->createUrl('penilaian/laporan/previewhard/id/' . Yii::app()->user->getUserPeserta()->peserta_id) ?>" >
                            <i class="icon-group"></i> <span>Penilaian HARD</span></a>
                    </li>

                    <li><a href="<?php echo Yii::app()->createUrl('penilaian/idp/index/id/' . Yii::app()->user->getUserPeserta()->peserta_id) ?>" >
                            <i class="icon-group"></i> <span>IDP SOFT</span></a>
                    </li>
                    <li><a href="<?php echo Yii::app()->createUrl('penilaian/idp/sethard/id/' . Yii::app()->user->getUserPeserta()->peserta_id) ?>" >
                            <i class="icon-group"></i> <span>IDP HARD</span></a>
                    </li>
                <?php } ?>    
                <?php /*<li><a href="index.html"><span class="icon-align-justify"></span> Daftar Penelitian</a></li>
                <li class="active"><a href="pengajuan.html"><span class="icon-upload"></span> Pengajuan Penelitian</a></li>
                <li><a href="progress.html"><span class="icon-indent-left"></span> Progres Penelitian</a></li>
                <li><a href="output.html"><span class="icon-book"></span> Output Penelitian</a></li>
                <li><a href="">&nbsp;</a></li>
                <li><a href="editprofil.html"><span class="icon-user"></span> Edit Profil</a></li>
                <li><a href="gantipassword.html"><span class="icon-cog"></span> Ganti Password</a></li>
                <li><a href="logout.html"><span class="icon-off"></span> Logout</a></li>
                 * 
                 */?>
            </ul>
        </div><!--leftmenu-->
        
    </div><!--mainleft-->
    <!-- END OF LEFT PANEL -->
    
    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">  	
      
      <div class="breadcrumbwidget">
        <ul class="breadcrumb">
              <li>Halaman Depan <span class="divider">/</span></li>
              <!--<li class="active">Pengajuan Proposal<span class="divider">/</span></li>-->
          </ul>
      </div><!--breadcrumbs-->
       
      <!-- 
      <div class="pagetitle">
        	<h1>Pengajuan Proposal Penelitian</h1>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<?php echo $content ?>
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
    <div class="clearfix"></div>
    
    <div class="footer">
    	<div class="footerleft">&copy; BUMN 2014. All Rights Reserved.</div>
    	<div class="footerright"></div>
    </div><!--footer-->

    
</div><!--mainwrapper-->
</body>
</html>
<script type="text/javascript">
    // dropdown in leftmenu
	jQuery('.leftmenu .dropdown > a').click(function(){
		if(!jQuery(this).next().is(':visible'))
			jQuery(this).next().slideDown('fast');
		else
			jQuery(this).next().slideUp('fast');	
		return false;
	});
<script>