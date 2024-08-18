<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LokasiModel extends CI_Model {

    private $api_url = 'http://localhost:8080/lokasi';

    private function send_request($endpoint = '', $method = 'GET', $data = null) {
        $url = $this->api_url . $endpoint;
        $options = [
            'http' => [
                'header' => "Content-Type: application/json\r\n",
                'method' => $method,
                'content' => $data ? json_encode($data) : null
            ]
        ];
        $context = stream_context_create($options);
        return @file_get_contents($url, false, $context);
    }

    public function get_all_lokasi() {
        $response = $this->send_request();
        return json_decode($response, true);
    }

    public function get_lokasi_by_id($id) {
        $response = $this->send_request('/' . $id);
        return $response ? json_decode($response, true) : [];
    }

    public function add_lokasi($data) {
        return $this->send_request('', 'POST', $data);
    }

    public function update_lokasi($id, $data) {
        return $this->send_request('/' . $id, 'PUT', $data);
    }

    public function delete_lokasi($id) {
        return $this->send_request('/' . $id, 'DELETE');
    }
}
