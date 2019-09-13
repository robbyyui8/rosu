
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
		   <h3>Deskripsi <?php echo $nama_aplikasi;?></h3>
		  <table width="100" height="100" border="0">
                     <tr>
                        <th width="227" scope="col">
                           <div align="left">Nama Aplikasi </div>
                        </th>
                        <th width="100" scope="col">
                           <div align="left">:</div>
                        </th>
                        <td width="100" scope="col">
                           <div align="left"><?php echo $nama_aplikasi; ?></div>
                        </td>
                       
                     </tr>
                     <tr>
                        <th scope="row">
                           <div align="left">Penggunaan Templete </div>
                        </th>
                        <td><strong> :</strong></td>
                        <td><?php echo $penggunaan_templete; ?></td>
                       
                     </tr>
                     <tr>
                        <th scope="row">
                           <div align="left">Tim Pengembang</div>
                        </th>
                        <td><strong>:</strong></td>
                        <td>             <div class="controls" >
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
			</td>
                        
                     </tr>
                                         
                     
                  </table>
                   
				   
             <label class="control-label" for="selectError">
                     <h3>Distribusi usaha dan biaya <?php echo $nama_aplikasi;?></h3>
                  </label>
				 <form method="post" action="<?php echo base_url();?>/log_estimasi/update_log_biaya/<?php echo $id_aplikasi; ?>" >
                 <table width="700" border="1"  class="table-bordered" >
                     <tr>
                        <th width="219" rowspan="2" scope="col">Aktivitas</th>
                        <th colspan="2" scope="col">Effort</th>
                        <th colspan="4" scope="col">Biaya</th>
                     </tr>
                     <tr>
                        <td width="90">
                           <center>% </center>                        </td>
                        <td width="118">Hour of Effort </td>
                        <td width="190">Standard gaji/bulan</td>
                        <td width="162">Gaji per Jam </td>
                        <td width="162">Biaya (Rp)</td>
                     </tr>
                     <tr>
                        <th colspan="6" scope="row">
                           <div align="left"><b>SOFTWARE DEVELOPMENT</b></div>                        </th>
                     </tr>
                     <?php $no=0; foreach($get_log_biaya->result() as $row){ 
					  $no++;
					 if($row->KATEGORI_AKTIVITAS==1){
						
					 ?>
					
					 
                     <tr>
                        <th scope="row"><?php echo $row->NAMA_AKTIVITAS; ?></th>
                        <td><?php echo $row->PRESENTASE_USAHA; ?> %</td>
                        <td><?php echo number_format($row->NILAI_USAHA,2,',','.');?></td>
                        <td><?php echo 'Rp. ' . number_format($row->GAJI_PER_BULAN,2,',','.'); ?></td>
                        <td><?php echo 'Rp. ' . number_format($row->GAJI_PER_JAM,2,',','.'); ?></td>
                        <td>
						
						 <input type="text"  name="biaya<?php echo $no;?>" value="<?php echo number_format($row->BIAYA_AKTIVITAS);?>" class="form-control" id="nama_aktor">
						<input type="hidden"  name="id_log_biaya<?php echo $no;?>" value="<?php echo $row->ID_LOG_BIAYA;?>" class="form-control" id="id_log_biaya">

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
                        <td><?php echo 'Rp. ' . number_format($subBiayaSD,2,',','.');  ?></td>
                     </tr>
                     <tr>
                        <th colspan="6" scope="row">
                           <div align="left"><b>ON GOING ACTIVITY</b></div>                        </th>
                     </tr>
					   <?php $no=0; foreach($get_log_biaya->result() as $row){ 
					  $no++;
					 if($row->KATEGORI_AKTIVITAS==2){
						
					 ?>
					 
					 
                     <tr>
                        <th scope="row"><?php echo $row->NAMA_AKTIVITAS; ?></th>
                        <td><?php echo $row->PRESENTASE_USAHA; ?> %</td>
                        <td><?php echo number_format($row->NILAI_USAHA,2,',','.');?></td>
                        <td><?php echo 'Rp. ' . number_format($row->GAJI_PER_BULAN,2,',','.'); ?></td>
                        <td><?php echo 'Rp. ' . number_format($row->GAJI_PER_JAM,2,',','.'); ?></td>
                        <td> <input type="text"  name="biaya<?php echo $no;?>" value="<?php echo number_format($row->BIAYA_AKTIVITAS);?>" class="form-control" id="nama_aktor">
						<input type="hidden"  name="id_log_biaya<?php echo $no;?>" value="<?php echo $row->ID_LOG_BIAYA;?>" class="form-control" id="id_log_biaya">
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
                        <td><?php echo 'Rp. ' . number_format($subBiayaOGA,2,',','.');  ?></td>
                     </tr>
                     
                     <tr>
                        <th colspan="6" scope="row">
                           <div align="left"><b>QUALITY AND TESTING</b></div>                        </th>
                     </tr>
					   <?php $no=0; foreach($get_log_biaya->result() as $row){ 
					  $no++;
					 if($row->KATEGORI_AKTIVITAS==3){
						
					 ?>
					 
					 
                     <tr>
                        <th scope="row"><?php echo $row->NAMA_AKTIVITAS; ?></th>
                        <td><?php echo $row->PRESENTASE_USAHA; ?> %</td>
                        <td><?php echo number_format($row->NILAI_USAHA,2,',','.');?></td>
                        <td><?php echo 'Rp. ' . number_format($row->GAJI_PER_BULAN,2,',','.'); ?></td>
                        <td><?php echo 'Rp. ' . number_format($row->GAJI_PER_JAM,2,',','.'); ?></td>
                        <td><input type="text"  name="biaya<?php echo $no;?>" value="<?php echo number_format($row->BIAYA_AKTIVITAS);?>" class="form-control" id="nama_aktor">
						<input type="hidden"  name="id_log_biaya<?php echo $no;?>" value="<?php echo $row->ID_LOG_BIAYA;?>" class="form-control" id="id_log_biaya">
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
                        <td><?php echo 'Rp. ' . number_format($subBiayaQT,2,',','.');  ?></td>
                     </tr>
                     
                     <tr>
                        <th colspan="4" scope="row">TOTAL BIAYA </th>
                        <td>&nbsp;</td>
                        <td><b><?php echo 'Rp. ' . number_format($total_biaya,2,',','.');?></b></td>
                     </tr>
                  </table>
				                  
				  <table>
                     <tr>
					
					 <div class="form-group">
					 <input type="hidden"  name="nomer"  class="form-control" value="<?php echo $no; ?>"id="total" style="width:400px">
                    <input type="hidden"  name="total"  class="form-control" value="<?php echo $total_biaya; ?>"id="total" style="width:400px">
                </div>	
<button type="submit" class="btn btn-success">Submit </button>
				
				</form>
                        
                        <td><strong></strong></td>
                        <td></td>
                        <td>&nbsp;</td>
                     </tr>
                  </table>
               
           
         </div>
         <!--/span-->
         <!--/span-->
      </div>
   </div>
</div>
<!--/span-->
</div>
<!--/row-->