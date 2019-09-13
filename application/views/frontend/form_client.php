<link rel="stylesheet" href="<?php echo base_url()?>js/tanggal/jquery-ui.css">
  <script src="<?php echo base_url();?>js/tanggal/jquery-1.10.2.js"></script>
  <script src="<?php echo base_url(); ?>js/tanggal/jquery-ui.js"></script>

<script >
$(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
  });
  
  $(document).ready(function(){
    var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<input autocomplete="off" class="input form-control"   id="field' + next + '" name="field' + next + '" type="text">';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
    

    
});
  
  $(document).ready( function(){
    $('#list_fitur').dataTable({
    "iDisplayLength": 5,
    "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    });
});

</script>
<div class="row">
  <div class="box col-md-12">
    <div class="box-inner">
      <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-usd"></i>Form Estimasi Harga Perangkat Lunak  </h2>
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
        <ul class="nav nav-tabs" >
		<?php if($step >=1){?> 
          <li class="active" ><a href="<?php echo base_url(); ?>estimasi/form_edit_client/<?php echo $this->session->userdata('id_aplikasi')?>">Informasi Client <?php if(isset($edit)){ echo'<span class="label label-info">Edit</span>';} ?></a></li>
          <?php } else {  ?> 
          <li  class="active" ><a href="#info">Informasi Pelanggan</a></li>
          <?php } ?>
		  
         <?php if($step >=2){?> 
          <li  ><a href="<?php echo base_url(); ?>estimasi/form_edit_aplikasi/<?php echo $this->session->userdata('id_aplikasi')?>">Deskripsi Aplikasi </a></li>
          <?php }
		  else if($step ==1){?>
		<li  ><a href="<?php echo base_url(); ?>estimasi/form_aplikasi/<?php echo $this->session->userdata('id_aplikasi')?>">Deskripsi Aplikasi </a></li>

		 <?php }
		  else { ?>
          <li class="disabled" ><a href="#info">Deskripsi Aplikasi</a></li>
		  <?php }?>
		  
          <?php if($step >=3){?> 
          <li ><a href="<?php echo base_url(); ?>estimasi/form_uucw">UUCW</a></li>
          <?php } else {  ?> 
          <li class="disabled" ><a href="#info">UUCW</a></li>
          <?php } ?>
          <?php if($step >=4){?> 
          <li ><a href="<?php echo base_url(); ?>estimasi/form_uaw"  >UAW</a></li>
          <?php } else {  ?> 
          <li class="disabled" ><a href="#">UAW</a></li>
          <?php } ?>
          <?php if($step >=5){?> 
          <li  ><a href="<?php echo base_url(); ?>estimasi/edit_log_tcf/<?php echo $this->session->userdata('id_aplikasi')?>"  >TCF </a></li>
          <?php } else {  ?> 
          <li class="disabled" ><a href="#">TCF</a></li>
          <?php } ?>
          <?php if($step >=6){?> 
          <li  ><a href="<?php echo base_url(); ?>estimasi/edit_log_ecf/<?php echo $this->session->userdata('id_aplikasi')?>"  >ECF</a></li>
          <?php } else {  ?> 
          <li class="disabled" ><a href="#"  >ECF</a></li>
          <?php } ?>
         <?php if($step >=7){?> 
					 <li ><a href="<?php echo base_url(); ?>estimasi/result"  >Result</a></li>
					<?php } else {  ?> 
					<li class="disabled" ><a href="#"  >Result</a></li>
					<?php } ?>
					<!--
       <?php if($step >=8){?> 
          <li  ><a href="<?php echo base_url(); ?>log_estimasi/form_effort"  >Effort Real</a></li>
          <?php }  ?>
					
-->
	   </ul>
        
	   <div id="myTabContent" class="tab-content">
          <?php if(isset($kirim)){ echo' <div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">×</button> ' .$kirim.'.
            </div>
            '; } ?>
          <?php if($step>=1){ echo '<form  role="form" method="post" id="calucw"  action="'.base_url().'estimasi/update_client" >';} else{
            echo '<form  role="form" method="post" id="calucw"  action="'.base_url().'estimasi/add_client" >';
            }?>
          <div class="tab-pane active" id="info">
            <section>
            <div class="row">
              <div class="col-md-4">
                <label class="control-label"  for="selectError">
                  <h3>Informasi Pelanggan</h3>
                </label>
                <div class="form-group">
                  <label class="control-label" for="inputSuccess1"> Nama Client<font color="red">*</font></label>
                  <input type="text"  name="nama_client"  placeholder="Masukan nama client" value="<?php if(isset($nama_client))echo $nama_client;?>" class="form-control" id="nama_client" >
                  <input type="hidden"  name="id_client"  placeholder="Masukan nama client" value="<?php if(isset($id_client))echo $id_client;?>" class="form-control" id="nama_client" >
				  <?php if(isset($errclient)){ echo '<p><font color="red">'.$errclient.'</font></p>'; }?>
				<p class="help-block">Contoh: Bpk Denny</p>
				</div>
				
                <div class="form-group">
                  <label class="control-label" for="inputSuccess1">Alamat Client<font color="red">*</font></label>
                 <div class="form-group">
				 <textarea name="alamat"  placeholder="Masukan alamat client" ><?php if(isset($alamat))echo $alamat;?></textarea>
				  <?php if(isset($erralamat)){ echo '<p><font color="red">'.$erralamat.'</font></p>'; }?>
				 </div>
                 
                </div>
				
				<div class="form-group">
                  <label class="control-label" for="inputSuccess1"> Tanggal Pengajuan Aplikasi<font color="red">*</font></label>
                  <input type="text" id="datepicker" placeholder=" Masukan tanggal pengajuan" name="tanggal"  value="<?php if(isset($tanggal))echo $tanggal;?>" class="form-control" id="tanggal" >
                  <?php if(isset($errtanggal)){ echo '<p><font color="red">'.$errtanggal.'</font></p>'; }?>
				<p class="help-block">Contoh: 20-05-2015 </p>
				</div>
				<p class="help-block">NB: <font color="red">*</font> Wajib Diisi</p>
                <button type="submit" class="btn btn-success"> <?php if($step>=1){ echo 'Perbarui';} else{ echo 'Simpan';}?></button>
                </form>
              </div>
              
			  </section>
            </div>
          </div>
        </div>
      </div>
      <!--/span-->
      <!--/span-->
    </div>
  </div>
</div>
<!--/span-->
</div>
<!--/row-->