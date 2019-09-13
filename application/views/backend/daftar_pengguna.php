<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Daftar Pengguna</h2>

      
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
        <th>Nama</th>
        <th>Username</th>
		<th>Email</th>
        <th>Role</th>
        
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
	<?php echo $row->NAMA; ?>
	</td>
	
	<td>
	<?php echo $row->USERNAME; ?>
	</td>
	<td>
	<?php echo $row->EMAIL; ?>
	</td>
	
	<td>
	<?php if($row->ROLE==1){echo "Admin";} 
			else if($row->ROLE==2){ echo "Direktur";}
				else if($row->ROLE==3){ echo "Sistem Analis";} 
				else if($row->ROLE==4){ echo "Sekretaris";} 
				 
					?>
	</td>
	
	 <td class="center">
	 <?php if($row->ROLE==1){ ?>
	  No Action 
	 <?php  } else {?>
            <a class="btn btn-info"  href="<?php echo base_url(); ?>user/edit/<?php echo $row->ID_USER;?>  ">
                <i class="glyphicon glyphicon-edit icon-white" >  </i>
                Edit
            </a>
            <a class="btn btn-danger"  onclick="return confirm('Anda Yakin untuk Menghapus user <?php echo $row->USERNAME;; ?> ?')"  href="<?php echo base_url(); ?>user/delete/<?php echo $row->ID_USER;?> "> 
                <i class="glyphicon glyphicon-trash icon-white"></i> 
                Delete
            
			</a>
		<?php } ?>
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
