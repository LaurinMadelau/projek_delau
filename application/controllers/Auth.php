<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'userrole');
    }

    function index()
    {
        if ($this->session->userdata('email')) {
            redirect('auth/login');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'valid_email' => 'Email Harus Valid',
            'required' => 'Email Wajib di isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("auth/login");
        } else {
            $this->cek_login();
        }
    }

    function registrasi()
    {
        if ($this->session->userdata('email')) {
            redirect('Valorant');
        }
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah terdaftar!',
            'valid_email' => 'Email Harus Valid',
            'required' => 'Email Wajib di isi'
        ]);
        $this->form_validation->set_rules(
            'password',
            'password',
            'required|trim|min_length[5]|matches[password2]',
            [
                'matches' => 'Password Tidak Sama',
                'min_length' => 'Password Terlalu Pendek',
                'required' => 'Password harus diisi'
            ]
        );
        $this->form_validation->set_rules('password', 'password', 'required|trim|matches[password]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration';
            $this->load->view('auth/registrasi');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => "User"
            ];
            $this->userrole->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akunmu telah berhasil terdaftar, Silahkan Login! </div>');
            redirect('auth');
        }
    }
    // public function cek_regis()
    // {
    //     $data = [
    //         'nama' => htmlspecialchars($this->input->post('nama', true)),
    //        'email' => htmlspecialchars($this->input->post('email', true)),
    //         'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
    //        'role' => 'User',
    //    ];
    //    $this->userrole->insert($data);
    ////    $this->session->set_flashdata('message', '<div class="alert alert-success" role="elert">
    //    Selamat Akunmu telah berhasil terdaftar, Silahkan Login!</div>');
    //     redirect('Auth');
    // }

    public function cek_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'id' => $user['id'],
                ];
                $this->session->set_userdata($data);
                if ($user['role'] == 'User') {
                    redirect('topup');
                } else {
                    redirect('Valorant');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="elert">
            Password Salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="elert">
            Email belum terdaftar!</div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Logout! </div>');
        redirect('Auth');
    }

    function lupapassword()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Forget Password';
        $email = $this->input->post('email');
        $data['email'] = $this->input->post('email');

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/vw_lupapassword', $data);
        } else {
            $user = $this->db->get_where('user', ['email' => $email])->row_array();
            if ($user) {
                redirect('auth/lupapw');
            } {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Terdaftar!</div>');
                redirect('auth');
            }
        }
    }
    function lupapw()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Forget Password';
        $data['user'] = $this->userrole->getBy();
        $email = $this->input->get('email');
        $this->form_validation->set_rules('password1', 'New Password', 'required|trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/vw_lupapw', $data);
        } else {
            $password1 = $this->input->post('password1');
            $password2 = $this->input->post('password2');
            if (!$password1 == $password2) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Tidak Sama</div>');
                redirect('auth/vw_lupapw');
            } else {
                $data = [
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                ];
            }
            $email = $this->input->post('email');
            $this->userrole->update(['email' => $email], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil Diubah!</div>');
            redirect('Auth');
        }
    }
}
