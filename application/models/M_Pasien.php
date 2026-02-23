<?php
require_once __DIR__."/BaseModel.php";
class M_Pasien extends BaseModel
{
    public function __construct() {
        parent::__construct("pasien", "norm");
    }
    public function getDataByNoRm($norm)
    {
        return $this->db->where("norm", $norm)->get("pasien")->row();
    } 
}
