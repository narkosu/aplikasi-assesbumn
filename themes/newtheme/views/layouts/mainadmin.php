<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>SISTEM INFORMASI BADAN PENELITIAN LITBANGKES SURABAYA</title>
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl?>/css/style.default.css" type="text/css" />
<link id="addonstyle" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl?>/css/style.dark.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl?>/prettify/prettify.css" type="text/css" />
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/prettify/prettify.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/js/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/js/jquery.autogrow-textarea.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/js/charCount.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/js/ui.spinner.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/js/custom.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl?>/js/forms.js"></script>

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
    
    		<div class="datewidget">Hari ini is Senin, 2 Juni 2014</div>
        
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">MENU UTAMA</li>
               <?php if (Yii::app()->user->getIsSuperAdmin()) { ?>
                    <li>
                        <a <?php //// echo ($this->menuactive=='master' ? 'class="active"':'')?> href="<?php echo Yii::app()->createUrl('masters') ?>"
                           <?php echo ($this->id == 'default' ? 'class="active"' : '') ?>>
                            <i class="icon-home"></i> <span>Master</span>
                        </a>
                    </li>
                    <!--<li><a href="<?php echo Yii::app()->createUrl('masters/anggota') ?>" ><i class="icon-group"></i> <span>Anggota Admin</span></a></li>-->
                    <li>
                        <a <?php // // echo ($this->menuactive=='asesor' ? 'class="active"':'')?> href="<?php echo Yii::app()->createUrl('masters/masterasesor') ?>" >
                            <i class="icon-group"></i> <span>Asesor</span>
                        </a>
                    </li>
                    <?php /*
                     * <li>
                        <a <?php // echo ($this->menuactive=='strukturorganisasi' ? 'class="active"':'')?> href="<?php echo Yii::app()->createUrl('masters/strukturorganisasi') ?>" >
                            <i class="icon-group"></i> <span>Struktur Organisasi</span>
                        </a>
                    </li>
                    
                    <li >
                        <a <?php // echo ($this->menuactive=='pegawai' ? 'class="active"':'')?> href="<?php echo Yii::app()->createUrl('masters/pegawai') ?>" >
                            <i class="icon-group"></i> <span>Pegawai</span>
                        </a>
                    </li>
                     */
                    ?>
                     
                    <li>
                        <a <?php // echo ($this->menuactive=='peserta' ? 'class="active"':'')?> href="<?php echo Yii::app()->createUrl('masters/peserta') ?>" >
                            <i class="icon-group"></i> <span>Peserta</span>
                        </a>
                    </li>
                    <li>
                        <a <?php // echo ($this->menuactive=='form_idp' ? 'class="active"':'')?> href="<?php echo Yii::app()->createUrl('masters/peserta/idp') ?>" >
                            <i class="icon-group"></i> <span>Form IDP</span>
                        </a>
                    </li>
                    <li>
                        <a <?php // echo ($this->menuactive=='laporan' ? 'class="active"':'')?> href="<?php echo Yii::app()->createUrl('masters/peserta/rekapitulasi') ?>" >
                            <i class="icon-group"></i> <span>Laporan</span>
                        </a>
                    </li>


                <?php } ?>
                <li><a href="index.html"><span class="icon-align-justify"></span> Daftar Penelitian</a></li>
                <li class="active"><a href="pengajuan.html"><span class="icon-upload"></span> Pengajuan Penelitian</a></li>
                <li><a href="progress.html"><span class="icon-indent-left"></span> Progres Penelitian</a></li>
                <li><a href="output.html"><span class="icon-book"></span> Output Penelitian</a></li>
                <li><a href="">&nbsp;</a></li>
                <li><a href="editprofil.html"><span class="icon-user"></span> Edit Profil</a></li>
                <li><a href="gantipassword.html"><span class="icon-cog"></span> Ganti Password</a></li>
                <li><a href="logout.html"><span class="icon-off"></span> Logout</a></li>
            </ul>
        </div><!--leftmenu-->
        
    </div><!--mainleft-->
    <!-- END OF LEFT PANEL -->
    
    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">  	
      
      <div class="breadcrumbwidget">
        <ul class="breadcrumb">
              <li><a href="dashboard.html">Halaman Depan</a> <span class="divider">/</span></li>
              <li class="active">Pengajuan Proposal<span class="divider">/</span></li>
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
