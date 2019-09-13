<div class="row">
  <div class="box col-md-12">
    <div class="box-inner">
      <div class="well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i> Form Pembobotan Aktor <?php if(isset($edit)){ echo'<span class="label label-info">Edit</span>';} ?> </h2>
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
         <!--
		 <div class="form-group">
            <label for="exampleInputEmail1">Tipe</label>
            <input type="text" name="tipe"class="form-control"  id="text" value="<?php if(isset($tipe)) echo $tipe; ?>"   placeholder="Masukkan tipe" style="width:400px" >
			<?php if(isset($errtipe)){ echo'<p><font color="red">tipe belum diisi</font></p>'; }?>

		 </div>
		 -->
          <div class="form-group">
            <label for="exampleInputEmail1">Klasifikasi Aktor</label>
			<br>
            <textarea  placeholder="Masukkan Deskripsi klasifikasi"  name="klasifikasi" class="form-control" id="textarea"    style="width:400px"><?php if(isset($klasifikasi)) echo $klasifikasi; ?></textarea>
			<?php if(isset($errklasifikasi)){ echo'<p><font color="red">Klasifikasi belum diisi</font></p>'; }?>
		  </div>
		   <div class="form-group">
            <label for="exampleInputEmail1">bobot</label>
            <input type="text"  name="bobot" class="form-control" id="text" value="<?php if(isset($bobot)) echo $bobot; ?>"   placeholder="Masukkan bobot" style="width:400px" >
			<?php if(isset($errbobot)){ echo'<p><font color="red">bobot belum diisi</font></p>'; }?>
		  </div>
          
         
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <!--/span-->
</div>
<!--/row-->