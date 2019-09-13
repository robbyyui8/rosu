
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
		url: "<?php echo base_url(); ?>log_estimasi/edit_tcf/<?php echo $id_aplikasi; ?>",
		cache: false,				
		data: $('#tcf').serialize(),
		success: function(json){						
		try{
		//try to get data count
		var obj = jQuery.parseJSON(json);
		
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
	  
               <ul class="breadcrumb">
        <li>
            <a href="<?php echo base_url();?>log_estimasi/daftar_log_estimasi">Log Estimasi</a>
        </li>
		
		 <li>
            <a href="<?php echo base_url();?>log_estimasi/edit_log_tcf/<?php echo $id_aplikasi;?>">Edit Log TCF</a>
        </li>
    </ul>
         <label class="control-label" for="selectError"><h3>Technical Complexity Factor (TCF)</h3></label>
		<a  class="glyphicon glyphicon-question-sign" onclick="PopupCenterDual('<?php echo base_url(); ?>estimasi/popTCF','NIGRAPHIC','450','450');  " href="javascript:void(0);"></a>

		<table>
		<tr>
				
				
				<td>
				 <img src="<?php echo base_url();?>img/desc_tcf_factor.PNG" alt="" />

				</td>
				</tr>
		</table>
                  
				  <form role="form" id="tcf" method="post" action="#" >
				<table>
				
				<?php 
				$n=0;
				foreach($isi->result() as $row){
					$n++;
					?>
				<tr>
				<td>
				<?php echo 'T'.$n; ?>
				</td>
				<td>
				<?php echo $row->DESKRIPSI ?>
				</td>
				<td>
				<label class="radio-inline">
                    <input type="radio" <?php if($row->VALUE==0){echo 'checked';}?> name="surveytcf<?php echo $n;?>" id="inlineRadio2" value="0"> 0
                </label>
				<label class="radio-inline">
				
				
                    <input type="radio" <?php if($row->VALUE==1 ){echo 'checked';}?> name="surveytcf<?php echo $n;?>" id="inlineRadio2" value="1">1
					<input type="hidden" name="idtcf<?php echo $n;?>" id="inlineRadio2" value="<?php echo $row->ID_TCF; ?>">
					<input type="hidden" name="bobot<?php echo $n;?>" id="inlineRadio2" value="<?php echo $row->BOBOT; ?>">
				</label>
				
				
				<label class="radio-inline">
                    <input type="radio" <?php if($row->VALUE==2){echo 'checked';}?> name="surveytcf<?php echo $n;?>" id="inlineRadio2" value="2"> 2
                </label>
				
				<label class="radio-inline">
                    <input type="radio" <?php if($row->VALUE==3){echo 'checked';}?> name="surveytcf<?php echo $n;?>" id="inlineRadio2" value="3"> 3
                </label>
				<label class="radio-inline">
                    <input type="radio" <?php if($row->VALUE==4){echo 'checked';}?> name="surveytcf<?php echo $n;?>" id="inlineRadio2" value="4"> 4
                </label>
				<label class="radio-inline">
                    <input type="radio" <?php if($row->VALUE==5){echo 'checked';}?> name="surveytcf<?php echo $n;?>" id="inlineRadio2" value="5"> 5
                </label>
				
				</td>
				</tr>
				
				
				
				<?php } ?>
				
				</table>
				<div class="form-group " >
                        <label for="exampleInputEmail1">Nilai TCF</label>
                        <input type="number" name="hasil" readonly  value="<?php echo $nilai_tcf; ?>" min="0" class="form-control" id="hasil"  style="width:70px">
                    </div>
					
					<input type="button" onclick="javascript:makeAjaxCall();" class="btn btn-success" value="Perbarui"/>
                  		
				<a class="btn btn-info"   onclick="return confirm('Anda Yakin?')"    href="<?php echo base_url();?>log_estimasi/daftar_log_estimasi"> 
               
				<i class="glyphicon glyphicon-chevron-left glyphicon-white"></i>Kembali
            
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