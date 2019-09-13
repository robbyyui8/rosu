<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
?>
<link href='<?php echo base_url(); ?>css/jquery.dataTablesUbah.css' rel='stylesheet'>
<script >
  function PopupCenterDual(url, title, w, h) {
      // Fixes dual-screen position   Most browsers   Firefox
      var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
      var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;
      width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
      height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;
  
      var left = ((width / 2) - (w / 2)) + dualScreenLeft;
      var top = ((height / 2) - (h / 2)) + dualScreenTop;
      var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
  
      // Puts focus on the newWindow
      if (window.focus) {
          newWindow.focus();
      }
  }
  
    $(document).ready( function(){
    $('#hasil_log_uc').dataTable({
    "iDisplayLength": 5,
    "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    });
  });
  
  function makeAjaxCall(){
	  
  	var update=<?php if(isset($id_log_uaw)){echo $id_log_uaw;} else{ echo 0;} ?>;
	var url_pas="";
	if(update==0){
		url_pas="<?php echo base_url();?>estimasi/add_uaw";
	}
	else{
		url_pas="<?php echo base_url();?>estimasi/update_log_uaw/<?php if(isset($id_log_uaw)){echo $id_log_uaw;} ?>";
	}
  	
  	$.ajax({
  		type: "post",
  		url: url_pas,
  		cache: false,				
  		data: $('#calucw').serialize(),
  		success: function(json){						
  		try{
  		//try to get data count
  		var obj = jQuery.parseJSON(json);
  		
  			
  			document.getElementById('errnama_aktor').innerHTML=obj['errnama_aktor'] ;
  			document.getElementById('errkategori').innerHTML=obj['errkategori'] ;
  			
  			document.getElementById('hasil'). value =obj['hasil'];
  			
  			if(obj['errnama_aktor']=="" && obj['errkategori']=="" ){
				
				
  				alert( obj['STATUS']);
				window.location.href = "<?php echo base_url();?>estimasi/form_uaw";	
  			}
  					
  			
  		
  		
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
        <h2><i class="glyphicon glyphicon-usd"></i>Form Estimasi Harga Perangkat Lunak <?php if(isset($edit)){ echo'<span class="label label-info">Edit</span>';} ?> </h2>
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
					<li  ><a href="<?php echo base_url(); ?>estimasi/form_edit_aplikasi/<?php echo $this->session->userdata('id_aplikasi')?>">Deskripsi Aplikasi</a></li>
					<?php } else {  ?> 
					<li class="active" ><a href="#info">Deskripsi Aplikasi</a></li>
					<?php } ?>
					
					<?php if($step >=3){?> 
					<li  ><a href="<?php echo base_url(); ?>estimasi/form_uucw">UUCW</a></li>
					<?php } else {  ?> 
					<li class="disabled" ><a href="#info">UUCW</a></li>
					<?php } ?>
					
					<?php if($step >=4){?> 
					 <li  class="active" ><a href="<?php echo base_url(); ?>estimasi/form_uaw"  >UAW</a></li>
					<?php } else {  ?> 
					<li class="active" ><a href="#">UAW</a></li>
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
          <div class="tab-pane active" id="info">
            <label class="control-label" for="selectError">
              <h3>Unadjusted Actor Weight (UAW)</h3>
            </label>
			<?php 
              if(isset($kirim)){
              	echo'
              <div class="alert alert-success">
                                 <button type="button" class="close" data-dismiss="alert">×</button>
                                 <strong>Siap digunakan!.</strong>' .$kirim.'.
                             </div>
              			';
              }
              	
              ?>
            <section>
			
              <div class="row" >
                <div class="col-md-5">
                  
				  <form  name="calucw" id="calucw"  action="" >
				  
                    <div class="form-group">
                      <label class="control-label" for="inputSuccess1"> Nama Aktor</label>
                      <input type="text"  name="nama_aktor" value="<?php if(isset($nama_aktor)){ echo $nama_aktor; } ?>"  class="form-control" id="nama_aktor" style="width:400px">
                      <p ><font id="errnama_aktor" color="red"></font></p>
                    </div>
                    <div class="form-group " >
                      <label for="exampleInputEmail1">Jenis Kategori Aktor</label>		<a  class="glyphicon glyphicon-question-sign" onclick="PopupCenterDual('<?php echo base_url(); ?>estimasi/popAW','NIGRAPHIC','700','700');  " href="javascript:void(0);"></a>
                      <div class="radio">
                        <label>
                        <input type="radio" <?php if(isset($id_kategori) && $id_kategori ==1 ){ echo 'checked'; } ?> name="kategori" id="optionsRadios1" value="1"    >
                        Simple
                        </label>
						 <label>
                        <input type="radio" <?php if(isset($id_kategori) && $id_kategori ==2 ){ echo 'checked'; } ?> name="kategori" id="optionsRadios1" value="2"    >
                        Average
                        </label>
						
						 <label>
                        <input type="radio" <?php if(isset($id_kategori) && $id_kategori ==3 ){ echo 'checked'; } ?> name="kategori" id="optionsRadios1" value="3"    >
                        Complex
                        </label>
                      </div>
                      <p ><font id="errkategori" color="red"></font></p>
                    </div>
                    
					<?php if(isset($id_log_uaw)){?>
				  <input type="button"  onclick="javascript:makeAjaxCall();" class="btn btn-success" value="Update"/>
				  <?php } 
				  else{ ?>
				  <input type="button" onclick="javascript:makeAjaxCall();" class="btn btn-success" value="Simpan"/>
				  <?php } ?>
                </div>
                <div class="col-md-7">
				<label for="exampleInputEmail1">Daftar aktor aplikasi</label>
				<br>
                <table id="hasil_log_uc" class="display" cellspacing="0" width="100%" >
                <thead>
                <tr>
                <th>No</th>
                <th>Nama Aktor Aplikasi</th>
                <th>Kategori</th>
                <th>Bobot</th>
                <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $no =0;
                  foreach($log_aw->result() as $row){ $no++; ?>
                <tr>
                <td>
                <?php echo $no; ?>
                </td>
                <td>
                <?php echo $row->NAMA_AKTOR; ?>
                </td>
                <td>
                <?php echo $row->KLASIFIKASI_AKTOR; ?>
                </td>
                <td>
                <?php echo $row->BOBOT; ?>
                </td>
                <td class="center">
                <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>estimasi/edit_log_aw/<?php echo $row->ID_LOG_A; ?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
                </a>
                <a class="btn btn-danger btn-sm"  onclick="return confirm('Anda Yakin untuk menghapus?')"   href="<?php echo base_url(); ?>estimasi/delete_log_aw/<?php echo $row->ID_LOG_A; ?>-<?php echo $id_aplikasi; ?>" > 
                <i class="glyphicon glyphicon-trash icon-white"></i> 
                Delete 
                </a>
                </td>
                </tr>
                <?php }?>
				
				<?php if($baris==0){?>
				<tr> 
				<td colspan = "5" ><center>Tidak ada Data </center> </td>
		<td  > </td>
		<td  > </td>
		<td  > </td>
		<td  > </td>
		</tr>
		
	<?php }?>
		
                </tbody>
				
	
                </table>
				<br>
				<table class="form-group " >
				<label for="exampleInputEmail1">Rekapitulasi perhitungan aktor</label>
                      <tr>
                        <td>
                          <label for="exampleInputEmail1">Simple</label>
                        </td>
                        <td>
                          <label for="exampleInputEmail1">:</label>
                        </td>
                        <td>
                          <label id="aw_simple"><?php if(isset($jum_simple)){ echo $jum_simple; } else { echo 0;}?></label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label for="exampleInputEmail1">Average</label>
                        </td>
                        <td>
                          <label for="exampleInputEmail1">:</label>
                        </td>
                        <td>
                          <label id="aw_average"><?php if(isset($jum_average)){ echo $jum_average; } else { echo 0;}?></label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label for="exampleInputEmail1">Complex</label>
                        </td>
                        <td>
                          <label for="exampleInputEmail1">:</label>
                        </td>
                        <td>
                          <label id="aw_complex"><?php if(isset($jum_complex)){ echo $jum_complex; } else { echo 0;}?></label>
                        </td>
                      </tr>
                    </table>
                    <div class="form-inline " >
                      <b>&nbsp; <label for="exampleInputEmail1">Nilai UAW &nbsp; &nbsp;:</label>
                    <label id="hasil">&nbsp;&nbsp;<?php if(isset($hasil)){ echo $hasil; } else { echo 0;}?></label> </b> 
					</div>
					
					 <?php if($step <=4 && $baris!=0) {?>
              <a class="btn btn-primary"   onclick="return confirm('Anda Yakin?. Pastikan semua semua aktor dimasukan')"  style="float: right;"  href="<?php echo base_url(); ?>estimasi/form_tcf"> 
              Selanjutnya
              <i class="glyphicon glyphicon-chevron-right glyphicon-white"></i>
              </a>	
				<?php } ?>
                </div>
              
			  </div>
			 
			  
				
				
            </section>
			 </form>
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