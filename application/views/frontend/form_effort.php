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
  
  function makeAjaxCall(){
  	
  	
  	$.ajax({
  		type: "post",
  		url: "<?php echo base_url();?>log_estimasi/add_effort_real",
  		cache: false,				
  		data: $('#effort_real').serialize(),
  		success: function(json){						
  		try{
  		//try to get data count
  		var obj = jQuery.parseJSON(json);
  			//document.getElementById('nama_aplikasi').readOnly = obj['diasble'];
  			var tim =new Array();
			var waktu=new Array();
			
			var hari=new Array();
				 tim =obj['tim'];
				 waktu =obj['waktu'];
				 hari =obj['hari'];
				  var jumlah_aktivitas =obj['jumlah_aktivitas'];
				
  			for(i =1;i<=jumlah_aktivitas;i++){
				
				if(typeof tim[i] !== 'undefined'){
					document.getElementById('errtim'.concat(i)).innerHTML=obj['pesantim'.concat(i)];
					
				}
				else{
					document.getElementById('errtim'.concat(i)).innerHTML="";
				}
				
				if(typeof waktu[i] !== 'undefined'){
					document.getElementById('errwaktu'.concat(i)).innerHTML=obj['pesanwaktu'.concat(i)];
					
				}
				else{
					document.getElementById('errwaktu'.concat(i)).innerHTML="";
				}
				
				if(typeof hari[i] !== 'undefined'){
					document.getElementById('errhari'.concat(i)).innerHTML=obj['pesanhari'.concat(i)];
					
				}
				else{
					document.getElementById('errhari'.concat(i)).innerHTML="";
				}
				
				
					
				
			}
			
  			alert( obj['STATUS']);
  			//document.getElementById('errtim'.concat(1)).innerHTML ="belum diisi";
  			document.getElementById('hasil').value=obj['effort_real'];
			
  		//window.scrollTo(0,1)
  					
  			
  		
  		
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
          <li ><a href="<?php echo base_url(); ?>estimasi/form_edit_aplikasi/<?php echo $this->session->userdata('id_aplikasi')?>">Deskripsi Aplikasi</a></li>
          <?php } else {  ?> 
          <li class="active" ><a href="#info">Deskripsi Aplikasi</a></li>
          <?php } ?>
          <?php if($step >=2){?> 
          <li ><a href="<?php echo base_url(); ?>estimasi/form_uucw">UUCW</a></li>
          <?php } else {  ?> 
          <li class="active" ><a href="#">UUCW</a></li>
          <?php } ?>
          <?php if($step >=3){?> 
          <li ><a href="<?php echo base_url(); ?>estimasi/form_uaw"  >UAW</a></li>
          <?php } else {  ?> 
          <li class="disabled" ><a href="#">UAW</a></li>
          <?php } ?>
          <?php if($step >=4){?> 
          <li  ><a href="<?php echo base_url(); ?>estimasi/edit_log_tcf/<?php echo $this->session->userdata('id_aplikasi')?>"  >TCF</a></li>
          <?php } else {  ?> 
          <li class="disabled" ><a href="#">TCF</a></li>
          <?php } ?>
          <?php if($step >=5){?> 
          <li  ><a href="<?php echo base_url(); ?>estimasi/edit_log_ecf/<?php echo $this->session->userdata('id_aplikasi')?>"  >ECF</a></li>
          <?php } else {  ?> 
          <li class="disabled" ><a href="#"  >ECF</a></li>
          <?php } ?>
          <?php if($step >=6){?> 
          <li  ><a href="<?php echo base_url(); ?>estimasi/result"  >Result</a></li>
          <?php } else {  ?> 
          <li class="active" ><a href="#info"  >Result</a></li>
          <?php } ?>
          <?php if($step >=8){?> 
          <li class="active" ><a href="<?php echo base_url(); ?>log_estimasi/form_effort"  >Effort Real</a></li>
          <?php } else {  ?> 
          <li class="active" ><a href="#info"  >Effort Real</a></li>
          <?php } ?>
        </ul>
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane active" id="info">
            <label class="control-label"  for="selectError">
              <h3>Form Actual Effort </h3>
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
           
            <form method="post" id="effort_real" name="effort_real" action="" >
              <table width="567" border="1"  class="table-bordered" >
                <tr>
                  <th width="257" scope="col"><b>Aktivitas</b></th>
                  <td width="144">
                    <center>
                      <b>Jumlah Anggota<font  color="red">*</font> </b>
                    </center>
                  </td>
				  <td width="144"><center><b>Rata waktu/hari<font  color="red">*</font>  </b></center></td>
                  <td width="144"><center><b>Jumlah hari<font  color="red">*</font>   </b></center></td>
                </tr>
                <tr>
                  <th  colspan="4" scope="row">
                    <div align="left"><b>SOFTWARE DEVELOPMENT</b></div>
                  </th>
                </tr>
                <?php $index=0;
                  foreach($distribusi_usaha->result() as $row){
                  	
                  if($row->KATEGORI_AKTIVITAS==1){ 
                  $index++; ?>
                <tr>
                  <th scope="row"><?php echo $row->NAMA_AKTIVITAS; ?></th>
                  <td><input type="txt" class="form-control" placeholder=" Contoh:10"  id="tim<?php echo $index;?>"  name="tim<?php echo $index;?>" value="" >
				  <p ><font id="errtim<?php echo $index;?>" color="red"></font></p>
				  </td>
                  <td><input type="txt" class="form-control"  placeholder=" Contoh:10" id="waktu<?php echo $index;?>"  name="waktu<?php echo $index;?>" value="" >
				  <p ><font id="errwaktu<?php echo $index;?>" color="red"></font></p>
				  </td>
                  <td><input type="txt" class="form-control"  placeholder=" Contoh:10" id="hari<?php echo $index;?>"  name="hari<?php echo $index;?>" value="" >
				  <p ><font id="errhari<?php echo $index;?>" color="red"></font></p>
				  </td>

				</tr>
                <?php 	} 
                  }?>
                <tr>
                  <th colspan="4" scope="row">
                    <div align="left"><b>ON GOING ACTIVITY</b></div>
                  </th>
                </tr>
                <?php   foreach($distribusi_usaha->result() as $row){
                  if($row->KATEGORI_AKTIVITAS==2){ 
                  $index++; ?>
                <tr>
                  <th scope="row"><?php echo $row->NAMA_AKTIVITAS; ?></th>
                  <td><input type="txt" class="form-control" placeholder=" Contoh:10"  id="tim<?php echo $index;?>"  name="tim<?php echo $index;?>" value="" >
				  <p ><font id="errtim<?php echo $index;?>" color="red"></font></p>
				  </td>
                  <td><input type="txt" class="form-control"  placeholder=" Contoh:10" id="waktu<?php echo $index;?>"  name="waktu<?php echo $index;?>" value="" >
				  <p ><font id="errwaktu<?php echo $index;?>" color="red"></font></p>
				  </td>
                  <td><input type="txt" class="form-control"  placeholder=" Contoh:10" id="hari<?php echo $index;?>"  name="hari<?php echo $index;?>" value="" >
				  <p ><font id="errhari<?php echo $index;?>" color="red"></font></p>
				  </td>

				</tr>
                <?php } 
                  }?>
                <tr>
                  <th colspan="4" scope="row">
                    <div align="left"><b>QUALITY AND TESTING</b></div>
                  </th>
                </tr>
                <?php   foreach($distribusi_usaha->result() as $row){
                  if($row->KATEGORI_AKTIVITAS==3){ 
                  $index++; ?>
                 <tr>
                  <th scope="row"><?php echo $row->NAMA_AKTIVITAS; ?></th>
                  <td><input type="txt" class="form-control" placeholder=" Contoh:10"  id="tim<?php echo $index;?>"  name="tim<?php echo $index;?>" value="" >
				  <p ><font id="errtim<?php echo $index;?>" color="red"></font></p>
				  </td>
                  <td><input type="txt" class="form-control"  placeholder=" Contoh:10" id="waktu<?php echo $index;?>"  name="waktu<?php echo $index;?>" value="" >
				  <p ><font id="errwaktu<?php echo $index;?>" color="red"></font></p>
				  </td>
                  <td><input type="txt" class="form-control"  placeholder=" Contoh:10" id="hari<?php echo $index;?>"  name="hari<?php echo $index;?>" value="" >
				  <p ><font id="errhari<?php echo $index;?>" color="red"></font></p>
				  </td>

				</tr>
                <?php } 
                  }?>
              </table>
              <br>
            
            </form>
			  <button type="submit" onclick="makeAjaxCall();" class="btn btn-success"> Simpan </button>
            <p class="help-block">NB: <font color="red">*</font> Tulis 0 jika tidak dilakukan</p>
            <br>
            </br>
            <div class="form-inline " >
              <label for="exampleInputEmail1"> Nilai effort real :</label>
              <input type="text" name="hasil" readonly  min="0" class="form-control" id="hasil"  style="width:70px">
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