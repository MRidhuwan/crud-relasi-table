<?php

include "koneksi.php";

$kode = substr(str_shuffle("1234567890"), 0, 10);

?>

<div class="row">
  <div class="col-md-12">
    <div class="page-header">
      <h4>
        <i class="glyphicon glyphicon-edit"></i>
        Input data
      </h4>
    </div> <!-- /.page-header -->

    <div class="panel panel-default">
      <div class="panel-body">
        <form class="form-horizontal" method="POST" action="simpan_data.php">

          <div class="form-group">
            <label class="col-sm-2 control-label">Nama Perusahaan</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="nama" value="" autocomplete="off" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Alamat</label>
            <div class="col-sm-4">
              <input type="textarea" class="form-control" name="alamat" value="" autocomplete="off" required>
            </div>
          </div>


          <div class="form-group">
            <label class="col-sm-2 control-label">Nama BANK</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="nama_bank" autocomplete="off" maxlength="10" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Nomor Rekening</label>
            <div class="col-sm-2">
              <input type="number" class="form-control" name="nomor_bank" autocomplete="off" required value="<?php echo $kode ?>" readonly>
            </div>
          </div>

          <hr />
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Simpan">
              <a href="index.php" class="btn btn-default btn-reset">Batal</a>
            </div>
          </div>
        </form>
      </div> <!-- /.panel-body -->
    </div> <!-- /.panel -->
  </div> <!-- /.col -->
</div> <!-- /.row -->