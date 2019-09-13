<div class="row">
  <div class="box col-md-12">
    <div class="box-inner">
      <div class="well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i>Form  Anggota <?php if(isset($edit)){ echo'<span class="label label-info">Edit Data</span>';} else {echo'<span class="label label-info">Tambah Data</span>'; }?>  </h2>
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
            <label for="exampleInputEmail1">Nama<font color="red">*</font>  </label>
            <input type="text" name="nama_anggota"class="form-control" id="text"  value="<?php if(isset($nama_anggota)) echo $nama_anggota; ?>"   placeholder="Masukkan nama anggota" style="width:400px" >
			<?php if(isset($errnama_anggota)){ echo'<p><font color="red">nama anggota belum diisi</font></p>'; }?>

		 </div>
		 
		 <div class="form-group">
            <label for="exampleInputEmail1">Profesi<font color="red">*</font> </label>
			<div class="controls" >
                        <select id="selectError" name="profesi" data-rel="chosen" style="width:200px" >
						 <option value="0">Pilih Profesi Anggota</option>
                           <?php foreach($profesi->result() as $row){?>
                            <option value="<?php echo $row->ID_PROFESI; ?>" <?php if(isset($id_profesi) && $id_profesi==$row->ID_PROFESI)echo 'selected'; ?> ><?php echo $row->NAMA_PROFESI;  ?></option>
                            
						 <?php } ?>
                        </select>
                    </div>			<?php if(isset($errprofesi)){ echo'<p><font color="red">profesi belum diisi</font></p>'; }?>
		  </div>
		  
          
			 
			 <div class="form-group">
            <label for="exampleInputEmail1">Pengalaman<font color="red">*</font>  </label>
            <input type="text" name="pengalaman"class="form-control" id="text"  value="<?php if(isset($pengalaman)) echo $pengalaman; ?>"   placeholder="Masukkan pengalaman anggota" style="width:400px" >
			<?php if(isset($errpengalaman)){ echo'<p><font color="red">pengalaman anggota belum diisi</font></p>'; }?>

		 </div>
		 <p class="help-block">NB: <font color="red">*</font> Wajib Diisi</p>
		 
           <a class="btn btn-primary" href="<?php echo base_url();?>anggota/daftar_anggota">
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