<div class="content-wrapper">
    <?php $this->load->view("template/content/header.php", ["title"=>"List CPPT", "subtitle" => ""]); ?>
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="card card-success shadow-sm">
                    <div class="card-header">
                        <h3 class="card-title">Input Data CPPT</h3>

                        <div class="card-tools">
                        
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?= base_url() ?>cppt/insert" method="post" id="form-simpan">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Profesional Pemberi Asuhan PPA</label>
                                    <input type="text" placeholder="Masukan Nama Profesional Pemberi Asuhan" name="ppa" id="" class="form-control txtPPA">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Oleh</label>
                                    <input type="text" placeholder="" name="oleh" id="" class="form-control txtOleh">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Tanggal Rencana Pulang</label>
                                    <input type="datetime-local" name="tanggal_rencana_pulang" id="" class="form-control txtTglPulang">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <br>
                                    <input type="checkbox" name="status_sbar" value="1" id="status_sbar">
                                    <label for="status_sbar">SBAR</label>
                                    <input type="checkbox" name="status_tbak" value="1" id="status_tbak">
                                    <label for="status_tbak">TBAK</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Objektif</label>
                                    <textarea name="obyektif" placeholder="Masukan obyektif" class="form-control txtObjektif" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Subyektif</label>
                                    <textarea name="subyektif" placeholder="Masukan subyektif" class="form-control txtSubyektif" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Assesment</label>
                                    <textarea name="assesment" placeholder="Masukan assesment" class="form-control txtAssesment" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Planning</label>
                                    <textarea name="planning" placeholder="Masukan assesment" class="form-control txtPlanning" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                     <div class="card-footer" style="width: 100%;">
                        <button type="submit" form="form-simpan" class="btn btn-success btn-sm"><i class="fa fa-save"></i>Simpan</button>
                     </div>
                </div>
            </div>
            <div class="col-md-7">
                <?php foreach ($data as $value) { ?>
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">CPPT Tgl : <span class="badge badge-success"><?= $value->tanggal ?></span></h3>

                            <div class="card-tools">
                                <a href="<?= base_url() ?>cppt/hapus/<?= $value->id; ?>" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-trash"></i></a>
                                <button 
                                    class="btn btn-sm btn-warning btn-edit"
                                    data-id="<?= $value->id; ?>"
                                ><i class="fa fa-edit"></i></button>
                            </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Oleh : </label>
                                    <h5><?= $value->oleh; ?></h5>
                                </div>
                                <div class="col-md-12">
                                    <label for="">PPA : </label>
                                    <h5><?= $value->ppa; ?></h5>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Rencana Pulang : </label>
                                    <h5><?= $value->tanggal_rencana_pulang; ?></h5>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Subyektif : </label>
                                    <h5><?= $value->subyektif; ?></h5>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Obyektif : </label>
                                    <h5><?= $value->obyektif; ?></h5>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Planning : </label>
                                    <h5><?= $value->planning; ?></h5>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                <?php }?>
            </div>
        </div>
      </div>
    </div>
</div>
<script>
    $(".btn-edit").click(function (e) { 
        const id = $(this).data("id");
        $("#form-simpan").attr("action", `/cppt_emer/cppt/update/${id}`);
        showDetail(id);
    });
    $(".btn-hapus").click(function (e) { 
        e.preventDefault();
        const link = $(this).attr("href");
        const cfr = confirm("Apakah Anda ingin menghapus data?");
        (cfr) ? window.location = link : "";
    });
    async function showDetail(id)
    {
        try {
            const response = await fetch(`/cppt_emer/cppt/showcpptbyid/${id}`);
            const data = await response.json();
            const item = data[0];
            $(".txtPPA").val(item['ppa']);
            $(".txtOleh").val(item["oleh"]);
            $(".txtTglPulang").val(item['tanggal_rencana_pulang']);
            if(item["status_sbar"]==1){
                $("#status_sbar").prop("checked", true);
            } else {
                $("#status_sbar").prop("checked", false);
            }
            if(item["status_tbak"]==1){
                $("#status_tbak").prop("checked", true);
            } else {
                $("#status_tbak").prop("checked", false);
            }
            $(".txtObjektif").val(item["obyektif"]);
            $(".txtSubyektif").val(item["subyektif"]);
            $(".txtAssesment").val(item["assesment"]);
            $(".txtPlanning").val(item["planning"]);
        } catch (error) {
            console.log(error);
        }
    }
</script>