<?php

class ProyekController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ProyekModel');
        $this->load->helper('url');
    }

    public function index() {
        $data['proyek'] = $this->ProyekModel->get_all_proyek();
        
        $this->load->view('proyek/proyek', $data);
    }

    public function form() {
        $id = $this->input->get('id');

        if ($id) {
            $data['proyek'] = $this->ProyekModel->get_proyek_by_id($id);
        } else {
            $data['proyek'] = null;
        }

        $data['lokasi_options'] = $this->LokasiModel->get_all_lokasi();

        $this->load->view('proyek/form', $data);
    }

    public function form_process() {
        $id = $this->input->post('id');
        $data = array(
            'nama_proyek' => $this->input->post('nama_proyek'),
            'client' => $this->input->post('client'),
            'tgl_mulai' => $this->input->post('tgl_mulai'),
            'tgl_selesai' => $this->input->post('tgl_selesai'),
            'pimpimnan_proyek' => $this->input->post('pimpimnan_proyek'),
            'keterangan' => $this->input->post('keterangan'),
            'lokasi' => array(
                'id' => $this->input->post('lokasi_id')
            )
        );

        if (!$id) {
            $data['created_at'] = date('Y-m-d\TH:i:s');
            $this->ProyekModel->add_proyek($data);
        } else {
            $data['created_at'] = date('Y-m-d\TH:i:s');
            $this->ProyekModel->update_proyek($id, $data);
        }
        redirect('proyek');
    }
    
    public function delete($id) {
        $this->ProyekModel->delete_proyek($id);
        redirect('proyek');
    }
}