<div class="row">
  <div class="box col-md-12">
    <div class="box-inner">
      <div class="well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i> Form  Aktivitas <?php if(isset($edit)){ echo'<span class="label label-info">Edit Data Pelaku</span>';} else {echo'<span class="label label-info">Tambah Data</span>'; }?>  </h2>
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
            <label for="exampleInputEmail1">Nama  Aktivitas </label>
            <h4> <?php if(isset($nama_aktivitas)) echo $nama_aktivitas; ?></h4>
			

		 </div>
          
		  
		  <div class="form-group">
		  <label for="exampleInputEmail1">Kategori Aktivitas</label>
			  
	
				<h4> <?php if( $id_kategori_aktivitas==1){echo 'Software Development';} ?> 
                     <?php if( $id_kategori_aktivitas==2){echo 'On Going Activity'; }?> 
					 <?php if( $id_kategori_aktivitas==3){ echo 'Quality and Testing'; } ?> 
					 </h4>

                      
             
			 
			 
		</div>
		   <div class="form-group">
            <label for="exampleInputEmail1">Pelaku aktivitas<font color="red">*</font> </label>
			<div class="controls" >
                        <select id="selectError"  readonly name="profesi" data-rel="chosen" style="width:200px" >
                           <?php foreach($profesi->result() as $row){?>
                            <option value="<?php echo $row->ID_PROFESI; ?>" <?php if(isset($id_profesi) && $id_profesi==$row->ID_PROFESI)echo 'selected'; ?> ><?php echo $row->NAMA_PROFESI;  ?></option>
                            
						 <?php } ?>
                        </select>
                    </div>			<?php if(isset($errprofesi)){ echo'<p><font color="red">profesi belum diisi</font></p>'; }?>
		  </div>
		  <!--
		   <div class="form-group">
            <label for="exampleInputEmail1">Presentase Usaha</label>
            <input type="text"  name="presentase" class="form-control" id="text" value="<?php if(isset($presentase)) echo $presentase; ?>"   placeholder="Masukkan presentase" style="width:100px" >
			<?php if(isset($errpresentasei)){ echo'<p><font color="red">presentase belum diisi</font></p>'; }?>
		  </div>
          -->
          <p class="help-block">NB: <font color="red">*</font> Wajib Diisi</p>
           <a class="btn btn-primary" href="<?php echo base_url();?>aktivitas/daftar_aktivitas">
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