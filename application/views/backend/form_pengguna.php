<div class="row">
  <div class="box col-md-12">
    <div class="box-inner">
      <div class="well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i>  Form Pengguna <?php if(isset($edit)){ echo'<span class="label label-info">Edit Data</span>';} else {echo'<span class="label label-info">Tambah Data</span>'; }?>  </h2>
        <!--
          <div class="box-icon">
              <a href="<?php echo base_url(); ?>#" class="btn btn-setting btn-round btn-default"><i
                      class="glyphicon glyphicon-cog"></i></a>
              <a href="<?php echo base_url(); ?>#" class="btn btn-minimize btn-round btn-default"><i
                      class="glyphicon glyphicon-chevron-up"></i></a>
              <a href="<?php echo base_url(); ?>#" class="btn btn-close btn-round btn-default"><i
                      class="glyphicon glyphicon-remove"></i></a>
          </div>
          -->
      </div>
      <div class="box-content">
	  
	  <?php 
	if(isset($pesan)){
		echo'
	<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Well done!</strong>'.$pesan.'.
                </div>
				';
	}
				?>
				
        <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url().$urlAction ; ?>" >
          <div class="form-group">
            <label for="exampleInputEmail1">Nama<font color="red">*</font></label>
            <input type="text" name="nama"class="form-control" id="text" value="<?php if(isset($nama_isi)) echo $nama_isi; ?>"   placeholder="Masukkan Nama" style="width:400px" >
			<?php if(isset($errnama)){ echo'<p><font color="red">Nama belum diisi</font></p>'; }?>

		 </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Username<font color="red">*</font></label>
            <input type="text"  name="username" class="form-control" id="text" value="<?php if(isset($username)) echo $username; ?>"   placeholder="Masukkan Username" style="width:400px" >
			<?php if(isset($errusername)){ echo'<p><font color="red">Username belum diisi</font></p>'; }?>
		  </div>
		  <div class="form-group">
            <label for="exampleInputEmail1">Email<font color="red">*</font></label>
            <input type="text"  name="email" class="form-control" id="text2" value="<?php if(isset($email)) echo $email; ?>"   placeholder="Masukkan Email" style="width:400px" >
			<?php if(isset($erremail)){ echo'<p><font color="red">Email belum diisi</font></p>'; }?>
		  </div>
          <?php if(isset($edit) && $role!=1 ){
            echo'
            <div class="form-group">
                              <label for="exampleInputPassword1">Recent Password</label>
                              <input type="password" name="recpassword" class="form-control" id="exampleInputPassword1" placeholder="Password" style="width:400px">
							  
                          </div>';
            
            }
			if(isset($errrecpasswrod)){ echo'<p><font color="red">Recent Password belum diisi</font></p>'; }
			?>
          <div class="form-group">
            <label for="exampleInputPassword1">New Password<font color="red">*</font></label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" style="width:400px">
			<?php if(isset($errpassword)){ echo'<p><font color="red">Password belum diisi</font></p>'; }?>
          </div>
		  <?php if(  $role<=2  || isset($edit)==false ){ ?>
          <label for="exampleInputEmail1">Peran<font color="red">*</font></label>
		  <?php if(isset($errperan)){ echo'<p><font color="red">Peran belum diisi</font></p>'; }?>
          <div class="radio">
            <label>
            <input type="radio" name="peran" id="optionsRadios1" value="2"   <?php if(isset($role_isi) && $role_isi==2 ) echo 'checked'; ?> >
            Direktur
            </label>
            <label>
            <input type="radio" name="peran" id="optionsRadios1" value="3" <?php if(isset($role_isi) && $role_isi==3 ) echo 'checked'; ?>>
            Sistem Analis
            </label>
            <label>
            <input type="radio" name="peran" id="optionsRadios1" value="4" <?php if(isset($role_isi) && $role_isi==4 ) echo 'checked'; ?>>
            Sekretaris
            </label>
          </div>
          <p class="help-block">NB: <font color="red">*</font> Wajib Diisi</p>
		  <?php } ?>
		  <?php if($role==1 || $role==2){?>
		  <a class="btn btn-primary" href="<?php echo base_url();?>user/daftar_pengguna">
		  <?php } 
		  else { ?>
		  <a class="btn btn-primary" href="<?php echo base_url();?>homepage">
		  <?php } ?>
                <i class="glyphicon glyphicon-chevron-left icon-white">  </i>
                Kembali
            </a>
		   <?php if(isset($edit)){
            echo'<button type="submit" class="btn btn-success">Perbaharui</button>';
            
            }
			else{
				echo '<button type="submit" class="btn btn-success">Simpan</button>';
			}?>
          
        </form>
      </div>
    </div>
  </div>
  <!--/span-->
</div>
<!--/row-->