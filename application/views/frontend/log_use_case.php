
<link href='<?php echo base_url(); ?>css/jquery.dataTablesUbah.css' rel='stylesheet'>
<script >
 
  $(document).ready( function(){
    $('#hasil_log_uc').dataTable({
    "iDisplayLength": 5,
    "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    });
});

</script>
<table  id="hasil_log_uc" class="display" cellspacing="0" width="100%" >
    <thead>
	
    <tr>
		<th>No</th>
        <th>Nama Use Case</th>
		<th>Jumlah Transaksi</th>
       
		
        <th>Actions</th>
    </tr>
    </thead>
	 <tfoot>
	
    <tr>
		<th>No</th>
        <th>Nama Use Case</th>
		<th>Jumlah Transaksi</th>
       
		
        <th>Actions</th>
    </tr>
    </tfoot>
	
    <tbody>
	<?php $no =0;
	foreach($log->result() as $row){ 
	$no++; ?>
	
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
	
	
	 <td class="center">
            <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>estimasi/form_edit_uucw/<?php echo $row->ID; ?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
           
			<a class="btn btn-danger btn-sm"  onclick="return confirm('Anda Yakin untuk menghapus?')"   href="<?php echo base_url(); ?>estimasi/delete_log_ucw/<?php echo $row->ID; ?>-<?php echo $id_aplikasi; ?>" > 
                <i class="glyphicon glyphicon-trash icon-white"></i> 
                Delete 
			</a>
    
	</td>
		
	</tr>
	<?php } ?>
	
	
	
    
   
    </tbody>
    </table>
	
	