<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-book"></i> Request Validasi</h2>

      
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
        <th>Tanggal estimasi</th>
		 <th>Nama Client</th>
        <th>Nama Aplikasi</th>
		<?php if($role==3 || $role==1 ){ ?> 
		<th>UUCW</th>
		<th>UAW</th>
		<th>TCF</th>
		<th>ECF</th>
		<th>Effort Estimate</th>
		<th>Effort Real</th>
		<?php }?>
		<th>Biaya Estimasi (Total)</th>
		<th>Tim Pengembang</th>
		<th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php $no =0;
	foreach($isi->result() as $row){
	if($row->STATUS !=2 && $role ==4){
		continue;
	}
	
	$no++; ?>
	
	<tr>
	 <td>
	<?php echo $no; ?>
	</td>
	<td>
	<?php echo $row->DATE_CREATED; ?>
	</td>
	<td>
	<?php echo $row->NAMA; ?>
	</td>
	<td>
	<?php echo $row->NAMA_APLIKASI; ?>
	</td>
	
	<?php if($role==3 || $role==1 ){ ?> 
	<td>
	<?php echo $row->UUCW; ?> 
	</td>
	<td>
	<?php echo $row->UAW; ?> 
	</td>
	<td>
	<?php echo $row->TCF; ?>
	</td>
	<td>
	<?php echo $row->ECF; ?>
	</td>
	<td>
	<?php echo $row->EFFORT_ESTIMATE; ?>
	</td>
	<td>
		<a href="<?php echo base_url() ?>log_estimasi/form_effort/<?php echo $row->ID_APLIKASI; ?><?php ?>"><?php echo number_format($row->EFFORT_REAL,2,',','.');?> </a>
	</td>
	<?php }?>
	
	
	<td>
	<?php echo 'Rp. ' . number_format($row->BIAYA_ESTIMASI,2,',','.');?>
	
	</td>
	
	
	<td>
	<a href="<?php echo base_url() ?>estimasi/form_edit_aplikasi/<?php echo $row->ID_APLIKASI; ?>"><?php echo $row->NAMA_TIM;?> </a>

	</td>
	
	<td>
	<?php if($row->STATUS==0){ ?>
	<i class="btn-danger btn-sm" >Belum lengkap</i>
	<?php }
else if($row->STATUS==1){ ?>
<i class="btn-warning btn-sm" >Pending</i>
	<?php 
}	
	 else if($row->STATUS==2){ ?>
			<i class="btn-success btn-sm" >Disetujui</i>

	<?php } else if($row->STATUS==3){ ?>
	
	<i class="btn-primary btn-sm" >Sukses</i>
<?php } ?>
	</td>
	
	 <td class="center">
	 <?php if($role <=3 && $row->STATUS1=2 ){ ?>
            <a class="btn btn-info" href="<?php echo base_url(); ?>estimasi/current_step/<?php echo $row->ID_APLIKASI; ?>-<?php echo $row->STEP; ?>" >
                <i class="glyphicon glyphicon-edit icon-white">  </i>
                Edit
            </a>
	 <?php }?>
           <?php if($row->STATUS==2 && $role !=3){ ?>
			<a class="btn btn-default"   data-toggle="tooltip"  data-original-title="Cetak Penawaran" href="<?php echo base_url(); ?>log_estimasi/print_penawaran/<?php echo $row->ID_APLIKASI; ?> " > 
                <i class="glyphicon glyphicon-print icon-white"></i> 
                Cetak Penawaran
			</a>
		   <?php }?>
		   
		    <?php if($row->STATUS==2 && $role <=3){ ?>
			<a class="btn btn-default"   data-toggle="tooltip"  data-original-title="Project Goal" href="<?php echo base_url(); ?>log_estimasi/goal/<?php echo $row->ID_APLIKASI; ?> " > 
                <i class="glyphicon glyphicon-check icon-white"></i> 
                Project Goal
			</a>
		   <?php }?>
		   
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
