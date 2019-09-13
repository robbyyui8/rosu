
<script >
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)){
	var popup = window.open('......');
popup.document.title = "my title";
	window.alert("Input salah, masukkan angka");
        return false;
		
		}
    return true;
}


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
		url: "<?php echo base_url();?>log_estimasi/add_ucw/<?php echo $id_aplikasi;?>",
		cache: false,				
		data: $('#calucw').serialize(),
		success: function(json){						
		try{
		//try to get data count
		var obj = jQuery.parseJSON(json);
			//document.getElementById('nama_aplikasi').readOnly = obj['diasble'];
			
			document.getElementById('uc_complex').innerHTML=obj['Complex'] ;
			document.getElementById('uc_average').innerHTML=obj['Average'] ;
			document.getElementById('uc_simple').innerHTML=obj['Simple'] ;
			document.getElementById('hasil'). value =obj['hasil'];
			
			alert( obj['STATUS']);
					
			
		
		
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
        <h2><i class="glyphicon glyphicon-usd"></i>Form Tambah Log Use Case Weight <?php if(isset($edit)){ echo'<span class="label label-info">Edit</span>';} ?> </h2>
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
            <a href="<?php echo base_url();?>log_estimasi/daftar_log_use_case/<?php echo $id_aplikasi;?>">Daftar Use Case</a>
        </li>
		
		 <li>
            <a href="<?php echo base_url();?>log_estimasi/form_tambah_log_ucw/<?php echo $id_aplikasi;?>">Tambah Log Use Case Weight</a>
        </li>
    </ul>
	

              
          <label class="control-label"  for="selectError"><h3>Use Case Weight</h3></label>
						
						
		<a  class="glyphicon glyphicon-question-sign" onclick="PopupCenterDual('<?php echo base_url(); ?>estimasi/popUCW','NIGRAPHIC','700','700');  " href="javascript:void(0);"></a>

           
				  <form  name="calucw" id="calucw"  action="" >
				  
				 
				
				
				<div class="form-group">
                    <label class="control-label" for="inputSuccess1"> Nama Use Case</label>
                    <input type="text"  name="nama_uc"  class="form-control" id="nama_uc" style="width:400px">
                </div>
				
				<div class="form-group " >
                        <label for="exampleInputEmail1">Jumlah Transaksi</label>
                        <input type="number" name="jum_transaksi"  min="0" class="form-control" id="jum_transaksi"  style="width:70px">
                    </div>
					
					<table class="form-group " >
					
					<tr>
					<td>
					<label for="exampleInputEmail1">Simple</label>
					</td>
					<td>
					<label for="exampleInputEmail1">:</label>
					</td>
					
					<td>
					<label id="uc_simple"><?php echo $jum_simple; ?> </label>
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
					<label id="uc_average"><?php echo $jum_average; ?></label>
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
					 <label id="uc_complex"><?php echo $jum_complex; ?></label>
					</td>
					</tr>
					</table>
					
					
					
		<div class="form-group " >
                        <label for="exampleInputEmail1">Nilai UUCW</label>
                        <input type="number" name="hasil" readonly  value="<?php echo $hasil; ?>" min="0" class="form-control" id="hasil"  style="width:70px">
                    </div>
					
                  
				   
					<input type="button" onclick="javascript:makeAjaxCall();" class="btn btn-success" value="Simpan"/>
                  		
				<a class="btn btn-info"   onclick="return confirm('Anda Yakin?. Pastikan semua use case sudah dimasukan')"  href="<?php echo base_url();?>log_estimasi/daftar_log_use_case/<?php echo $id_aplikasi;?>"> 
               
                <i class="glyphicon glyphicon-chevron-left glyphicon-white"></i>
             Kembali
             
				
			</a>
			</form>
            
			
		
			
        
		
		
		
    </div>
    <!--/span-->
        <!--/span-->
		
      </div>
    </div>
  </div>
  <!--/span-->
</div>
<!--/row-->