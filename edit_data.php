<div class="row">
  <div class="col-md-12">
    <div class="page-header">
      <h4>
        <i class="glyphicon glyphicon-edit"></i>
        Edit Data List
      </h4>
    </div> <!-- /.page-header -->

    <?php

    $id   =  $_GET['id'];
    $query = mysqli_query($connection, "SELECT * 
      FROM perusahaan INNER JOIN rekening ON perusahaan.id_perusahaan=rekening.id_perusahaan
      WHERE perusahaan.id_perusahaan='$id'")
      or die('Query Error : ' . mysqli_error($connection));

    $data  = mysqli_fetch_array($query);

    ?>
    <div class="panel panel-default">
      <div class="panel-body">
        <form class="form-horizontal" method="POST" action="update_data.php">


          <div class="form-group">
            <label class="col-sm-2 control-label">Nomor </label>
            <div class="col-sm-2">

              <input type="hidden" class="form-control" name="id" value="<?php echo $data['id_perusahaan']; ?>" readonly>

            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Nama Perusahaan </label>
            <div class="col-sm-2">

              <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">

            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Alamat</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="alamat" autocomplete="off" value="<?php echo $data['alamat']; ?>" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Nama Bank </label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="nama_bank" autocomplete="off" value="<?php echo $data['nama_bank']; ?>" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Nomor Rekening</label>
            <div class="col-sm-2">
              <input type="number" class="form-control" name="nomor_bank" autocomplete="off" required value="<?php echo $data['nomor_bank'] ?>" readonly>
            </div>
          </div>


          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" class="btn btn-info btn-submit" name="simpan" value="Simpan">
              <a href="index.php" class="btn btn-default btn-reset">Batal</a>
            </div>
          </div>
        </form>
      </div> <!-- /.panel-body -->
    </div> <!-- /.panel -->
  </div> <!-- /.col -->
</div> <!-- /.row -->