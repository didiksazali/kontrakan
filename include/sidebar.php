 <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="index.php"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="orang.php"><i class="fa fa-user"></i> Data Pelanggan</a>
                    </li>
					<li>
                        <a href="kamar.php"><i class="fa fa-bar-chart-o"></i> Data Kamar</a>
                    </li>
                    <li>
                        <a href="add_transaksi.php"><i class="fa fa-file"></i> Tambah Transaksi</a>
                    </li>
                    <li class="">
                        <a href="#"><i class="fa fa-sitemap"></i> Laporan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse" style="height: 0px;">
                            <li>
                               <a href="laporan.php"><i class="fa fa-book"></i> Semua Laporan</a>
                            </li>
							
							
                      <?php
                      $sqlquery = "SELECT * FROM kamar";
                      if ($result = mysqli_query($koneksi, $sqlquery)) {
                          /* fetch associative array */
                          while ($row = mysqli_fetch_assoc($result)) {

                      ?>
                        <li><a href="laporan_kamar.php?kode_kamar=<?php echo $row['kode_kamar']; ?>"><i class="fa fa-book"></i><?php echo $row['nama_kamar']; ?></a></li>
                        <?php
                        }
                      }
                         ?>
                  
						
                         
                        </ul>
                    </li>
                    
                    

            </div>

        </nav>
        <!-- /. NAV SIDE  -->