<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>Aplikasi Use Case Point Cost Estimation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link href="<?php echo base_url(); ?>css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>css/charisma-app.css" rel="stylesheet">
    <link href='<?php echo base_url(); ?>bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='<?php echo base_url(); ?>bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/jquery.noty.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/noty_theme_default.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/elfinder.min.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/elfinder.theme.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/uploadify.css' rel='stylesheet'>
    <link href='<?php echo base_url(); ?>css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.ico">

</head>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
           
			
          
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
			<!--
            <div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="<?php echo base_url(); ?>#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="<?php echo base_url(); ?>#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="<?php echo base_url(); ?>#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="<?php echo base_url(); ?>#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="<?php echo base_url(); ?>#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="<?php echo base_url(); ?>#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="<?php echo base_url(); ?>#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="<?php echo base_url(); ?>#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="<?php echo base_url(); ?>#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>
            <!-- theme selector ends -->

            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
			<!--
                <li><a href="<?php echo base_url(); ?>#"><i class="glyphicon glyphicon-globe"></i> Visit Site</a></li>
                <li class="dropdown">
                    <a href="<?php echo base_url(); ?>#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Dropdown <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo base_url(); ?>#">Action</a></li>
                        <li><a href="<?php echo base_url(); ?>#">Another action</a></li>
                        <li><a href="<?php echo base_url(); ?>#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url(); ?>#">One more separated link</a></li>
                    </ul>
                </li>
                <li>
                    <form class="navbar-search pull-left">
                        <input placeholder="Search" class="search-query form-control col-md-10" name="query"
                               type="text">
                    </form>
					
                </li>
				-->
            </ul>

        </div>
    </div>
<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Informasi Perhitungan UAW</h2>

      
    </div>
    <div class="box-content">
	
	<?php 
	if(isset($pesan)){
		echo'
	<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Well done!</strong>'.$pesan.'.
                </div>
				';
	}
				?>
				<p align="justify">
				UAW didapatkan berdasarkan kompleksitas dari semua actor yang ada di semua use case. 
				Mirip dengan UUCW, UAW mengkategorikan actor berdasarkan kompleksitas dari actor itu sendiri. 
				Aktor dalam UAW ini diklasifikasikan kedalam bentuk simple, Average dan Complex.
				Setiap kategori tersebut, masing-masing terdapat bobot nilai
				</p>
    <table class="table table-bordered">
    <thead>
    <tr>
		<th>No</th>
        <th>Tipe</th>
        <th>Klasifikasi Aktor</th>
		 <th>Bobot</th>
       
        
    </tr>
    </thead>
    <tbody>
	<?php $no =0;
	foreach($isi->result() as $row){ $no++; ?>
	
	<tr>
	 <td>
	<?php echo $no; ?>
	</td>
	
	<td>
	<?php echo $row->TIPE_AKTOR; ?>
	</td>
	
	<td>
	<?php echo $row->KLASIFIKASI_AKTOR; ?>
	</td>
	<td>
	<?php echo $row->BOBOT; ?>
	</td>
	
	
		
	</tr>
	<?php }?>
	
    
   
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->
