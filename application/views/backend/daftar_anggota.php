<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Daftar anggota tim</h2>

      
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
       
		<!--<th>NIP</th> -->
        <th>Nama Anggota</th>
		<th>Profesi</th>
		<th>Pengalaman</th>
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
	<!--
	<td>
	<?php // echo $row->NIP;	?>
	</td>-->
	<td>
	
	<?php echo $row->NAMA_ANGGOTA; ?>
	</td>
	<td>
	<?php echo $row->NAMA_PROFESI; ?>
	</td>
	
	<td>
	<?php echo $row->PENGALAMAN; ?>
	</td>
	
	 <td class="center">
            <a class="btn btn-info"  href="<?php echo base_url(); ?>anggota/edit/<?php echo $row->ID_ANGGOTA;?>  ">
                <i class="glyphicon glyphicon-edit icon-white" >  </i>
                Edit
            </a>
            <!--<a class="btn btn-danger"  onclick="return confirm('Anda Yakin untuk Menghapus user <?php echo $row->NAMA_ANGGOTA; ?> ?')"  href="<?php echo base_url(); ?>anggota/delete/<?php echo $row->ID_ANGGOTA;?> "> 
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
