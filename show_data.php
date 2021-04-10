<div class="row">
  <div class="col-md-12">
    <div class="page-header">
      <div style="margin: 0 auto; text-align: center">

      </div>
      <h4>
        <i class="glyphicon glyphicon-user"></i> Data List

        <div class="pull-right btn-tambah">
          <form class="form-inline" method="POST" action="index.php">

            <a class="btn btn-success" href="?page=tambah">

              <i class="glyphicon glyphicon-plus"></i> Tambah
            </a>
          </form>
        </div>

      </h4>
    </div>
    <?php
    if (empty($_GET['alert'])) {
      echo "";
    } elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-alert'></i> Gagal!</strong> Terjadi kesalahan.
          </div>";
    } elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data list berhasil disimpan.
          </div>";
    } elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data list berhasil diubah.
          </div>";
    } elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data list berhasil dihapus.
          </div>";
    }
    ?>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Data list</h3>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>No.</th>
                <th>NAMA PERUSAHAAN</th>
                <th>ALAMAT</th>
                <th>Nama BANK</th>
                <th>NOMOR REKENING</th>

                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php
              /* Pagination */
              $batas = 10;

              $jumlah_record = mysqli_query($connection, "SELECT *
               FROM perusahaan INNER JOIN rekening ON rekening.id_perusahaan=perusahaan.id_perusahaan")
                or die('Ada kesalahan pada query jumlah_record: ' . mysqli_error($connection));

              // $jumlah_record = mysqli_query($connection, "SELECT nama, alamat, nama_bank, nomor_bank FROM perusahaan
              //   INNER JOIN rekening ON rekening.id_perusahaan=perusahaan.id_perusahaan")
              //   or die('Ada kesalahan pada query jumlah_record: ' . mysqli_error($connection));


              $jumlah  = mysqli_num_rows($jumlah_record);
              $halaman = ceil($jumlah / $batas);
              $page    = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
              $mulai   = ($page - 1) * $batas;

              /*-------------------------------------------------------------------*/
              $no = 1;

              // $query = mysqli_query($connection, "SELECT nama, alamat, nama_bank, nomor_bank FROM perusahaan
              //   INNER JOIN rekening ON rekening.id_perusahaan=perusahaan.id_perusahaan")
              //   or die('Ada kesalahan pada query table: ' . mysqli_error($connection));

              $query = mysqli_query($connection, "SELECT * FROM perusahaan
                INNER JOIN rekening ON rekening.id_perusahaan=perusahaan.id_perusahaan")
                or die('Ada kesalahan pada query table: ' . mysqli_error($connection));

              if (mysqli_num_rows($query) == 0) {
                echo '<tr>
                <td colspan = "6">
                  <center>
                    <div class="alert alert-danger" role="alert">
                      Data Tidak Di Temukan !!!
                    </div>
                </center>
                
                </td>
                
                </tr>';
              } else {

                while ($data = mysqli_fetch_array($query)) {



                  echo "  <tr>
                      <td width='50' class='center'>$no</td>
                      <td width='60'>$data[nama]</td>
                      <td width='60'>$data[alamat]</td>

                      <td width='150'>$data[nama_bank]</td>
                      <td width='180'>$data[nomor_bank]</td>
                      
                      

                      <td width='100'>
                        <div class=''>
                          <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' 
                          class='btn btn-info btn-sm' href='?page=edit&id=$data[id_perusahaan]'>
                            <i class='glyphicon glyphicon-edit'></i>
                          </a>";
              ?>
                  <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="delete_data.php?id=<?php echo $data['id_perusahaan']; ?>" onclick="return confirm('Anda yakin ingin menghapus data <?php echo $data['nama']; ?>?');">
                    <i class="glyphicon glyphicon-trash"></i>
                  </a>
              <?php
                  echo "
                        </div>
                      </td>
                    </tr>";
                  $no++;
                }
              }
              ?>
            </tbody>
          </table>
          <?php
          if (empty($_GET['hal'])) {
            $halaman_aktif = '1';
          } else {
            $halaman_aktif = $_GET['hal'];
          }
          ?>

          <a>
            Halaman <?php echo $halaman_aktif; ?> dari <?php echo $halaman; ?> |
            Total <?php echo $jumlah; ?> data
          </a>

          <nav>
            <ul class="pagination pull-right">
              <!-- Button untuk halaman sebelumnya -->
              <?php
              if ($halaman_aktif <= '1') { ?>
                <li class="disabled">
                  <a href="" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              <?php
              } else { ?>
                <li>
                  <a href="?hal=<?php echo $page - 1 ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              <?php
              }
              ?>

              <!-- Link halaman 1 2 3 ... -->
              <?php
              for ($x = 1; $x <= $halaman; $x++) { ?>
                <li class="">
                  <a href="?hal=<?php echo $x ?>"><?php echo $x ?></a>
                </li>
              <?php
              }
              ?>

              <!-- Button untuk halaman selanjutnya -->
              <?php
              if ($halaman_aktif >= $halaman) { ?>
                <li class="disabled">
                  <a href="" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              <?php
              } else { ?>
                <li>
                  <a href="?hal=<?php echo $page + 1 ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              <?php
              }
              ?>
            </ul>
          </nav>
        </div>
      </div>
    </div> <!-- /.panel -->
  </div> <!-- /.col -->
</div> <!-- /.row -->