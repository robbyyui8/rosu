<div class="col-sm-2 col-lg-2">
    <div class="sidebar-nav">
        <div class="nav-canvas">
            <div class="nav-sm nav nav-stacked">

            </div>
            <ul class="nav nav-pills nav-stacked main-menu">
                <li class="nav-header">Main</li>
				 <li><a class="ajax-link" href="<?php echo base_url(); ?>homepage"><i class="glyphicon glyphicon-home"></i><span> Homepage</span></a>
                     
					 </li>
				
				   
				   <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-usd"></i><span> Estimasi Harga</span></a>
                    <ul class="nav nav-pills nav-stacked">
                       						
						<li><a class="ajax-link" href="<?php echo base_url(); ?>estimasi/form_client"><i
                                    class="glyphicon glyphicon-plus-sign"></i><span> Tambah</span></a>
									</li>
									
                       <li><a class="ajax-link" href="<?php echo base_url(); ?>log_estimasi/daftar_log_estimasi"><i
                                    class="glyphicon glyphicon-align-justify"></i><span> Log Estimasi </span></a>
									</li>
                    </ul>
                </li>
				
				<?php if($role==2 || $role==1 ){?>
				
                <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-user"></i><span> Pengguna</span></a>
                    <ul class="nav nav-pills nav-stacked">
                        					
						<li><a class="ajax-link" href="<?php echo base_url(); ?>user/form_pengguna"><i
                                    class="glyphicon glyphicon-plus-sign"></i><span> Tambah Pengguna</span></a>
									</li>
						
						<li><a class="ajax-link" href="<?php echo base_url(); ?>user/daftar_pengguna"><i
                                    class="glyphicon glyphicon-align-justify"></i> <span> Daftar Pengguna</span></a>
									</li>
									
                    </ul>
                </li>
				
				 <li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-wrench"></i><span> Tim Pengembang</span></a>
                    <ul class="nav nav-pills nav-stacked">
					
						<li><a class="ajax-link" href="<?php echo base_url(); ?>anggota/form_anggota"><i
                                    class="glyphicon glyphicon-plus-sign"></i><span> Tambah Anggota Tim</span></a>
									</li>
						
						<li><a class="ajax-link" href="<?php echo base_url(); ?>anggota/daftar_anggota"><i
                                    class="glyphicon glyphicon-align-justify"></i> <span> Daftar Anggota</span></a>
									</li>
							
                    </ul>
                </li>
				
						
				<li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-th-large"></i><span> Aktivitas</span></a>
                    <ul class="nav nav-pills nav-stacked">
                       		
						<li><a class="ajax-link" href="<?php echo base_url(); ?>aktivitas/daftar_aktivitas"><i
                                    class="glyphicon glyphicon-align-justify"></i> <span> Daftar Aktivitas</span></a>
									</li>
						
					</ul>
                </li> 
				
				<li class="accordion">
                    <a href="#"><i class="glyphicon glyphicon-briefcase"></i><span> Profesi</span></a>
                    <ul class="nav nav-pills nav-stacked">
                       						
						<li><a class="ajax-link" href="<?php echo base_url(); ?>profesi/form_profesi"><i
                                    class="glyphicon glyphicon-plus-sign"></i><span> Tambah Profesi</span></a>
									</li>
						
						<li><a class="ajax-link" href="<?php echo base_url(); ?>profesi/daftar_profesi"><i
                                    class="glyphicon glyphicon-align-justify"></i> <span> Daftar Profesi</span></a>
									</li>
									
                    
					
					</ul>
                </li> 
				<?php }?>
				 </ul>

        </div>
    </div>
</div>
<!--/span-->
<noscript>
    <div class="alert alert-block col-md-12">
        <h4 class="alert-heading">Warning!</h4>

        <p>You need to have <a href="<?php echo base_url(); ?>http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
    </div>
</noscript>

<div id="content" class="col-lg-10 col-sm-10">