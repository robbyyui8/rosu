 <link href='<?php echo base_url(); ?>css/jquery.dataTablesUbah.css' rel='stylesheet'>
<script >
  
  $(document).ready( function(){
    $('#list_fitur').dataTable({
    "iDisplayLength": 5,
    "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    });
});

 function edit_fitur(value){
  	
  	
		var url_pas="<?php echo base_url();?>estimasi/edit_fitur/".concat(value);
	
  	$.ajax({
  		type: "post",
  		url:url_pas,
  		cache: false,				
  		data: $('#fitur').serialize(),
  		success: function(json){						
  		try{
			//try to get data count
  		var obj = jQuery.parseJSON(json);
		//alert(obj['STATUS']);
		document.getElementById('nama_fitur').value=obj['nama_fitur'];
		window.scrollTo(1,6)
			
  		}catch(e) {		
  			alert(e);
  		}		
  		},
  		error: function(){						
  			alert('Error while request..');
  		}
   });
  
  }
  
  
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
          <li   ><a href="<?php echo base_url(); ?>estimasi/form_edit_client/<?php echo $this->session->userdata('id_aplikasi')?>">Informasi Client </a></li>
          <?php } else {  ?> 
          <li  ><a href="#info">Informasi Client</a></li>
          <?php } ?>
		  
          <?php if($step >=2){?> 
          <li class="active" ><a href="<?php echo base_url(); ?>estimasi/form_edit_aplikasi/<?php echo $this->session->userdata('id_aplikasi')?>">Deskripsi Aplikasi <?php if(isset($edit)){ echo'<span class="label label-info">Edit</span>';} ?></a></li>
          <?php }
		  else if ($step ==1){ ?>
			   <li class="active" ><a href="<?php echo base_url(); ?>estimasi/form_aplikasi/<?php echo $this->session->userdata('id_aplikasi')?>">Deskripsi Aplikasi </a></li>
		  <?php }
		  else {  ?> 
          <li class="active" ><a href="#info">Deskripsi Aplikasi</a></li>
          <?php } ?>
		  
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
          <li  ><a href="<?php echo base_url(); ?>estimasi/edit_log_tcf/<?php echo $this->session->userdata('id_aplikasi')?>"  >TCF</a></li>
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
			
			<div id="myTabContent" class="tab-content">
          
          
          <div class="tab-pane active" id="info">
            <section>
            <div class="row">
              <div class="col-md-5">
			  <?php if($step>=2){ echo '<form  role="form" method="post" id="calucw"  action="'.base_url().'estimasi/update_aplikasi/" >';} else{
            echo '<form  role="form" method="post" id="calucw"  action="'.base_url().'estimasi/add_aplikasi" >';
            }?>
                <label class="control-label"  for="selectError">
                  <h3>Deskripsi Aplikasi</h3>
                </label>
                <div class="form-group">
                  <label class="control-label" for="inputSuccess1"> Nama Aplikasi<font color="red">*</font></label>
                  <input type="text"  name="nama_aplikasi"  placeholder="Masukan nama aplikasi"value="<?php if(isset($nama_aplikasi))echo $nama_aplikasi;?>" class="form-control" id="nama_aplikasi" >
                  <?php if(isset($erraplikasi)){ echo '<p><font color="red">'.$erraplikasi.'</font></p>'; }?>
                  <input type="hidden"  name="id_tim"  value="<?php if(isset($id_tim))echo $id_tim;?>" class="form-control" id="id_tim" >
               <p class="help-block">Contoh: Aplikasi UCP.</p>
			   </div>
                <div class="form-group">
                  <label class="control-label" for="inputSuccess1">Penggunaan Framework<font color="red">*</font></label></p>
                  <div class="radio"    >
                    <label>
                    <input type="radio"  <?php if(isset($templete) && $templete==1) echo 'checked';?>  name="templete" id="optionsRadios1" value="1" <?php if(isset($templete)) echo 'disabled';?>  >
                    CMS
                    </label>
                    <label>
                    <input type="radio" <?php if(isset($templete) && $templete==0) echo 'checked';?>  name="templete" id="optionsRadios1" value="0" <?php if(isset($templete)) echo 'disabled';?> >
                    Codeigniter
                    </label>
                  <p class="help-block">Contoh CMS: Wordpress,Prestashop,Drupal,dll.</p>
				</div>
             
                  <?php if(isset($errtemplete)){ echo '<p><font color="red">Penggunaan framework  belum diisi</font></p>'; }?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Anggota Pengembang<font color="red">*</font></label>
                  <div class="controls" >
                    <select id="selectError"  name="tim_pengembang[]" multiple  data-rel="chosen" style="width:200px" >
                      
                      <?php foreach($anggota->result() as $row){
                        if($anggota_tim->num_rows >0){
                         $selected=false;
                         
                         foreach($anggota_tim->result() as $row2){
                          
                          if($row2->ID_ANGGOTA==$row->ID_ANGGOTA){ 
                        		$selected=true;
                        		break;
                         }
                        
                        }
                        ?>
                      <option value="<?php echo $row->ID_ANGGOTA; ?>" <?php if($selected)echo 'selected'; ?> ><?php echo $row->NAMA_ANGGOTA;  ?>(<?php echo $row->NAMA_PROFESI;  ?>)</option>
                      <?php }
                        else{  ?>
                      <option value="<?php echo $row->ID_ANGGOTA; ?>"  ><?php echo $row->NAMA_ANGGOTA;  ?>(<?php echo $row->NAMA_PROFESI;  ?>)</option>
                      <?php }
                        } ?>
                    </select>
                  </div>
				  <p class="help-block">Anggota pengembang bisa lebih dari 1.</p>

                  <?php if(isset($errtim)){ echo '<p><font color="red">Anggota tim belum diisi</font></p>'; }?>
                </div>
				
				<p class="help-block">NB: <font color="red">*</font> Wajib Diisi</p>

                <button type="submit" class="btn btn-success"> <?php if($step>=2){ echo 'Perbarui';} else{ echo 'Simpan';}?></button>
                
				</form>
				
              </div>
			  
			  <?php  if(isset($visible)) {?>
              <div class="col-md-7">
                <h3>Fitur Aplikasi</h3>
				 <label class="control-label" for="inputSuccess1">Nama Fitur</label>
				 <form class="form-inline" role="form" method="post" id="fitur"  action="<?php echo base_url();?>estimasi/add_fitur"  >
				
	<div class="form-inline">
                 
	
                  <input type="text" name="nama_fitur" value="<?php if(isset($nama_fitur)){ echo $nama_fitur;}?>" placeholder="Masukan nama fitur" class="form-control" id="nama_fitur" style="width:230px">
			  
			   <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus"> </i> Tambah </button>
			   </div>
                   
		
		
	</form>
	 <p class="help-block">Contoh: Fitur Pengelolah pengguna.</p>
			
			<br>
			</br>
			 <label class="control-label" for="inputSuccess1">Daftar Fitur</label>
			 <br>
			<table  id="list_fitur" id="nama_fitur" class="display" cellspacing="0" width="100%" >
    <thead>
	
    <tr>
		<th>No</th>
        <th>Nama Fitur</th>
       
		
        <th>Actions</th>
    </tr>
    </thead>
	 <tfoot>
	
    <tr>
		<th>No</th>
        <th>Nama Fitur</th>
		
		
        <th>Actions</th>
    </tr>
    </tfoot>
	
    <tbody>
	
	<?php
		$no=0;
	foreach($fitur->result() as $row){
			$no++;?>
			<tr>
	<td> <?php echo $no;?></td>
	<td> <?php echo  $row->NAMA_FITUR;?></td>
	<td>  

			<a class="btn btn-danger btn-sm"  onclick="return confirm('Anda Yakin untuk menghapus fitur <?php echo $row->NAMA_FITUR; ?>?')"   href="<?php echo base_url(); ?>estimasi/delete_fitur/<?php echo $row->ID_FITUR; ?>" > 
                <i class="glyphicon glyphicon-trash icon-white"></i> 
                Delete 
			</a></td>
	</tr>
	<?php } ?>
	
    
   
    </tbody>
    </table>
	
 <?php if($step <=2 && $fitur->num_rows!=0) {?>
              <a class="btn btn-primary"   onclick="return confirm('Anda Yakin?')"  style="float: right;"  href="<?php echo base_url(); ?>estimasi/form_uucw"> 
              Selanjutnya
              <i class="glyphicon glyphicon-chevron-right glyphicon-white"></i>
              </a>	
				<?php } ?>
              </div>
			  <?php }?>
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