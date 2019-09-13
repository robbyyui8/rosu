<div class="row">
  <div class="box col-md-12">
    <div class="box-inner">
      <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i> Form Edit log Aplikasi<?php if(isset($edit)){ echo'<span class="label label-info">Edit</span>';} ?> </h2>
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
	  
	  <ul class="breadcrumb">
        <li>
            <a href="<?php echo base_url();?>log_estimasi/daftar_log_estimasi">Log Estimasi</a>
        </li>
		
		 <li>
            <a href="<?php echo base_url();?>log_estimasi/edit_log_aplikasi/<?php echo $id_aplikasi;?>">Edit Log Aplikasi</a>
        </li>
    </ul>
	
	  
	  <?php 
	if(isset($pesan)){
		echo'
	<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Well done!</strong>'.$pesan.'.
                </div>
				';
	} ?>
				
       <form  role="form" method="post" id="calucw"  action="<?php echo base_url();?>log_estimasi/update_log_aplikasi/<?php echo $id;?>" >
				  
				  <div class="form-group">
                    <label class="control-label" for="inputSuccess1"> Nama Aplikasi</label>
                    <input type="text"  name="nama_aplikasi"  value="<?php if(isset($nama_aplikasi))echo $nama_aplikasi;?>" class="form-control" id="nama_aplikasi" style="width:400px">
					<?php if(isset($erraplikasi)){ echo '<p><font color="red">'.$erraplikasi.'</font></p>'; }?>
                </div>
				
				
				<div class="form-group">
				 <label class="control-label" for="inputSuccess1">Menggunakan templete</label>
				<div class="radio">
            <label>
            <input type="radio"  <?php if(isset($templete) && $templete=1) echo 'checked';?>  name="templete" id="optionsRadios1" value="1"   >
            CMS
            </label>
            <label>
            <input type="radio" <?php if(isset($templete) && $templete=0) echo 'checked';?>  name="templete" id="optionsRadios1" value="0" >
            non-CMS
            </label>
			</div>
            <p class="help-block">Ex:Wordpress,drupal,Prestashop,dll</p>
			<?php if(isset($errtemplete)){ echo '<p><font color="red">Penggunaan templete  belum diisi</font></p>'; }?>
          </div>
			
			
		   <div class="form-group">
            <label for="exampleInputEmail1">Tim Pengembang</label>
             <div class="controls" >
                        <select id="selectError"  name="tim_pengembang" data-rel="chosen" style="width:200px" >
						 <option value="0">Pilih Tim</option>
						 <?php foreach($tim->result() as $row){?>
                            <option value="<?php echo $row->ID_TIM; ?>" <?php if(isset($id_tim) && $id_tim==$row->ID_TIM )echo 'selected'; ?> ><?php echo $row->NAMA_TIM;  ?></option>
                            
						 <?php } ?>
                        </select>
             </div>
			 <?php if(isset($errtim)){ echo '<p><font color="red">Tim belum diisi</font></p>'; }?>
			 </div>
				<div class="form-group">
                    <label class="control-label" for="inputSuccess1"> Biaya Estimasi</label>
                    <input type="text"  readonly name="biaya_estimasi"  value="<?php if(isset($biaya_estimasi))echo $biaya_estimasi;?>" class="form-control" id="" style="width:400px">
				
                </div>
				
			 
			  <div class="form-group">
                    <label class="control-label" for="inputSuccess1"> Biaya real</label>
                    <input type="text"  name="biaya_real"  value="<?php if(isset($biaya_real))echo $biaya_real;?>" class="form-control" id="biaya_real" style="width:400px">
				
                </div>
				
			
		  </div>
			  <button type="submit" class="btn btn-success">Submit</button>
                  		
				
			
			</form>
           
      </div>
    </div>
  </div>
  <!--/span-->
</div>
<!--/row-->