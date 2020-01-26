
<!DOCTYPE html>
<html><head>
<link rel="STYLESHEET" href="<?= base_url('backend/assets'); ?>/print_static.css" type="text/css" />
<title><?= $title; ?></title>
</head><body onload="<?= $this->input->post('tipe') == 'print' ? 'window.print();' : ''; ?>">

<div id="body">

<div id="section_header">
</div>

<div id="content">
  
<div class="page" style="font-size: 7pt">
<table style="width: 100%;" class="header">
<tr>
<td><h1 style="text-align: left"><?= $title; ?></h1></td>
</tr>
</table>

<table style="width: 100%; font-size: 8pt;">
<tr>
<td>No. Doc: <strong><?= $header->no_doc; ?></strong></td>
<td>Dibuat oleh: <strong><?= $header->created_by; ?></strong></td>
</tr>

<tr>
<td>Dibuat pada: <strong><?= date('d M Y', strtotime($header->created_at)); ?></strong></td>
<td>Dicetak pada: <strong><?= date('d M Y H:i:s', time()); ?></strong></td>
</tr>

<tr>
<td><strong>PETSHOP BANJARBARU</strong></td>
<td>Alamat: <strong>JALAN SUKAMARA NO 11</strong></td>
</tr>
</table>

<table class="change_order_items">

<!-- <tr><td colspan="6"><h2>INVENTORI SISTEM</h2></td></tr> -->

<tbody>
<tr>
<th style="text-align: center">No</th>
<th style="text-align: center">Produk</th>
<th style="text-align: center">Jumlah</th>
<th style="text-align: center">Diinput pada</th>
<th style="text-align: center">Diinput oleh</th>
</tr>

<?php $no = 1;
foreach ($body as $bdy) : ?>
<tr>
<td style="text-align: center"><?= $no++; ?></td>
<td><?= $bdy->produk; ?></td>
<td style="text-align: center"><?= $bdy->jumlah; ?></td>
<td style="text-align: center"><?= date('d M Y H:i:s', strtotime($bdy->time_stamp)); ?></td>
<td style="text-align: center"><?= $bdy->created_by; ?></td>
</tr>
<?php endforeach; ?>
</tbody>





</table>

<table class="sa_signature_box" style="border-top: 1px solid black; padding-top: 2em; margin-top: 2em;">

  <tr>    
    <td>ADMIN</td><td class="written_field" style="padding-left: 2.5in">&nbsp;</td>
    <td style="padding-left: 1em">PENERIMA</td><td class="written_field" style="padding-left: 2.5in; text-align: right;"></td>
  </tr>
  <tr>
    <td colspan="3" style="padding-top: 0em">&nbsp;</td>
    <td style="text-align: center; padding-top: 0em;"></td>
  </tr>

<tr><td colspan="4" style="white-space: normal">

</td>
</tr>

<tr>
<td colspan="2">
<span class="written_field" style="padding-left: 4em">&nbsp;</span>
<span class="written_field" style="padding-left: 8em;">&nbsp;</span> 
<span class="written_field" style="padding-left: 4em">&nbsp;</span>
</td>

<td colspan="2" style="padding-left: 1em;"><br/><br/>

<span class="written_field" style="padding-left: 2.5in">&nbsp;</span>
</td>
</tr>
</table>

</div>

</div>
</div>

</body></html>