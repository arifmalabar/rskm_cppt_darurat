<?php
require_once __DIR__."/BaseModel.php";
class M_Cppt extends BaseModel
{
    public function __construct() {
        parent::__construct("cppt", "id");
    }
    public function getCpptByKunjungan($kunjungan)
    {
        return $this->db
                ->where("id_kunjungan", $kunjungan)
                ->where("status", 1)
                ->order_by("tanggal", "DESC")
                ->get("cppt")
                ->result();
    }
}
