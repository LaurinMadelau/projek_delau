<?php
defined('BASEPATH') or exit('No direct script access allowed');
class topup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
        $this->load->model('Valorant_model');
        $this->load->model('Pemesanan_model');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Top Up Valorant';
        $data['user'] = $this->userrole->getBy();
        $this->load->view('layout/header', $data);
        $this->load->view('topup/vw_topup', $data);
        $this->load->view('layout/footer', $data);
    }

    public function pesan()
    {
        $data['judul'] = 'TOP UP VALORANT';
        $data['user'] = $this->userrole->getBy();
        $data['valorant'] = $this->Valorant_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('topup/vw_pesan', $data);
        $this->load->view('layout/footer', $data);
    }

    public function pembelian($id)
    {
        $data['judul'] = 'TOP UP VALORANT';
        $data['user'] = $this->userrole->getBy();
        $data['pemesanan'] = $this->Pemesanan_model->get();
        $data['valorant'] = $this->Valorant_model->getById($id);
        $this->form_validation->set_rules('nickname', 'nickname', 'required', [
            'required' => 'Nickname Wajib di isi'
        ]);
        $this->form_validation->set_rules('pembayaran', 'pembayaran', 'required', [
            'required' => 'Metode Pembayaran wajib di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('topup/vw_pembelian', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $data = [
                'id_user' => $this->session->userdata('id'),
                'id_valo' => $this->input->post('id'),
                'nickname' => $this->input->post('nickname'),
                'pembayaran' => $this->input->post('pembayaran'),

            ];
            $this->Pemesanan_model->insert($data);
            redirect('topup/submit');
        }
    }
    public function submit()
    {
        $data['judul'] = 'TOP UP VALORANT';
        $data['user'] = $this->userrole->getBy();
        $data['valorant'] = $this->Valorant_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('topup/vw_submit', $data);
        $this->load->view('layout/footer', $data);
    }

    public function history($id)
    {
        $data['judul'] = 'History Top Up';
        $data['user'] = $this->userrole->getBy();
        $data['pemesanan'] = $this->Pemesanan_model->getByIdP($id);
        $data['valorant'] = $this->Valorant_model->getById($id);
        $this->load->view('layout/header', $data);
        $this->load->view('topup/vw_history', $data);
        $this->load->view('layout/footer', $data);
    }

    public function gantipassword()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Change Password';
        $data['user'] = $this->userrole->getBy();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('password1', 'New Password', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
        $this->load->view('layout/header', $data);
        $this->load->view('topup/vw_gantipassword', $data);
        $this->load->view('layout/footer', $data);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('password1');
            if(!password_verify($current_password, $data['user']['password'])){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current Password!</div>');
        redirect('topup/gantipassword');
            } else {
                if ($current_password == $new_password){
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Password Cannot be the same as current password</div>');
        redirect('topup/gantipassword');
                } else{;

                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil Diubah!</div>');
            redirect('topup');
                }
            }
        }
    }
}
