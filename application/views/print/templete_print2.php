<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>Untitled Document</title>
</head>
<body>
<center> <h1> Rekapitulasi Biaya </center>
<br>
<br>
<br>
<table  border="1"  cellpadding="0" cellspacing="0"  >
                     <tr>
                        <th width="120" rowspan="2" scope="col">Aktivitas</th>
                        <th colspan="2" scope="col">Effort</th>
                        <th colspan="2" scope="col">Biaya</th>
                     </tr>
                     <tr>
                        <td width="48">
                          %                     </td>
                        <td width="106">Hour of Effort </td>
                        <td width="100">Standard gaji/jam </td>
                        <td width="117">Biaya per Jam </td>
                     </tr>
                     <tr>
                        <th colspan="5" scope="row">
                           <div align="left"><b>SOFTWARE DEVELOPMENT</b></div>                        </th>
                     </tr>
                     <?php 
                        $total			=0;
                        $subpresentase	=0;
                        $subusaha		=0;
                        $subtotalgaji	=0;
                        foreach($distribusi_usaha->result() as $row){
							
							 if($row->ID_KATEGORI_AKTIVITAS!=1){
								continue;
							}
                         $hoe						=($row->PRESENTASE/100)*$nilai_hour_effort;
						 $biaya_per_bulan			=($row->PRESENTASE/100)*$nilai_hour_effort*($row->GAJI);
                         $biaya_per_jam				=($row->PRESENTASE/100)*$nilai_hour_effort*($row->GAJI/160);
                         $standard_gaji_per_jam		=$row->GAJI/160;
                        
                         
                       	 ?>
                     <tr>
                        <th scope="row" align="left" ><?php echo $row->NAMA_AKTIVITAS; ?></th>
                        <td><?php echo $row->PRESENTASE; ?> %</td>
                        <td><?php echo number_format($hoe,2,',','.');?></td>
                        <td><?php echo 'Rp. ' . number_format($standard_gaji_per_jam,2,',','.'); ?> </td>
                        <td><?php echo 'Rp. ' . number_format($biaya_per_jam,2,',','.');?> </td>
                     </tr>
                     <? 
                        $subpresentase				=$subpresentase+$row->PRESENTASE;
                        $subusaha					=$subusaha+$hoe	;
                        $subtotalgaji				=$subtotalgaji+$biaya_per_jam;
                        }
						// memasukan kedalam subtotal
						$total=$total+$subtotalgaji;
						?>
                     <tr>
                        <th scope="row">Sub Total</th>
                        <td><?php echo number_format($subpresentase,2,',','.');  ?>%</td>
                        <td><?php echo number_format($subusaha,2,',','.');  ?></td>
                        <td>&nbsp;</td>
                        <td><?php echo 'Rp. ' . number_format($subtotalgaji,2,',','.');  ?></td>
                     </tr>
                     <tr>
                        <th colspan="5" scope="row">
                           <div align="left"><b>ON GOING ACTIVITY</b></div>                        </th>
                     </tr>
                     <?php 
                     
                        $subpresentase	=0;
                        $subusaha		=0;
                        $subtotalgaji	=0;
                        foreach($distribusi_usaha->result() as $row){
							
							 if($row->ID_KATEGORI_AKTIVITAS!=2){
							continue;
                        }
						
                         $hoe						=($row->PRESENTASE/100)*$nilai_hour_effort;
                         $biaya_per_jam			=($row->PRESENTASE/100)*$nilai_hour_effort*($row->GAJI/176);
                         $standard_gaji_per_jam	=$row->GAJI/176;
						 
						 $subpresentase			=$subpresentase+$row->PRESENTASE;
                        $subusaha					=$subusaha+$hoe	;
                        $subtotalgaji				=$subtotalgaji+$biaya_per_jam;
                         
                        
                        ?>
                     <tr>
                        <th scope="row" align="left" ><?php echo $row->NAMA_AKTIVITAS; ?></th>
                        <td><?php echo $row->PRESENTASE; ?> %</td>
                        <td><?php echo number_format($hoe,2,',','.');?></td>
                        <td><?php echo 'Rp. ' . number_format($standard_gaji_per_jam,2,',','.'); ?> </td>
                        <td><?php echo 'Rp. ' . number_format($biaya_per_jam,2,',','.');?> </td>
                     </tr>
                     <?php }
					 // memasukan kedalam subtotal
						$total=$total+$subtotalgaji;
						?>
                      <tr>
                        <th scope="row">Sub Total</th>
                        <td><?php echo number_format($subpresentase,2,',','.');  ?>%</td>
                        <td><?php echo number_format($subusaha,2,',','.');  ?></td>
                        <td>&nbsp;</td>
                        <td><?php echo 'Rp. ' . number_format($subtotalgaji,2,',','.');  ?></td>
                     </tr>
                     <tr>
                        <th colspan="5" scope="row">
                           <div align="left"><b>QUALITY AND TESTING</b></div>                        </th>
                     </tr>
                     <?php 
                        $subpresentase	=0;
                        $subusaha		=0;
                        $subtotalgaji	=0;
                        foreach($distribusi_usaha->result() as $row){
							
							 if($row->ID_KATEGORI_AKTIVITAS!=3){
                        continue;
                        }
                          $hoe						=($row->PRESENTASE/100)*$nilai_hour_effort;
                         $biaya_per_jam			=($row->PRESENTASE/100)*$nilai_hour_effort*($row->GAJI/176);
                         $standard_gaji_per_jam	=$row->GAJI/176;
						 
						 $subpresentase			=$subpresentase+$row->PRESENTASE;
                        $subusaha					=$subusaha+$hoe	;
                        $subtotalgaji				=$subtotalgaji+$biaya_per_jam;
                        
                       ?>
                     <tr>
                        <th scope="row" align="left" ><?php echo $row->NAMA_AKTIVITAS; ?></th>
                        <td><?php echo $row->PRESENTASE; ?> %</td>
                        <td><?php echo number_format($hoe,2,',','.');?></td>
                        <td><?php echo 'Rp. ' . number_format($standard_gaji_per_jam,2,',','.'); ?> </td>
                        <td><?php echo 'Rp. ' . number_format($biaya_per_jam,2,',','.');?> </td>
                     </tr>
                     <?php } 
					 
					 // memasukan kedalam subtotal
						$total=$total+$subtotalgaji; 
						?>
                      <tr>
                        <th scope="row">Sub Total</th>
                        <td><?php echo number_format($subpresentase,2,',','.');  ?>%</td>
                        <td><?php echo number_format($subusaha,2,',','.');  ?></td>
                        <td>&nbsp;</td>
                        <td><?php echo 'Rp. ' . number_format($subtotalgaji,2,',','.');  ?></td>
                     </tr>
                     <?php 
                       
                        ?>
                     <tr>
                        <th colspan="4" scope="row">TOTAL BIAYA </th>
                        <td><b><?php echo 'Rp. ' . number_format($total,2,',','.');?>  </b>  </td>
                     </tr>
</table>



<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<center> <h1> LAMPIRAN </center>
<p><strong>Unajusted  Use Case Weight</strong></p>
<table border="1" cellspacing="0" cellpadding="0">

  <tr>
    <td width="147" valign="top"><p>NO</p></td>
    <td width="109" valign="top"><p>NAMA USE CASE</p></td>
    <td width="125" valign="top"><p>JUMLAH TRANSAKSI</p></td>
    <td width="84" valign="top"><p>KATEGORI</p></td>
  </tr>
  
  <?php $no=0;
foreach($log_ucw->result() as $row){
	$no++;
?>

  <tr>
    <td width="147" valign="top"><p><?php echo $no;?></p></td>
    <td width="109" valign="top"><p><?php echo $row->NAMA_USE_CASE;?></p></td>
    <td width="125" valign="top"><p><?php echo $row->JUM_TRANSAKSI;?></p></td>
    <td width="84" valign="top"><p><?php echo $row->TIPE;?></p></td>
  </tr>
<?php }?>
</table>
<p>TOTAL NILAI UCW = <?php echo $nilai_ucw;?> </p>
<p><strong>Unajusted  Actor Weight</strong></p>
<table border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="147" valign="top"><br />
      No </td>
    <td width="177" valign="top"><p>Nama Aktor</p></td>
    <td width="84" valign="top"><p>Kategori</p></td>
  </tr>
  
    <?php $no=0;
foreach($log_uaw->result() as $row){
	$no++;
?>
  <tr>
    <td  valign="top"><p><?php echo $no;?></p></td>
    <td valign="top"><p><?php echo $row->NAMA_AKTOR;?></p></td>
    <td valign="top"><p><?php echo $row->TIPE_AKTOR;?></p></td>
  </tr>
<?}?>

</table>
<br>
<p>TOTAL NILAI AW =  <?php echo $nilai_uaw;?> </p>

<p><strong>Technical Complexity Factor </strong></p>
<table border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td width="147" valign="top"><br />
      No </td>
    <td width="177" valign="top"><p>Indikator</p></td>
    <td width="84" valign="top"><p>BOBOT</p></td>
  </tr>
  <?php $no=0;
  foreach($log_tcf->result() as $row){
	$no++;
?>
  <tr>
    <td  valign="top"><p><?php echo $no;?></p></td>
    <td valign="top"><p><?php echo $row->DESKRIPSI;?></p></td>
    <td  valign="top"><p><?php echo $row->BOBOT;?></p></td>
  </tr>
  <?php  } ?>
</table>
<br>
<p>TOTAL NILAI TCF = <?php echo $nilai_tcf;?> </p>

<p><strong>Technical Environment Factor </strong></p>
<table border="1" >
<thead>
  <tr>
    <td  ><br />
      No </td>
    <td  width="177" ><p>Nama Indiaktor</p></td>
    <td  ><p>BOBOT</p></td>
  </tr>
  </thead>
  <tfoot>
  <tr>
     <td>Sum</td>
     <td>$180</td>
  </tr>
 </tfoot>
 
  <tbody>
   <?php $no=0;
  foreach($log_ecf->result() as $row){
	$no++;
?>
   <tr>
    <td  ><p><?php echo $no;?></p></td>
    <td ><p><?php echo $row->DESKRIPSI;?></p></td>
    <td ><p><?php echo $row->BOBOT;?></p></td>
  </tr>
  <?php }?>
  </tbody>
</table>
<p>TOTAL NILAI ECF = <?php echo $nilai_ecf;?>  </p>

	
</body>
</html>
