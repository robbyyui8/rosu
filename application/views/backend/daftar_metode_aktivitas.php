<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-flag"></i> Daftar Metode Aktivitas</h2>

      
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
        <th>Nama Metode Aktivitas</th>
        <th>Status</th>
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
	<?php echo $row->NAMA_METODE_AKTIVITAS; ?>
	</td>
	
	<td>
	
	<?php	
	if($row->STATUS==1) { ?>
		<a class="label label-success" title="Tekan untuk non-aktifkan." data-toggle="tooltip" href="<?php echo base_url(); ?>metode_aktivitas/changeStatusNonaktif/<?php echo $row->ID_METODE_AKTIVITAS; ?>"> Aktif </a>
	<?}
	else{?>
		<a class="label label-warning" title="Tekan untuk Aktifkan." data-toggle="tooltip"  href="<?php echo base_url(); ?>metode_aktivitas/changeStatusAktif/<?php echo $row->ID_METODE_AKTIVITAS; ?>"> Tidak aktif </a>
	
	<?php 
	}
	
	?>
	
	
	</td>
		
	 <td class="center">
            <a class="btn btn-info"  href="<?php echo base_url(); ?>metode_aktivitas/edit/<?php echo $row->ID_METODE_AKTIVITAS;?>  ">
                <i class="glyphicon glyphicon-edit icon-white" >  </i>
                Edit
            </a>
            <a class="btn btn-danger"  onclick="return confirm('Anda Yakin untuk Menghapus user <?php echo $row->NAMA_METODE_AKTIVITAS;; ?> ?')"  href="<?php echo base_url(); ?>metode_aktivitas/delete/<?php echo $row->ID_METODE_AKTIVITAS;?> "> 
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
