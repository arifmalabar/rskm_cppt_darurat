<?php

use PHPJasper\PHPJasper;

class Cppt extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model("M_Cppt");
    }
    private function getKodeKunjungan()
    {
        return $this->session->userdata("kode_kunjungan");
    }
    public function showcppt($pk)
    {
        $data = [
            "data" => $this->M_Cppt->getCpptByKunjungan($pk)
        ];
        $this->session->set_userdata(["kode_kunjungan" => $pk]);
        
        $this->load->view("template/header/index");
        $this->load->view("cppt/index", $data);
        $this->load->view("template/footer/index");
    }
    public function showCpptByid($id)
    {
        $data = $this->M_Cppt->getDataById($id);
        echo json_encode($data);
    }
    public function insert()
    {
        $data = [
            "id_kunjungan" => $this->getKodeKunjungan(),
            "ppa" => $this->input->post("ppa"),
            "oleh" => $this->input->post("ppa"),
            "tanggal_rencana_pulang" => $this->input->post("tanggal_rencana_pulang"),
            "status_sbar" => $this->input->post("status_sbar"),
            "status_tbak" => $this->input->post("status_tbak"),
            "obyektif" => $this->input->post("obyektif"),
            "subyektif" => $this->input->post("subyektif"),
            "assesment" => $this->input->post("assesment"),
            "planning" => $this->input->post("planning")

        ];
        $this->M_Cppt->insertData($data);
        redirect("cppt/showcppt/".$this->getKodeKunjungan());
    }
    public function update($id)
    {
        $data = [
            "id_kunjungan" => $this->getKodeKunjungan(),
            "ppa" => $this->input->post("ppa"),
            "oleh" => $this->input->post("ppa"),
            "tanggal_rencana_pulang" => $this->input->post("tanggal_rencana_pulang"),
            "status_sbar" => $this->input->post("status_sbar"),
            "status_tbak" => $this->input->post("status_tbak"),
            "obyektif" => $this->input->post("obyektif"),
            "subyektif" => $this->input->post("subyektif"),
            "assesment" => $this->input->post("assesment"),
            "planning" => $this->input->post("planning")
        ];
        $this->M_Cppt->updateData($data, $id);
        redirect("cppt/showcppt/".$this->getKodeKunjungan());
    }
    public function hapus($id)
    {
        $this->M_Cppt->deleteData($id);
        redirect("cppt/showcppt/".$this->getKodeKunjungan());
    }
    public function exportCppt()
    {
        $filename = APPPATH.'report\report_cppt.jrxml';

        $data=[ ['user_id'=>0, 'fullname' => 'name1','email'=>'email1@a.com','gender'=>'M' ], 
                ['user_id'=>1, 'fullname' => 'name2','email'=>'email2@a.com','gender'=>'F' ], 
                ['user_id'=>2, 'fullname' => 'name3','email'=>'email3@a.com','gender'=>'M' ], ];

        $config = ['driver'=>'array','data'=>$data];

        $input = __DIR__ . '/vendor/lavela/phpjasper/examples/hello_world.jasper';    
        $output = __DIR__ . '/vendor/lavela/phpjasper/examples';  
        $options = [ 
            'format' => ['pdf', 'rtf'] 
        ];

        $jasper = new PHPJasper;

        $jasper->process(
            $input,
            $output,
            $options
        )->execute();
    }
}
