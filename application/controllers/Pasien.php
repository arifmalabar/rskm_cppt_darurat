<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("M_Pasien");
    }
    private function getNorm()
    {
        return $this->session->userdata("norm");
    }
    public function index()
    {
        $data = [
            "data" => $this->M_Pasien->getData()
        ];
        $this->load->view("template/header/index");
        $this->load->view("pasien/index", $data);
        $this->load->view("template/footer/index");
    }
    public function tambah()
    {
        $norm = $this->input->post("norm");
        $nama_pasien = $this->input->post("nama_pasien");
        $tgl_lahir = $this->input->post("tgl_lahir");
        $jenis_kelamin = $this->input->post("jenis_kelamin");

        $data = [
            "norm" => $norm,
            "nama_pasien" => $nama_pasien,
            "tgl_lahir" => $tgl_lahir,
            "jenis_kelamin" => $jenis_kelamin
        ];
        $this->M_Pasien->insertData($data);
        redirect("pasien");
    }
    public function update($id)
    {
        $norm = $this->input->post("norm");
        $nama_pasien = $this->input->post("nama_pasien");
        $tgl_lahir = $this->input->post("tgl_lahir");
        $jenis_kelamin = $this->input->post("jenis_kelamin");

        $data = [
            "norm" => $norm,
            "nama_pasien" => $nama_pasien,
            "tgl_lahir" => $tgl_lahir,
            "jenis_kelamin" => $jenis_kelamin
        ];
        $this->M_Pasien->updateData($data, $id);
        redirect("kunjungan/showkunjungan/".$this->getNorm());
    }
}