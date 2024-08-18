<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LokasiController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LokasiModel');
        $this->load->helper('url');
    }

    public function index() {
        $data['lokasi'] = $this->LokasiModel->get_all_lokasi();
        $this->load->view('lokasi/lokasi', $data);
    }

    public function form() {
        $id = $this->input->get('id');

        if ($id) {
            $data['lokasi'] = $this->LokasiModel->get_lokasi_by_id($id);
        } else {
            $data['lokasi'] = null;
        }

        $this->load->view('lokasi/form', $data);
    }

    public function form_process() {
        $id = $this->input->post('id');
        
        $data = array(
            'nama_lokasi' => $this->input->post('nama_lokasi'),
            'kota' => $this->input->post('kota'),
            'provinsi' => $this->input->post('provinsi'),
            'negara' => $this->input->post('negara'),
        );

        if ($id) {
            $data['created_at'] = date('Y-m-d\TH:i:s');
            $this->LokasiModel->update_lokasi($id, $data);
        } else {
            $data['created_at'] = date('Y-m-d\TH:i:s');
            $this->LokasiModel->add_lokasi($data);
        }

        redirect('lokasi');
    }
    public function delete($id) {
        $this->LokasiModel->delete_lokasi($id);
        redirect('lokasi');
    }
}
