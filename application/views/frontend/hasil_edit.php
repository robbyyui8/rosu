
<script>
  function makeAjaxCall(){
    	var konfirm = confirm("Anda yakin?");
  	if (konfirm == false) {
      return;
  } 
  document.getElementById('loader').style.visibility='visible';
   var url_pas="<?php echo base_url();?>estimasi/submit";
  
    	$.ajax({
    		type: "post",
    		url:url_pas,
    		cache: false,				
    		data: $('#kirim').serialize(),
    		success: function(json){						
    		try{
    		
    		var obj = jQuery.parseJSON(json);
  	   alert( obj['STATUS']);
  	   document.getElementById('loader').style.visibility='hidden';
    		}catch(e) {		
    			alert(e);
  			document.getElementById('loader').style.visibility='hidden';
    		}		
    		},
    		error: function(){						
    			alert('Error while request..');
  			document.getElementById('loader').style.visibility='hidden';
    		}
  		
     });
    
    }
    
  function kirimNilai(){
  url_pas="<?php echo base_url();?>estimasi/tambah_op";
  
    	$.ajax({
    		type: "post",
    		url:url_pas,
    		cache: false,				
    		data: $('#kirim_nilai').serialize(),
    		success: function(json){						
    		try{
    		
    		var obj = jQuery.parseJSON(json);
			if(obj['errnilai'] !=""){
				document.getElementById('errnilai').innerHTML=obj['errnilai'] ;
			}
			if(obj['errdeskripsi'] !=""){
				document.getElementById('errdeskripsi').innerHTML=obj['errdeskripsi'] ;
			}
			
  		 alert(obj['STATUS']);
  	   //alert(obj['pesan']);
	    if(obj['errdeskripsi'] =="" && obj['errnilai'] ==""){
				window.location.href = "<?php echo base_url();?>estimasi/result";	
			
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
    
    function update(index){
  var string="<?php echo base_url();?>estimasi/update_bop/".concat(index);
  
  var url=string;
  
    	$.ajax({
    		type: "post",
    		url:url,
    		cache: false,				
    		data: $('#update_bop').serialize(),
    		success: function(json){						
    		try{
    		
    		var obj = jQuery.parseJSON(json);
  		 alert(obj['STATUS']);
  	   //alert(obj['pesan']);
  	  window.location.href = "<?php echo base_url();?>estimasi/result";	
    		}catch(e) {		
    			alert(e);
    		}		
    		},
    		error: function(){						
    			alert('Error while request..');
    		}
     });
    
    }
    
    
    
    
  function showForm(){
  		 
  	  var row = document.getElementById('TampilkanForm');
        row.style.display = '';
  	  var tombol = document.getElementById('tmbl');
        tombol.style.display = 'none';
  	
  }
  
  function showFormEdit(index,jumlah){
  	
  	 
  			// hilangkan row
  			var page = document.getElementById('p'.concat(index));
  			page.style.display = 'none';
  			
  			var page2 = document.getElementById('p2'.concat(index));
  			page2.style.display = 'none';
  			// tampilkan field nilai
  			var fieldnil = document.getElementById('nil'.concat(index));
  			fieldnil.style.display = '';
  			// tampilkan field deskripsi
  			var fielddesk = document.getElementById('desk'.concat(index));
  			fielddesk.style.display = '';
  			
  			//diasble tombol delete
  			index2=0;
  			while(index2<jumlah){
  				var del = document.getElementById('hapus'.concat(jumlah));
  			del.style.display = 'none';
  			//disable tombol edit
  			var edit = document.getElementById('ubah'.concat(jumlah));
  			edit.style.display = 'none';
  			jumlah--;
  			}
  			
  		
  			//enable tombol update
  	var update = document.getElementById('update'.concat(index));
  			update.style.display = '';
  			var cancle = document.getElementById('cancle'.concat(index));
  			cancle.style.display = '';
  	
  var tombol = document.getElementById('tombol');
        tombol.style.display = 'none';
  	}
  	
  	function edit_biaya(){
  		var biaya = document.getElementById('tombol_biaya');
  			biaya.style.display = '';
  		var index2=0;
  		while(index2<12){
  			index2++;
  			var page2 = document.getElementById('p'.concat(index2));
  			page2.style.display = 'none';
  			
  			var input = document.getElementById('biaya_aktivitas'.concat(index2));
  			input.style.display = '';
  			
  			
  		}
  		
  		
  		
  		
  	}
  	
</script>


<div class="row">
  <div class="box col-md-12">
    <div class="box-inner">
      <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-usd"></i>Form Estimasi Harga Perangkat Lunak </h2>
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
					
					<?php if($step >=3){?> 
					<li ><a href="<?php echo base_url(); ?>estimasi/form_uucw">UUCW</a></li>
					<?php } else {  ?> 
					<li class="active" ><a href="#info">UUCW</a></li>
					<?php } ?>
					
					<?php if($step >=4){?> 
					 <li ><a href="<?php echo base_url(); ?>estimasi/form_uaw"  >UAW</a></li>
					<?php } else {  ?> 
					<li class="disabled" ><a href="#">UAW</a></li>
					<?php } ?>
					
					<?php if($step >=5){?> 
					 <li  ><a href="<?php echo base_url(); ?>estimasi/edit_log_tcf/<?php echo $this->session->userdata('id_aplikasi')?>"  >TCF <?php if(isset($edit) && $edit==true ){ echo'<span class="label label-info">Edit</span>';} ?> </a></li>
					<?php } else {  ?> 
					<li class="active" ><a href="#">TCF</a></li>
					<?php } ?>
					
					<?php if($step >=6){?> 
					 <li  ><a href="<?php echo base_url(); ?>estimasi/edit_log_ecf/<?php echo $this->session->userdata('id_aplikasi')?>"  >ECF</a></li>
					<?php } else {  ?> 
					<li class="disabled" ><a href="#"  >ECF</a></li>
					<?php } ?>
					
					<?php if($step >=7){?> 
					 <li class="active" ><a href="<?php echo base_url(); ?>estimasi/result"  >Result</a></li>
					<?php } else {  ?> 
					<li class="disabled" ><a href="#"  >Result</a></li>
					<?php } ?>
					
                   <?php if($step ==7){?> 
         <!-- <li  ><a href="<?php echo base_url(); ?>log_estimasi/form_effort"  >Effort Real</a></li> -->
          <?php }   ?> 
         
					
					
                </ul>
        
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active" id="info"  >
            <?php 
              if(isset($pesan_biaya)){
              	echo'
              <div class="alert alert-success">
                                 <button type="button" class="close" data-dismiss="alert">×</button>
                                 <strong>Well done!</strong>'.$pesan_biaya.'.
                             </div>
              			';
              }
              			?>
            <section id="icons1">
              <div class="row">
                <div class="col-md-6">
                  <label class="control-label" for="selectError">
                    <h3>Hasil Akhir Perhitungan Nilai UCP</h3>
                  </label>
                  <table width="400" height="287" border="0">
                    <tr>
                      <th width="227" scope="col">
                        <div align="left">Unajusted Use Case Weight </div>
                      </th>
                      <th width="10" scope="col">
                        <div align="left">:</div>
                      </th>
                      <td width="68" scope="col">
                        <div align="left"><?php echo $ucw; ?></div>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">
                        <div align="left">Unajusted Actor Weight </div>
                      </th>
                      <td><strong> :</strong></td>
                      <td><?php echo $uaw; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">
                        <div align="left">Enviromental Complexity Factor </div>
                      </th>
                      <td><strong>:</strong></td>
                      <td><?php echo $ecf; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">
                        <div align="left">Tecnical Complexity Factor </div>
                      </th>
                      <td><strong>:</strong></td>
                      <td><?php echo $tcf; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">
                        <div align="left">Use Case Point </div>
                      </th>
                      <td><strong>:</strong></td>
                      <td><b><?php echo $nilai_ucp;?></b></td>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-6">
                  <label class="control-label" for="selectError">
                    <h3>Hasil Perhitungan Usaha</h3>
                  </label>
                  <table width="461" height="55" border="0">
                    <tr>
                      <th width="274" height="24" scope="row">
                        <div align="left">Nilai Effort Rate</div>
                      </th>
                      <td width="12"><strong>:</strong></td>
                      <td width="300">
                        <?php echo $effort_rate; ?>
                        <div align="center">
                        </div>
                      </td>
                      <td width="47">     
                      </td>
                      <td width="45">    
                      </td>
                    </tr>
                    <tr>
                      <th height="25" scope="row">
                        <div align="left">Nilai Hour Effort </div>
                      </th>
                      <td><strong>:</strong></td>
                      <td colspan="3"><?php echo $nilai_hour_effort; ?></td>
                    </tr>
                  </table>
                </div>
              </div>
            </section>
            <label class="control-label" for="selectError">
              <h3>Rekap Biaya</h3>
            </label>
            <div class="row">
              <div class="col-md-7">
                <h3>Distribusi biaya</h3>
                <button type="submit"  onclick="edit_biaya();"   class="btn btn-success"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                <br>
                </br>
                <form  method="post" action="<?php echo base_url(); ?>estimasi/update_biaya" >
                  <table width="600" border="1"  class="table-bordered" >
                    <tr>
                      <th width="219" rowspan="2" scope="col">Aktivitas</th>
                      <th colspan="2" scope="col">Effort</th>
                      <th colspan="4" scope="col">Biaya</th>
                    </tr>
                    <tr>
                      <td width="90">
                        <center>% </center>
                      </td>
                      <td width="118">Hour of Effort </td>
                      <td width="190">Standard gaji/bulan(Rp)</td>
                      <td width="162">Gaji per Jam (Rp)</td>
                      <td width="162">Biaya (Rp)</td>
                    </tr>
                    <tr>
                      <th colspan="6" scope="row">
                        <div align="left"><b>SOFTWARE DEVELOPMENT</b></div>
                      </th>
                    </tr>
                    <?php 
                      $index=0;
                      foreach($get_log_biaya->result() as $row){ 
                      
                      if($row->KATEGORI_AKTIVITAS ==1){
                        $index++;
                      ?>
                    <tr>
                      <th scope="row"><?php echo $row->NAMA_AKTIVITAS; ?></th>
                      <td><?php echo $row->PRESENTASE_USAHA; ?> %</td>
                      <td><?php echo number_format($row->NILAI_USAHA,2,',','.');?></td>
                      <td><?php echo ' ' . number_format($row->GAJI_PER_BULAN,2,',','.'); ?></td>
                      <td><?php echo ' ' . number_format($row->GAJI_PER_JAM,2,',','.'); ?></td>
                      <td >
                        <p id="p<?php echo $index;?>"><?php echo ' ' . number_format($row->BIAYA_AKTIVITAS,2,',','.');?></p>
                        <input type="txt" class="form-control" style="display:none;" id="biaya_aktivitas<?php echo $index;?>"  name="biaya_aktivitas<?php echo $index;?>" value="<?php echo $row->BIAYA_AKTIVITAS;?>" >
                        <input type="hidden" class="form-control"  id="id_log_biaya<?php echo $index;?>"  name="id_log_biaya<?php echo $index;?>" value="<?php echo $row->ID_LOG_BIAYA;?>" >
                      </td>
                    </tr>
                    <?php }
                      }
                      ?>
                    <tr>
                      <th scope="row">Sub Total</th>
                      <td><?php echo number_format($subPresentaseSD,2,',','.');  ?>%</td>
                      <td><?php echo number_format($subUsahaSD,2,',','.');  ?></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td><?php echo ' ' . number_format($subBiayaSD,2,',','.');  ?></td>
                    </tr>
                    <tr>
                      <th colspan="5" scope="row">
                        <div align="left"><b>ON GOING ACTIVITY</b></div>
                      </th>
                    </tr>
                    <?php foreach($get_log_biaya->result() as $row){ 
                      if($row->KATEGORI_AKTIVITAS ==2){
                       $index++;
                      ?>
                    <tr>
                      <th scope="row"><?php echo $row->NAMA_AKTIVITAS; ?></th>
                      <td><?php echo $row->PRESENTASE_USAHA; ?> %</td>
                      <td><?php echo number_format($row->NILAI_USAHA,2,',','.');?></td>
                      <td><?php echo ' ' . number_format($row->GAJI_PER_BULAN,2,',','.'); ?></td>
                      <td><?php echo ' ' . number_format($row->GAJI_PER_JAM,2,',','.'); ?></td>
                      <td >
                        <p id="p<?php echo $index;?>"><?php echo ' ' . number_format($row->BIAYA_AKTIVITAS,2,',','.');?></p>
                        <input type="txt" class="form-control" style="display:none;" id="biaya_aktivitas<?php echo $index;?>"  name="biaya_aktivitas<?php echo $index;?>" value="<?php echo $row->BIAYA_AKTIVITAS;?>" >
                        <input type="hidden" class="form-control"  id="id_log_biaya<?php echo $index;?>"  name="id_log_biaya<?php echo $index;?>" value="<?php echo $row->ID_LOG_BIAYA;?>" >
                      </td>
                    </tr>
                    <?php }
                      }
                      ?>
                    <tr>
                      <th scope="row">Sub Total</th>
                      <td><?php echo number_format($subPresentaseOGA,2,',','.');  ?>%</td>
                      <td><?php echo number_format($subUsahaOGA,2,',','.');  ?></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td><?php echo ' ' . number_format($subBiayaOGA,2,',','.');  ?></td>
                    </tr>
                    <tr>
                      <th colspan="6" scope="row">
                        <div align="left"><b>QUALITY AND TESTING</b></div>
                      </th>
                    </tr>
                    <?php foreach($get_log_biaya->result() as $row){ 
                      if($row->KATEGORI_AKTIVITAS ==3){
                        $index++;
                      ?>
                    <tr>
                      <th scope="row"><?php echo $row->NAMA_AKTIVITAS; ?></th>
                      <td><?php echo $row->PRESENTASE_USAHA; ?> %</td>
                      <td><?php echo number_format($row->NILAI_USAHA,2,',','.');?></td>
                      <td><?php echo ' ' . number_format($row->GAJI_PER_BULAN,2,',','.'); ?></td>
                      <td><?php echo ' ' . number_format($row->GAJI_PER_JAM,2,',','.'); ?></td>
                      <td >
                        <p id="p<?php echo $index;?>"><?php echo ' ' . number_format($row->BIAYA_AKTIVITAS,2,',','.');?></p>
                        <input type="txt" class="form-control" style="display:none" id="biaya_aktivitas<?php echo $index;?>"  name="biaya_aktivitas<?php echo $index;?>" value="<?php echo $row->BIAYA_AKTIVITAS;?>" >
                        <input type="hidden" class="form-control"  id="id_log_biaya<?php echo $index;?>"  name="id_log_biaya<?php echo $index;?>" value="<?php echo $row->ID_LOG_BIAYA;?>" >
                      </td>
                    </tr>
                    <?php }
                      }
                      ?>
                    <tr>
                      <th scope="row">Sub Total</th>
                      <td><?php echo number_format($subPresentaseQT,2,',','.');  ?>%</td>
                      <td><?php echo number_format($subUsahaQT,2,',','.');  ?></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td><?php echo ' ' . number_format($subBiayaQT,2,',','.');  ?></td>
                    </tr>
                    <tr>
                      <th colspan="4" scope="row">TOTAL BIAYA POKOK PERANGKAT LUNAK </th>
                      <td>&nbsp;</td>
                      <td><b><?php echo ' ' . number_format($total_biaya,2,',','.');?></b></td>
                    </tr>
                  </table>
                  <br>
                  <button type="submit"  style="display:none"  id="tombol_biaya" onclick="showForm();"  class="btn btn-success"><i class="glyphicon glyphicon-edit"></i> Update Biaya</button>
                </form>
              </div>
              <div class="col-md-5">
                <h3>Biaya Operasional</h3>
                <table  border="1"  class="table-bordered" >
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Deskripsi</th>
                      <th>Biaya (Rp)</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <form method="post" id="update_bop" action="" >
                    <?php 
                      $index=0;
                      $total =0;
                      foreach($biaya_op->result() as $row) { 
                      $index++;
                      $total=$total+$row->NILAI;
                      ?>
                    <tr >
                      <td>
                        <?php echo $index; ?>
                      </td>
                      <td>
                        <p id="<?php echo 'p'.$index; ?>" >
                          <?php echo $row->DESKRIPSI;?>
                        </p>
                        <textarea rows="2" name="deskripsi<?php echo $index;?>"  style="display:none;" id="desk<?php echo $index;?>" cols="15"><?php echo $row->DESKRIPSI;?> </textarea>
                      </td>
                      <td>
                        <p id="<?php echo 'p2'.$index; ?>" >
                          <?php echo ' ' . number_format($row->NILAI,2,',','.');?>
                        </p>
                        <input type="txt" class="form-control" style="display:none;" id="nil<?php echo $index;?>"  name="nilai<?php echo $index;?>" value="<?php echo $row->NILAI;?>" id="exampleInputEmail1" placeholder=" nilai">
                        <input type="hidden" class="form-control"  name="id_op<?php echo $index;?>" value="<?php echo $row->ID_OP;?>" >
                      </td>
                      <td class="center">
                        <a class="btn btn-info btn-sm" id="ubah<?php echo $index;?>" onclick = "showFormEdit(<?php echo $index;?>,<?php echo $biaya_op->num_rows();?>);" >
                        <i class="glyphicon glyphicon-edit icon-white"></i>
                        Edit
                        </a>
                        <a class="btn btn-success btn-sm" style="display:none;" id="update<?php echo $index;?>"  onclick="update(<?php echo $index; ?>)" >
                        <i class="glyphicon glyphicon-edit icon-white"></i>
                        Update
                        </a>
                        <a class="btn btn-default btn-sm" style="display:none;" id="cancle<?php echo $index;?>"  href="<?php echo base_url(); ?>estimasi/result">
                        <i class="glyphicon glyphicon-edit icon-white"></i>
                        Cancel
                        </a>
                        <a class="btn btn-danger btn-sm"  id="hapus<?php echo $index;?>" onclick="return confirm('Anda Yakin untuk menghapus?')"   href="<?php echo base_url(); ?>estimasi/delete_bop/<?php echo $row->ID_OP; ?>" > 
                        <i class="glyphicon glyphicon-trash icon-white"></i> 
                        Delete 
                        </a>
                      </td>
                    </tr>
                    <?php 	} ?>
                  </form>
                  <?php if($biaya_op->num_rows==0) { 
                    echo '<tr>
                    <td colspan = "4">
                    Tidak ada data
                    </td>
                    
                    
                    </tr>';
                    
                    }?>
                  <tr id="TampilkanForm" style="display:none;" >
                    <form method="post" id="kirim_nilai">
                      <td>
                      </td>
                      <td>
                        <textarea rows="2" name="deskripsi" placeholder="deskripsi" cols="15"></textarea>
						<p ><font id="errdeskripsi" color="red"></font></p>
                      </td>
                      <td>
                        <input type="txt" class="form-control" name="nilai" id="exampleInputEmail1" placeholder=" nilai">
                      <p ><font id="errnilai" color="red"></font></p>
					  </td>
                    </form>
                    <td>
                      <button type="submit"  onclick="kirimNilai();" class="btn btn-success">Simpan</button>
                      <a class="btn btn-default "  href="<?php echo base_url(); ?>estimasi/result">
                      <i class="glyphicon glyphicon-edit icon-white"></i>
                      Cancel
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td colspan = "2">
                      <b>TOTAl</b>
                    </td>
                    <td>
                      <b>
                      <?php echo ' ' . number_format($total,2,',','.');?></b>
                    </td>
                    <td>
                    </td>
                  </tr>
                </table>
                <button type="submit"  onclick="showForm();"  id="tmbl" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
                <br>
                </br>
                <h3>
                  Biaya Keseluruhan
                </h3>
                <table  border="1"  class="table-bordered" >
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Deskripsi Biaya</th>
                      <th>Jumlah (Rp)</th>
                    </tr>
                  </thead>
                  <tr>
                    <td>
                      1
                    </td>
                    <td>
                      Biaya Pokok Pembuatan Perangkat Lunak
                    </td>
                    <td><?php echo ' ' . number_format($total_biaya,2,',','.');?></td>
                  </tr>
                  <tr>
                    <td>
                      2
                    </td>
                    <td>
                      Total Biaya Operasional
                    </td>
                    <td>
                      <?php echo ' ' . number_format($total,2,',','.');?></b>
                    </td>
                  </tr>
                  <tr>
                    <td colspan = "2">
                      <b>TOTAL KESELURUHAN </b>
                    </td>
                    <td><b><?php echo ' ' . number_format($total_biaya+$total,2,',','.');?></b></td>
                  </tr>
                </table>
                <table>
                  <tr>
                    <?php if($role==2){?>
                    <form method="post"  action="<?php echo base_url() ?>log_estimasi/validate/<?php echo $id_aplikasi;?>" >
                      <div class="form-group">
                        <input type="hidden"  name="validasi"  class="form-control" value="1"id="total" style="width:400px">
                      </div>
                      <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> Validasi </button>
                    </form>
                    <?php }     
                      else{ ?>
                    <form method="post"  id="kirim" action="" >
                      <div class="form-group">
                        <input type="hidden"  name="biaya_estimasi"  class="form-control" value="<?php echo $total_biaya+$total; ?>"id="total" style="width:400px">
                        <input type="hidden"  name="effort_estimate"  class="form-control" value="<?php echo $nilai_hour_effort ?>"id="total_estimate" style="width:400px">
                      </div>
                    </form>
                    <button type="submit"  onclick="makeAjaxCall();" class="btn btn-success"><i class="glyphicon glyphicon-envelope"></i> Kirim estimasi </button>
                    <div style="visibility:hidden" id="loader">
                      <img    src="<?php echo base_url()?>img/ajax-loaders/ajax-loader-1.gif" title="img/ajax-loaders/ajax-loader-1.gif">
                    </div>
                    <?php 	} ?>
                    <td><strong></strong></td>
                    <td></td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
              </div>
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