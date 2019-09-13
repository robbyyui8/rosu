<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
?>

 <link href='<?php echo base_url(); ?>css/jquery.dataTablesUbah.css' rel='stylesheet'>
<script >
 
  $(document).ready( function(){
    $('#hasil_log_uc').dataTable({
    "iDisplayLength": 5,
    "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
	"cache": false
    });
});




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
  
  function makeAjaxCall(){
  	
  	var update=<?php if(isset($id_log_uc)){echo $id_log_uc;} else{ echo 0;} ?>;
	var url_pas="";
	if(update==0){
		url_pas="<?php echo base_url();?>estimasi/add_uucw";
	}
	else{
		url_pas="<?php echo base_url();?>estimasi/update_log_ucw/<?php if(isset($id_log_uc)){echo $id_log_uc;} ?>";
	}
  	$.ajax({
  		type: "post",
  		url:url_pas,
  		cache: false,				
  		data: $('#calucw').serialize(),
  		success: function(json){						
  		try{
  		//try to get data count
  		var obj = jQuery.parseJSON(json);
  			//document.getElementById('nama_aplikasi').readOnly = obj['diasble'];
  			
  			
  			if(obj['errjum_transaksi']!="" || obj['errnama_uc']!="" ){
				document.getElementById('errnama_uc').innerHTML=obj['errnama_uc'] ;
			document.getElementById('errjum_transaksi').innerHTML=obj['errjum_transaksi'] ;
			
  				
  			
			
			}
			else{
				alert( obj['STATUS']);
				
					window.location.href = "<?php echo base_url();?>estimasi/form_uucw";	
			}
  			
  				$('#loading').hide();	
  			
  		
  		
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
					<li  ><a href="<?php echo base_url(); ?>estimasi/form_edit_aplikasi/<?php echo $this->session->userdata('id_aplikasi')?>">Deskripsi Aplikasi</a></li>
					<?php } else {  ?> 
					<li class="active" ><a href="#info">Deskripsi Aplikasi</a></li>
					<?php } ?>
					
					<?php if($step >=3){?> 
					<li class="active" ><a href="<?php echo base_url(); ?>estimasi/form_uucw">UUCW</a></li>
					<?php } else {  ?> 
					<li class="active" ><a href="#info">UUCW</a></li>
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
          <div class="tab-pane active" id="info">
            <label class="control-label"  for="selectError">
              <h3>  Unadjusted Use Case Weight (UUCW)</h3>
            </label>
            <a  class="glyphicon glyphicon-question-sign" onclick="PopupCenterDual('<?php echo base_url(); ?>estimasi/popUCW','NIGRAPHIC','700','700');  " href="javascript:void(0);"></a>
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
            <div class="row">
              <div class="col-md-5">
                <form  name="calucw" id="calucw"  method="post" action="<?php echo base_url(); ?>/estimasi/update_log_ucw/<?php if(isset($id_log_uc))echo $id_log_uc;?>" >
                  <div class="form-group">
                    <label class="control-label" for="inputSuccess1"> Nama Use Case<font color="red">*</font></label>
                    <input type="text"  name="nama_uc"   value="<?php  if(isset($nama_use_case)) echo $nama_use_case;?>" class="form-control" id="nama_uc" style="width:400px">
                    <p class="help-block">Contoh: Menambah data pengguna.</p>
					<p ><font id="errnama_uc" color="red"></font></p>
                  </div>
                  <div class="form-group " >
                    <label for="exampleInputEmail1">Jumlah Transaksi<font color="red">*</font></label>
                    <input type="number" name="jum_transaksi"  value="<?php  if(isset($jum_transaksi)){echo $jum_transaksi;} else{ echo 0;}?>"  min="0" class="form-control" id="jum_transaksi"  style="width:70px">
                    <p class="help-block">Contoh: 3</p>
					<p ><font id="errjum_transaksi" color="red"></font></p>
                  </div>
				  
				  <p class="help-block">NB: <font color="red">*</font> Wajib Diisi</p>
                  
				  <?php if(isset($id_log_uc)){?>
		  <br>
			  <input type="button" onclick="javascript:makeAjaxCall();" class="btn btn-success" value="Perbarui" />
		  <?php } 
		   else { ?>
		   <br>
			  <input type="button" onclick="javascript:makeAjaxCall();" class="btn btn-success" value="Simpan" />
		 <?php }?>
          
         
              </div>
              <div class="col-md-7" >
               <table  id="hasil_log_uc" class="display" cellspacing="0" width="100%" >
    <thead>
	
    <tr>
		<th>No</th>
        <th>Nama Use Case</th>
		<th>Jumlah Transaksi</th>
       
		
        <th>Actions</th>
    </tr>
    </thead>
	 <tfoot>
	
    <tr>
		<th>No</th>
        <th>Nama Use Case</th>
		<th>Jumlah Transaksi</th>
       
		
        <th>Actions</th>
    </tr>
    </tfoot>
	
    <tbody>
	<?php $no =0;
	foreach($log->result() as $row){ 
	$no++; ?>
	
	<tr>
	 <td>
	<?php echo $no; ?>
	</td>
	<td>
	<?php echo $row->NAMA_USE_CASE; ?>
	</td>
	<td>
	<?php echo $row->JUMLAH_TRANSAKSI; ?>
	</td>
	
	
	<td class="center">
            <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>estimasi/form_edit_uucw/<?php echo $row->ID_LOG_UC; ?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Ubah
            </a>
           
			<a class="btn btn-danger btn-sm"  onclick="return confirm('Anda Yakin untuk menghapus?')"   href="<?php echo base_url(); ?>estimasi/delete_log_ucw/<?php echo $row->ID_LOG_UC; ?>-<?php echo $id_aplikasi; ?>" > 
                <i class="glyphicon glyphicon-trash icon-white"></i> 
                Hapus 
			</a>
    
	</td>
		
	</tr>
	<?php } ?>
	
	<?php if($baris==0){?>
		<tr> 
		<td colspan = "4" ><center>Tidak ada Data </center> </td>
		<td  > </td>
		<td  > </td>
		<td  > </td>
		</tr>
	<?php }?>
	
    
   
    </tbody>
    </table>
	<br>
	
	 <label for="exampleInputEmail1">Rekapitulasi Perhitungan Use Case:</label>
	<table class="form-group " >
                    <tr>
                      <td>
                        <label for="exampleInputEmail1">Simple</label>
                      </td>
                      <td>
                        <label for="exampleInputEmail1">:</label>
                      </td>
                      <td>
                        <label id="uc_simple"><?php  if(isset($jum_simple)) echo $jum_simple;?></label>
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
                        <label id="uc_average"><?php  if(isset($jum_average)) echo $jum_average;?></label>
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
                        <label id="uc_complex"><?php  if(isset($jum_complex)){echo $jum_complex;} ?></label>
                      </td>
                    </tr>
                  </table>
				   <div class="form-inline " >
                     <b> &nbsp; <label for="exampleInputEmail1">Nilai UUCW  :</label>
					   <label id="uc_average"><?php if(isset($hasil)){ echo $hasil; } else { echo 0;}?></label> </b>
                    </div>
	
	 <?php if($step <=3 && $baris!=0){ ?>
			  <a class="btn btn-primary"   onclick="return confirm('Anda Yakin?. Pastikan semua use case sudah dimasukan')"  style="float: right;"  href="<?php echo base_url(); ?>estimasi/form_uaw"> 
          Selanjutnya
          <i class="glyphicon glyphicon-chevron-right glyphicon-white"></i>
          </a>
		  <?php } ?>
              </div>
            </div>
          </div>
          
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