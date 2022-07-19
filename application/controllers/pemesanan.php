<?php
defined('BASEPATH') or exit('No direct script access allowed');
class pemesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Valorant_model');
        $this->load->model('Pemesanan_model');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Pemesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['valorant'] = $this->Valorant_model->get();
        $data['pemesanan'] = $this->Pemesanan_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('pemesanan/vw_pemesanan', $data);
        $this->load->view('layout/footer', $data);
    }
    public function hapus($id)
    {
        $this->Pemesanan_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pemesanan Berhasil Dihapus!</div>');
        redirect('Valorant');
    }
}