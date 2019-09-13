<?php
 header("Content-Type: application/vnd.ms-word");
        header("Expires: 0");
        header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
        header("Content-disposition: attachment; filename=export.doc");
?>


<html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=Generator content="Microsoft Word 15 (filtered)">
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Helvetica;
	panose-1:2 11 6 4 2 2 2 2 2 4;}
@font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:8.0pt;
	margin-left:0cm;
	line-height:107%;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
.MsoPapDefault
	{margin-bottom:8.0pt;
	line-height:107%;}
@page WordSection1
	{size:595.3pt 841.9pt;
	margin:72.0pt 72.0pt 72.0pt 72.0pt;}
div.WordSection1
	{page:WordSection1;}
-->
</style>

</head>

<body lang=IN>

<div class=WordSection1>

<p class=MsoNormal align=center style='text-align:center'><b><span lang=EN-US
style='font-size:23.0pt;line-height:107%'>LAMPIRAN</span></b></p>

<p class=MsoNormal align=center style='text-align:center'><b><span lang=EN-US
style='font-size:23.0pt;line-height:107%'>&nbsp;</span></b></p>

<p class=MsoNormal><b><span style='font-size:10.5pt;line-height:107%;
font-family:"Helvetica","sans-serif";color:#555555;background:white'>Unajusted
Use Case Weight</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=147 valign=top style='width:110.45pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=EN-US>No</span></p>
  </td>
  <td width=153 valign=top style='width:114.75pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=EN-US>Nama Use Case</span></p>
  </td>
  <td width=159 valign=top style='width:119.05pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=EN-US>Jumlah transaksi</span></p>
  </td>
  <td width=142 valign=top style='width:106.55pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=EN-US>Kategori</span></p>
  </td>
 </tr>
 <?php 
  $no=0;
 foreach($log_ucw->result() as $row){
	 $no++;
	 ?>
 <tr>
  <td width=147 valign=top style='width:110.45pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=EN-US><?php echo $no; ?></span></p>
  </td>
  <td width=153 valign=top style='width:114.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=EN-US><?php echo $row->NAMA_USE_CASE; ?></span></p>
  </td>
  <td width=159 valign=top style='width:119.05pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=EN-US><?php echo $row->JUM_TRANSAKSI; ?></span></p>
  </td>
  <td width=142 valign=top style='width:106.55pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=EN-US><?php echo $row->TIPE; ?></span></p>
  </td>
 </tr>
 <?php }?>
</table>

<p class=MsoNormal><span lang=EN-US>&nbsp;</span></p>

<p class=MsoNormal><b><span style='font-size:10.5pt;line-height:107%;
font-family:"Helvetica","sans-serif";color:#555555;background:white'>Unajusted
Actor Weight</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr style='height:20.05pt'>
  <td width=177 valign=top style='width:133.1pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=EN-US>No</span></p>
  </td>
  <td width=184 valign=top style='width:138.3pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=EN-US>Nama Aktor</span></p>
  </td>
  <td width=171 valign=top style='width:128.4pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=EN-US>Kategori</span></p>
  </td>
 </tr>
 <?php 
  $no=0;
 foreach($log_uaw->result() as $row){
	 $no++;
	 ?>
 <tr style='height:18.9pt'>
  <td width=177 valign=top style='width:133.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:18.9pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=EN-US><?php echo $no; ?></span></p>
  </td>
  <td width=184 valign=top style='width:138.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:18.9pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=EN-US><?php echo $row->NAMA_AKTOR; ?></span></p>
  </td>
  <td width=171 valign=top style='width:128.4pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:18.9pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=EN-US><?php echo $row->TIPE_AKTOR; ?></span></p>
  </td>
 </tr>
 <?php }?>
</table>

<p class=MsoNormal><span lang=EN-US>&nbsp;</span></p>

<p class=MsoNormal><b><span style='font-size:10.5pt;line-height:107%;
font-family:"Helvetica","sans-serif";color:#555555;background:white'>Distribusi
usaha dan biaya</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr style='height:20.05pt'>
  <td width=177 valign=top style='width:133.1pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=EN-US>No</span></p>
  </td>
  <td width=184 valign=top style='width:138.3pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=EN-US>Effort</span></p>
  </td>
  <td width=171 valign=top style='width:128.4pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:20.05pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=EN-US>Biaya/Jam</span></p>
  </td>
 </tr>
 <?php 
 $no=0;
 foreach($distribusi_usaha->result() as $row){
	 $no++;
	 
	  $hoe						=($row->PRESENTASE/100)*$nilai_hour_effort;
	  $biaya_per_jam			=($row->PRESENTASE/100)*$nilai_hour_effort*($row->GAJI/176);
	  $standard_gaji_per_jam	=$row->GAJI/176;
	  
	 ?>
 <tr style='height:18.9pt'>
  <td width=177 valign=top style='width:133.1pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt;height:18.9pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=EN-US><?php echo $no; ?></span></p>
  </td>
  <td width=184 valign=top style='width:138.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:18.9pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=EN-US><?php echo number_format($hoe,2,',','.');?></span></p>
  </td>
  <td width=171 valign=top style='width:128.4pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:18.9pt'>
  <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
  normal'><span lang=EN-US><?php echo 'Rp. ' . number_format($biaya_per_jam,2,',','.');?></span></p>
  </td>
 </tr>
  <?php }?>
</table>

<p class=MsoNormal><span lang=EN-US>&nbsp;</span></p>

<p class=MsoNormal><span lang=EN-US>&nbsp;</span></p>

</div>

</body>

</html>
