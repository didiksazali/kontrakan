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
                            Formulir Data Pelanggan
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
											$id_orang = $_GET["id_orang"];
											$sqlquery = "SELECT * FROM orang WHERE id_orang = '$id_orang'";
											if ($result = mysqli_query($koneksi, $sqlquery)) {
												while ($row = mysqli_fetch_assoc($result)) {
										?>
                                    <form role="form" method="POST" action="aksi_orang.php?act=update">
                                        <div class="form-group">
											<input type="hidden" name="id_orang" id="id_orang" value="<?php echo $row["id_orang"]; ?>">
                                            <label>Nama Orang</label>
                                            <input class="form-control" placeholder="Masukkan Nama Pelanggan" name="nama_orang" value="<?php echo $row["nama_orang"] ?>" required>
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
                                            <label>Jenis Kelamin</label>
                                            <div class="radio1">
                                                <label>
                                                    <input type="radio" name="jenis_kelamin" id="optionsRadios1" value="Laki-laki" <?php if ($row["jenis_kelamin"]=="Laki-laki") { echo "checked"; } ?> > Laki-laki
                                                </label>
                                            </div>
                                            <div class="radio2">
                                                <label>
                                                    <input type="radio" name="jenis_kelamin" id="optionsRadios2" value="Perempuan" <?php if ($row["jenis_kelamin"]=="Perempuan") { echo "checked"; } ?> > Perempuan
                                                </label>
                                            </div>
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
