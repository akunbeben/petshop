
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="STYLESHEET" href="<?= base_url('backend/assets/'); ?>nota.css" type="text/css" />
</head>

<body>

<div id="body" style="width: 57mm;">
  <div id="print-area">

    <div id="section_header">
    </div>
    
    <div id="content">
      
    <div class="page" style="font-size: 7pt">
    <table style="width: 100%;" class="header">
    <tr>
    <td><p style="text-align: center; font-style: normal; font-family: Monaco; font-size: 20pt;">NOTA PENJUALAN</p></td>
    </tr>
    </table>
    
    <table style="width: 100%; font-size: 12pt;">
    <tr>
    <td>No. Struk: <?= $header->faktur; ?></td>
    <td style="text-align: right;">Kasir: <?= $header->kasir; ?></td>
    </tr>
    
    <tr>
    <td>Tgl. Transaksi: <?= date('d M Y' , strtotime($header->waktu_transaksi)); ?></td>
    </tr>
    
    <tr>
    <td>PETSHOP BANJARBARU</td>
    <td style="text-align: right;">Alamat: JALAN SUKAMARA NO 11</td>
    </tr>
    </table>
    <br>
    <br>
    <table class="change_order_items" style="font-size: 15pt; border: 1px dotted; width: 100%;">
    
    
    <tbody>
    <tr>
    <th style="border-bottom: 1px dotted;">No</th>
    <th style="border-bottom: 1px dotted;">Produk</th style="border-bottom: 1px dotted;">
    <th style="border-bottom: 1px dotted;">Jumlah</th style="border-bottom: 1px dotted;">
    <th style="border-bottom: 1px dotted;">Harga</th style="border-bottom: 1px dotted;">
    <!-- <th style="border-bottom: 1px dotted;">Total</th style="border-bottom: 1px dotted;"> -->
    </tr>
    
    <?php $no = 1;
    foreach ($body as $key) : ?>
    <tr class="even_row">
    <td style="text-align: center; "><?= $no++; ?></td>
    <td style=""><?= $key->nama_produk; ?></td>
    <td style="text-align: center; "><?= $key->jumlah_terjual; ?></td>
    <td style="text-align: right; "><?= rupiah($key->harga_jual); ?></td>
    <!-- <td style="text-align: right; "><?= rupiah($key->harga_jual * $key->jumlah_terjual); ?></td> -->
    </tr>
    <?php endforeach; ?>
    
    </tbody>
    
    </table>
    
    <p style="text-align: right; font-size: 20px;">Total: <?= rupiah($header->total); ?></p>
    <p style="text-align: right; font-size: 20px; margin-top: -15px; border-bottom: 1px dotted;">Bayar: <?= rupiah($header->bayar); ?></p>
    <p style="text-align: right; font-size: 20px;">Kembali: <?= rupiah($header->kembalian); ?></p>
    <br>
    <br>
    
      <p style="text-align: center; font-size: 15px;">Terimakasih telah berbelanja di tempat kami.</p>
    
    </div>
    
    </div>
    </div>
    
    <div style="text-align: right;">
      <button onclick="window.print()">Print</button>
      <button onclick="window.location.href='<?= base_url('penjualan/'); ?>'">Kembali</button>
    </div>

</div>

</body>
</html>