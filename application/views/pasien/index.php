  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php $this->load->view("template/content/header.php", ["title"=>"Pasien", "subtitle" => ""]); ?>
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="card card-default">
            <div class="card-header">
                <h5 class="card-title m-0"><i class="fa fa-user"></i>&nbsp;Data Pasien</h5>
                <div class="card-tools">
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus"></i>Tambah Pasien</button>
                    <div class="modal fade" id="modal-lg">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Pasien Baru</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="pasien/tambah" id="tambahpasien" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">No RM</label>
                                                    <input type="text" class="form-control" name="norm" placeholder="Masukan No RM Pasien" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Nama Pasien</label>
                                                    <input type="text" class="form-control" name="nama_pasien" placeholder="Masukan No RM Pasien" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Tgl Lahir</label>
                                                    <input type="date" class="form-control" name="tgl_lahir" placeholder="Masukan No RM Pasien" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Jenis Kelamin</label>
                                                    <select name="jenis_kelamin" id="" class="form-control">
                                                        <option value="1">Pria</option>
                                                        <option value="2">Wanita</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <div class="row" style="width: 100%;">
                                        <div class="col-md-6">
                                            <button class="btn btn-outline-primary" style="width: 100%;">Batal</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-success" form="tambahpasien" style="width: 100%;">Tambah Pasien</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- modal edit -->
                     <div class="modal fade" id="modal-edit">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h4 class="modal-title">Edit Pasien</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="pasien/update" id="ubahpasien" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">No RM</label>
                                                    <input type="text" class="form-control norm" name="norm" placeholder="Masukan No RM Pasien" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Nama Pasien</label>
                                                    <input type="text" class="form-control nama_pasien" name="nama_pasien" placeholder="Masukan No RM Pasien" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Tgl Lahir</label>
                                                    <input type="date" class="form-control tgl_lahir" name="tgl_lahir" placeholder="Masukan No RM Pasien" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Jenis Kelamin</label>
                                                    <select name="jenis_kelamin jenis_kelamin" id="" class="form-control">
                                                        <option value="1">Pria</option>
                                                        <option value="2">Wanita</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <div class="row" style="width: 100%;">
                                        <div class="col-md-6">
                                            <button class="btn btn-outline-warning" style="width: 100%;">Batal</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-warning" form="ubahpasien" style="width: 100%;">Update Pasien</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NoRM</th>
                            <th>Nama Pasien</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbdoy>
                        
                        <?php 
                        $no = 1;
                        foreach ($data as $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value->norm ?></td>
                                <td><?= $value->nama_pasien ?></td>
                                <td><?= $value->tgl_lahir ?></td>
                                <td><?= ($value->jenis_kelamin) ? '<span class="badge badge-success">Pria</span>' : '<span class="badge badge-warning">Wanita</span>' ?></td>
                                <td>
                                    <a href="kunjungan/showkunjungan/<?= $value->norm ?>" class="btn btn-primary btn-sm">Detail Kunjungan</a>
                                    <!-- <button data-norm="<?= $value->norm ?>" 
                                    data-nama_pasien="<?= $value->nama_pasien ?>" 
                                    data-tgl_lahir="<?= $value->tgl_lahir ?>" 
                                    data-jenis_kelamin="<?= $value->jenis_kelamin ?>" 
                                    data-toggle="modal" data-target="#modal-edit" 
                                    class="btn btn-warning btn-sm btn-update">Update Pasien</button> -->
                                </td>
                            </tr>
                        <?php } ?>
                    </tbdoy>
                </table>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script>
$(document).on("click", ".btn-update", function () {
    alert("oke");
    const norm = $(this).data("norm");
    const nama = $(this).data("nama_pasien");
    const tgl_lahir = $(this).data("tgl_lahir");
    const jenis_kelamin = $(this).data("jenis_kelamin");

    $(".norm").val(norm);
    $(".nama_pasien").val(nama);
    $(".tgl_lahir").val(tgl_lahir);

});

</script>