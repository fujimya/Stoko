<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	  <div style="text-align: center;">
        <h1>LAPORAN DATA STOK BARANG</h1>
        <hr style="background-color: #000; height: 4px; width: 70% ">
      </div>
      <div style="text-align: center;">
      	<table align="center" border="1" width="80%" id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Barang</th>
                  <th>Harga Beli (Rp)</th>
                  <th>Harga Jual (Rp)</th>
                  <th>Stok</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($barang as $brg) {?>
                <tr>
                  <td><?php echo $brg->kode; ?></td>
                  <td><?php echo $brg->nama_barang; ?></td>
                  <td class="rupiah"><?php echo number_format($brg->harga_beli,0,',','.'); ?></td>
                  <td><?php echo number_format($brg->harga_jual,0,',','.') ; ?></td>
                  <td><?php echo $brg->stok; ?></td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
      </div>
      <script type="text/javascript">
<!--
window.print();
//-->
</script>
</body>
</html>