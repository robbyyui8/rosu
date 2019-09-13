<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-th-large"></i> Daftar Pengkategorian Use Case</h2>

      
    </div>
    <div class="box-content">
	
	<?php 
	if(isset($pesan)){
		echo'
	<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Well done!</strong>'.$pesan.'.
                </div>
				';
	}
				?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
		<th>No</th>
        <th>Tipe</th>
        <th>Transaksi</th>
        <th>Bobot</th>
        
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php $no =0;
	foreach($isi->result() as $row){ $no++; ?>
	
	<tr>
	 <td>
	<?php echo $no; ?>
	</td>
	
	<td>
	<?php echo $row->TIPE; ?>
	</td>
	
	<td>
	<?php 
	
	
 // checking character
 //echo var_dump(substr($row->JUMLAH_TRANSAKSI,0, 2));
 
 
		if(substr($row->JUMLAH_TRANSAKSI,0, 2)=="<="  ){
						
			//conversi  mix string to int
			  $number = (float) filter_var( $row->JUMLAH_TRANSAKSI, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
			  echo ' kurang dari atau sama dengan'.$number;
		}
		elseif(substr($row->JUMLAH_TRANSAKSI,0, 2)==">=" ){
			
			  $number = (float) filter_var( $row->JUMLAH_TRANSAKSI, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
			   echo ' Lebih dari atau sama dengan '.$number;
		}
		else{
			
			$inputRange = $row->JUMLAH_TRANSAKSI; 
						$inputRangeSplit = explode("-", $inputRange);
						$awal 			 = $inputRangeSplit[0];
					// error handling
						$akhir 	         = isset($inputRangeSplit[1]) ? $inputRangeSplit[1] : '';
					
					
				if($akhir!=""){
					echo $awal ." Sampai ".$akhir ;
					
				}
				else{
					echo $inputRange;
	
						}	
						
		}
					
		
		
	
						
			
			
				//echo $row->JUMLAH_TRANSAKSI;
				
			
			
	
			
			?>
	</td>
	<td>
	<?php echo $row->BOBOT; ?>
	</td>
	
	
	
	 <td class="center">
            <a class="btn btn-info"  href="<?php echo base_url(); ?>uc/edit/<?php echo $row->ID_UC_WEIGHT;?>  ">
                <i class="glyphicon glyphicon-edit icon-white" >  </i>
                Edit
            </a>
			<!--
            <a class="btn btn-danger"  onclick="return confirm('Anda Yakin untuk Menghapus user <?php echo $row->TIPE;; ?> ?')"  href="<?php echo base_url(); ?>uc/delete/<?php echo $row->ID_UC_WEIGHT;?> "> 
                <i class="glyphicon glyphicon-trash icon-white"></i> 
                Delete
            
			</a>
			-->
        </td>
		
	</tr>
	<?php }?>
	
    
   
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->
