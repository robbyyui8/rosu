

<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-book"></i> Daftar Log Use Case </h2>

      
	
    </div>
    <div class="box-content">
	<ul class="breadcrumb">
        <li>
            <a href="<?php echo base_url();?>log_estimasi/daftar_log_estimasi">Log Estimasi</a>
        </li>
        <li>
            <a href="<?php echo base_url();?>log_estimasi/daftar_log_use_case/<?php echo $id_aplikasi;?>">Daftar Use Case</a>
        </li>
    </ul>
	<b> Nilai UUCW: <?php echo $nilai_ucw; ?></b>
	<br>
	 <a class="btn btn-info" href="<?php echo base_url();?>log_estimasi/form_tambah_log_ucw/<?php echo $id_aplikasi;?>" >
                <i class="glyphicon glyphicon-plus icon-white"></i>
                Tambah
      </a> 
       
	   <br>
	   </br>
	   
	   <?php if(isset($pesan)){
		echo'
	<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>'.$pesan.'</strong>
                </div>
				';
	}
				?>
				
	
	
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
	
    <tr>
		<th>No</th>
        <th>Nama Use Case</th>
		<th>Jumlah Transaksi</th>
        <th>Kategori Use Case</th>
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
	<?php echo $row->NAMA_USE_CASE; ?>
	</td>
	
	<td>
	<?php echo $row->JUM_TRANSAKSI; ?>
	</td>
	
	<td>
	<?php echo $row->TIPE; ?>
	</td>
	<td>
	<?php echo $row->LOG_BOBOT; ?>
	</td>

	 <td class="center">
            <a class="btn btn-info" href="<?php echo base_url(); ?>log_estimasi/edit_log_ucw/<?php echo $row->ID; ?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
           
			<a class="btn btn-danger"  onclick="return confirm('Anda Yakin untuk menghapus?')"   href="<?php echo base_url(); ?>log_estimasi/delete_log_ucw/<?php echo $row->ID; ?>-<?php echo $id_aplikasi; ?>" > 
                <i class="glyphicon glyphicon-trash icon-white"></i> 
                Delete 
			</a>
    
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
