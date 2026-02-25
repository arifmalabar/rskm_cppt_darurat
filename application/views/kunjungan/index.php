<div class="content-wrapper">
    <?php $this->load->view("template/content/header.php", ["title"=>"Data Kunjungan", "subtitle" => ""]); ?>
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
           <div class="col-md-12">
            <div class="card card-success shadow-sm">
              <div class="card-header">
                <h3 class="card-title">Data Pasien</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <form action="<?= base_url() ?>pasien/update/<?= $this->session->userdata("norm"); ?>" id="form-update" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">NORM</label>
                                <input type="text" name="norm" value="<?= $pasien->norm ?>" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Pasien</label>
                                <input type="text" name="nama_pasien" value="<?= $pasien->nama_pasien ?>" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tgl Lahir</label>
                                <input type="date" name="tgl_lahir" value="<?= $pasien->tgl_lahir ?>" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="" class="form-control">
                                    <option value="1" <?= ($pasien->jenis_kelamin) == 1 ? "selected" : "" ?>>Pria</option>
                                    <option value="2" <?= ($pasien->jenis_kelamin) == 2 ? "selected" : "" ?>>Wanita</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
              </div>
              <div class="card-footer">
                <button class="btn btn-warning" form="form-update" type="submit" style="width: 100%;">Edit</button>
              </div>
              <!-- /.card-body -->
            </div>
           </div>
           <div class="col-md-12">
            <div class="card card-default shadow-sm">
              <div class="card-header">
                <h3 class="card-title">Data Kunjungan</h3>
                <div class="card-tools">
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus"></i>Tambah Kunjungan</button>
                    <div class="modal fade" id="modal-lg">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Kunjungan Baru</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url() ?>kunjungan/insert" id="tambahpasien" method="post">
                                        <div class="row">
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Tgl Kunjungan</label>
                                                    <input type="date" class="form-control" name="tgl_kunjungan" placeholder="Masukan No RM Pasien" id="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Ruangan</label>
                                                    <select name="id_ruangan" id="" class="form-control">
                                                        <?php foreach ($ruangan as $value) { ?>
                                                            <option value="<?= $value->id_ruangan; ?>"><?= $value->nama_ruangan; ?></option>
                                                        <?php } ?>
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
                                            <button class="btn btn-success" form="tambahpasien" style="width: 100%;">Tambah Kunjungan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Ruangan</th>
                            <th>Tgl Kunjungan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbdoy>
                        
                        <?php 
                        $no = 1;
                        foreach ($data as $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><h4><?= $value->nama_ruangan; ?></h4></td>
                                <td><?= $value->tgl_kunjungan; ?></td>
                                <td>
                                    <a href="<?= base_url() ?>cppt/showcppt/<?= $value->id_kunjungan ?>" class="btn btn-primary btn-sm">CPPT</a>
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
              <!-- /.card-body -->
            </div>
           </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>