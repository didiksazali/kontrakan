<?php
	include 'config.php';
	include 'include/header.php';
	include 'include/sidebar.php';
?>

<!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Formulir Edit Data Kamar
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
										<?php
											$kode_kamar = $_GET["kode_kamar"];
											$sqlquery = "SELECT * FROM kamar WHERE kode_kamar = '$kode_kamar'";
											if ($result = mysqli_query($koneksi, $sqlquery)) {
												while ($row = mysqli_fetch_assoc($result)) {
										?>
                                    <form role="form" method="POST" action="aksi_kamar.php?act=update">
									    <div class="form-group">
                                            <label>Kode Kamar</label>
											<input type="hidden" name="kode_kamar" value="<?php echo $row["kode_kamar"]; ?>">
                                          <input class="form-control" placeholder="Masukkan Kode Kamar" name="kode_kamar" value="<?php echo $row["kode_kamar"] ?>" disabled>
                                        </div>
										
                                        <div class="form-group">
                                            <label>Nama Kamar</label>
                                            <input class="form-control" placeholder="Masukkan Nama Kamar" name="nama_kamar" value="<?php echo $row["nama_kamar"] ?>" required>
                                        </div>
										<!--
                                        <div class="form-group">
                                            <label>Checkboxes</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Checkbox 1
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Checkbox 2
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Checkbox 3
                                                </label>
                                            </div>
                                        </div>
										-->
										<!--
                                        <div class="form-group">
                                            <label>Inline Checkboxes</label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox">1
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox">2
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox">3
                                            </label>
                                        </div>
										-->
                                        <div class="form-group">
                                            <label>Tarif Normal</label>
                                            <input class="form-control" placeholder="Masukkan Tarif Normal" name="tarif_normal" value="<?php echo $row["tarif_normal"] ?>" required>
                                        </div>
										
										<div class="form-group">
                                            <label>Tarif Khusus</label>
                                            <input class="form-control" placeholder="Masukkan Tarif Khusus" name="tarif_khusus" value="<?php echo $row["tarif_khusus"] ?>" required>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-success">Ubah</button>
                                        <button type="reset" class="btn btn-warning">Batal</button>
                                    </form>
									<?php
										}
										mysqli_free_result($result);
									}
									mysqli_close($koneksi);
									?>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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
