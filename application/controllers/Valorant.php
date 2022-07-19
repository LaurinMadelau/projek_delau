<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Valorant extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Valorant_model');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Valorant';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['valorant'] = $this->Valorant_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('valorant/vw_valorant', $data);
        $this->load->view('layout/footer', $data);
    }
    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Valorant";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['valorant'] = $this->Valorant_model->get();
        $this->form_validation->set_rules('points', 'points', 'required', [
            'required' => 'Jumlah Points Wajib di isi'
        ]);
        $this->form_validation->set_rules('harga', 'harga', 'required', [
            'required' => 'Harga Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("valorant/vw_tambah_valorant", $data);
            $this->load->view("layout/footer",);
        } else {
            $data = [
                'points' => $this->input->post('points'),
                'harga' => $this->input->post('harga'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/valorant/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Valorant_model->insert($data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Valorant Berhasil Ditambah!</div>');
            redirect('Valorant');
        }
    }
    //   function upload()
    //    {
    //    $data = [
    //        'points' => $this->input->post('points'),
    //       'harga' => $this->input->post('harga'),
    //      'gambar' => $this->input->post('gambar'),
    //   ];
    //   $this->Valorant_model->insert($data);
    //   redirect('Valorant');
    //  }

    function edit($id)
    {
        $data['judul'] = "Halaman Edit Valorant";
        $data['valorant'] = $this->Valorant_model->getById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('points', 'points', 'required', [
            'required' => 'Jumlah Points Wajib di isi'
        ]);
        $this->form_validation->set_rules('harga', 'harga', 'required', [
            'required' => 'Harga Wajib di isi'
        ]);
        
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('valorant/vw_ubah_valorant', $data);
            $this->load->view('layout/footer');
        } else {
            $data = [
                'points' => $this->input->post('points'),
                'harga' => $this->input->post('harga'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/valorant/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['prodi']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/valorant/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id');
            $this->Valorant_model->update(['id' => $id], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Valorant Berhasil DiUbah!</div>');
            redirect('Valorant');
        }
    }

    // public function update()
    // {
    //     $data = [
    //      'points' => $this->input->post('points'),
    //      'harga' => $this->input->post('harga'),
    //      'gambar' => $this->input->post('gambar'),
    //  ];
    //   $id = $this->input->post('id');
    //   $this->Valorant_model->update(['id' => $id], $data);
    //   $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Valorant Berhasil DiUbah!</div>');
    //   redirect('Valorant');
    //   }
    public function hapus($id)
    {
        $this->Valorant_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Valorant Berhasil Dihapus!</div>');
        redirect('Valorant');
    }
}
