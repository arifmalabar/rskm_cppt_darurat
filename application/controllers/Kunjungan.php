<?php
class Kunjungan extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("M_Kunjungan");
        $this->load->model("M_Ruangan");
    }
    public function showkunjungan($norm)
    {
        $this->session->set_userdata(["norm" => $norm]);
        $data = [
            "pasien" => $this->M_Kunjungan->getPasien($norm),
            "data" => $this->M_Kunjungan->getKunjunganByRM($norm),
            "ruangan" => $this->M_Ruangan->getData()
        ];
        $this->showView($data);
    }
    private function getNorm()
    {
        return $this->session->userdata("norm");
    }
    private function showView($data)
    {
        $this->load->view("template/header/index");
        $this->load->view("kunjungan/index", $data);
        $this->load->view("template/footer/index");
    }
    public function insert()
    {
        $data = [
            "id_ruangan" => $this->input->post("id_ruangan"),
            "norm" => $this->getNorm(),
            "tgl_kunjungan"=> $this->input->post("tgl_kunjungan")
        ];
        $this->M_Kunjungan->insertData($data);
        redirect("kunjungan/showkunjungan/".$this->getNorm());
    }
}
