<?php
	include 'include/fungsi.php';
	include 'config.php';
	include 'include/header.php';
	include 'include/sidebar.php';
	include 'include/fungsi_indotgl.php';

$kode_kamar = $_GET['kode_kamar'];
$sqlquery = "SELECT * FROM kamar WHERE kode_kamar='$kode_kamar'";
$result = mysqli_query($koneksi, $sqlquery) or die (mysqli_connect_error());
$row = mysqli_fetch_assoc($result);

 ?>

<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Laporan Transaksi per Kamar
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 align="center">Kontrakan SAR</h2>
							<h3 align="center">Laporan Pendapatan <?php echo $row["nama_kamar"]; ?></h3>
							</br>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
									Kode Kamar : <?php echo $row["kode_kamar"]; ?>
									</br>
									Nama Kamar : <?php echo $row["nama_kamar"]; ?>
									</br>
                                        <tr>
                                            <th>No.</th>
											<th>Id Orang</th>
                                            <th>Nama Orang</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Lama Inap</th>
											<th>Fasilitas Tambahan</th>
                                            <th>Biaya Kamar</th>
                                            <th>Biaya Fasilitas Tambahan</th>
                                            <th>Total Tagihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
										$no = 1;
										$total_semua = 0;
										$sqlquery = "SELECT transaksi.*, orang.*, kamar.* FROM transaksi transaksi INNER JOIN orang orang ON transaksi.id_orang = orang.id_orang INNER JOIN kamar kamar ON transaksi.kode_kamar = kamar.kode_kamar WHERE kamar.kode_kamar='$kode_kamar' ORDER BY transaksi.id_orang ASC";
										if ($result = mysqli_query($koneksi, $sqlquery)) {
											while ($row = mysqli_fetch_assoc($result)) {
											if($row["lama_inap"]<=10){
												$biaya_kamar = $row["lama_inap"] * $row["tarif_normal"];
											} else {
												$biaya_kamar = $row["lama_inap"] * $row["tarif_khusus"];
												}
											
											$fasilitas_tambahan = $row["fasilitas_tambahan"];
											$biaya_fasilitas_tambahan = 0;
											if(contains($fasilitas_tambahan,"Lemari")){
												$biaya_fasilitas_tambahan += 10000 * $row["lama_inap"];
											}
											if(contains($fasilitas_tambahan,"Kursi")){
												$biaya_fasilitas_tambahan += 8000 * $row["lama_inap"];
											}
											if(contains($fasilitas_tambahan,"Kipas Angin")){
												$biaya_fasilitas_tambahan += 10000 * $row["lama_inap"];
											}
											
											$total_tagihan = $biaya_kamar + $biaya_fasilitas_tambahan;
											
											$total_semua += $total_tagihan; 
									?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?php echo id_orang($row["id_orang"]);?></td>
                                            <td><?php echo $row["nama_orang"];?></td>
											<td><?php echo $row["jenis_kelamin"];?></td>
											<td><?php echo $row["lama_inap"]." Hari";?></td>
                                            <td><?php echo $row["fasilitas_tambahan"];?></td>
											<td><?php echo rupiah($biaya_kamar);?></td>
											<td><?php echo rupiah($biaya_fasilitas_tambahan);?></td>
											<td><?php echo rupiah($total_tagihan);?></td>
											</tr>
											<?php
												$no++;}
											?>
											<tr>
											<td colspan='8'>Grand Total</td>
											<td colspan='2'><?php echo rupiah($total_semua); ?></td>
											</tr>
											<?php
													mysqli_free_result($result);
												}
												mysqli_close($koneksi);
												?>
										  </tbody>
										</table>
								<p>
							<div class='pull-right'>
							Pekanbaru, <?php echo tgl_indo($hari_ini); ?><br>
							<b><center>Manager Perusahaan</center></b>
							<p>&nbsp;</p>
							<b><center>Didik Sazali</center></b>
							</div>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
                
            </div>
       
        
<?php
	include 'include/footer.php';
?>
		
		
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
