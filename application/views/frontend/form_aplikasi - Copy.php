<script >
  $(document).ready(function(){
    var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<input autocomplete="off" class="input form-control"  style="width:400px" id="field' + next + '" name="field' + next + '" type="text">';
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
          <?php if($step >=2){?> 
          <li class="active" ><a href="<?php echo base_url(); ?>estimasi/form_edit_aplikasi/<?php echo $this->session->userdata('id_aplikasi')?>">Deskripsi Aplikasi <?php if(isset($edit)){ echo'<span class="label label-info">Edit</span>';} ?></a></li>
          <?php } else {  ?> 
          <li class="active" ><a href="#info">Deskripsi Aplikasi</a></li>
          <?php } ?>
          <?php if($step >=2){?> 
          <li ><a href="<?php echo base_url(); ?>estimasi/form_uucw">UUCW</a></li>
          <?php } else {  ?> 
          <li class="disabled" ><a href="#info">UUCW</a></li>
          <?php } ?>
          <?php if($step >=3){?> 
          <li ><a href="<?php echo base_url(); ?>estimasi/form_uaw"  >UAW</a></li>
          <?php } else {  ?> 
          <li class="disabled" ><a href="#">UAW</a></li>
          <?php } ?>
          <?php if($step >=4){?> 
          <li  ><a href="<?php echo base_url(); ?>estimasi/edit_log_tcf/<?php echo $this->session->userdata('id_aplikasi')?>"  >Technical Complexity Factor (TCF) </a></li>
          <?php } else {  ?> 
          <li class="disabled" ><a href="#">Technical Complexity Factor (TCF)</a></li>
          <?php } ?>
          <?php if($step >=5){?> 
          <li  ><a href="<?php echo base_url(); ?>estimasi/edit_log_ecf/<?php echo $this->session->userdata('id_aplikasi')?>"  >Environmental Complexity Factor(ECF)</a></li>
          <?php } else {  ?> 
          <li class="disabled" ><a href="#"  >Environmental Complexity Factor(ECF)</a></li>
          <?php } ?>
          <?php if($step >=6){?> 
          <li ><a href="<?php echo base_url(); ?>estimasi/result"  >Result</a></li>
          <?php } else {  ?> 
          <li class="disabled" ><a href="#"  >Result</a></li>
          <?php } ?>
        </ul>
        <div id="myTabContent" class="tab-content">
          <?php if(isset($kirim)){ echo' <div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">×</button> <strong>Siap digunakan!.</strong>' .$kirim.'.
            </div>
            '; } ?>
          <?php if($step>=2){ echo '<form  role="form" method="post" id="calucw"  action="'.base_url().'estimasi/update_aplikasi/" >';} else{
            echo '<form  role="form" method="post" id="calucw"  action="'.base_url().'estimasi/add_aplikasi" >';
            }?>
          <div class="tab-pane active" id="info">
            <section>
            <div class="row">
              <div class="col-md-6">
                <label class="control-label"  for="selectError">
                  <h3>Deskripsi Aplikasi</h3>
                </label>
                <div class="form-group">
                  <label class="control-label" for="inputSuccess1"> Nama Aplikasi</label>
                  <input type="text"  name="nama_aplikasi"  value="<?php if(isset($nama_aplikasi))echo $nama_aplikasi;?>" class="form-control" id="nama_aplikasi" style="width:400px">
                  <?php if(isset($erraplikasi)){ echo '<p><font color="red">'.$erraplikasi.'</font></p>'; }?>
                  <input type="hidden"  name="id_tim"  value="<?php if(isset($id_tim))echo $id_tim;?>" class="form-control" id="id_tim" style="width:400px">
				</div>
				<p class="help-block">Contoh: Aplikasi UCP</p>

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
                  <label for="exampleInputEmail1">Anggota Pengembang</label>
                  <div class="controls" >
                    <select id="selectError"  name="tim_pengembang[]" multiple  data-rel="chosen" style="width:200px" >
                      <option value="0">Pilih Anggota</option>
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
                      <option value="<?php echo $row->ID_ANGGOTA; ?>"  ><?php echo $row->NAMA_ANGGOTA;  ?></option>
                      <?php }
                        } ?>
                    </select>
                  </div>
                  <?php if(isset($errtim)){ echo '<p><font color="red">Anggota tim belum diisi</font></p>'; }?>
                </div>
                <button type="submit" class="btn btn-success"> <?php if($step>=2){ echo 'Update';} else{ echo 'Simpan';}?></button>
                </form>
              </div>
              <div class="col-md-6">
                <h3>Fitur Aplikasi</h3>
               
			Daftar Fitur Aplikasi
			<table  id="list_fitur" class="display" cellspacing="0" width="100%" >
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
	
	
	
		<tr> 
		<td  ><center>Tidak ada Data </center> </td>
		<td  > </td>
		<td  > </td></tr>
	
    
   
    </tbody>
    </table>
	
	
		<input type="hidden" name="count" value="1" />
        <div class="control-group" id="fields">
            <form class="input-append">
			<label class="control-label" for="inputSuccess1"> Nama Fitur</label>
					<input type="text" name="field1" id="field1" value="" class="form-control" id="nama_aplikasi" style="width:400px"><button id="b1" class="btn add-more" type="button">+</button>
                </form>
            <br>
            
           
                        
        </div>
	

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