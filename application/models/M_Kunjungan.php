<?php
require_once __DIR__."/BaseModel.php";
require_once __DIR__."/M_Pasien.php";
class M_Kunjungan extends BaseModel
{
    private M_Pasien $pasien;
    public function __construct() {
        parent::__construct("kunjungan", "id_kunjungan");
        $this->pasien = new M_Pasien();
    }
    public function getPasien($norm)
    {
        return $this->pasien->getDataByNoRm($norm);
    }
    /*public function getDataPendaftaranByRM($norm)
    {
        return $this->db->query('SELECT 
                (SELECT kun.NOMOR
                FROM pendaftaran.kunjungan kun 
                WHERE kun.NOPEN = pen.NOMOR
                LIMIT 1
                ) AS nomor_kunjungan,
                NOMOR,
                TANGGAL,
                (SELECT 
                    (
                    SELECT ruang.DESKRIPSI FROM master.ruangan ruang 
                    WHERE kun.RUANGAN = ruang.ID
                    )
                FROM pendaftaran.kunjungan kun 
                WHERE kun.NOPEN = pen.NOMOR
                LIMIT 1
                ) AS ruangan
            FROM pendaftaran.pendaftaran pen
            WHERE pen.NORM = '.$norm.'
            ORDER BY TANGGAL DESC
            ')
        ->result();
    }*/
    public function getKunjunganByRM($norm)
    {
        return $this->db->join("ruangan", "ruangan.id_ruangan = kunjungan.id_ruangan")->where("norm", $norm)->get("kunjungan")->result();
    }
}
