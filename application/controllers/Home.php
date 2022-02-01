<?php

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mfrontend');
    }
    public function index()
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['produk'] = $this->Mfrontend->get_all_produk_terbaru()->result();
        $this->template->load('layout_frontend', 'frontend/home', $data);
    }
    public function Login()
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend', 'frontend/login', $data);
    }
    public function Register()
    {
        $data['kota'] = $this->Mfrontend->get_all_kota()->result();
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend', 'frontend/register', $data);
    }
    public function atc_reg()
    {
        $this->form_validation->set_rules('namaKonsumen', 'NamaKonsumen', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('no_telpon', 'No Telpon', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect('Home/Register');
        } else {

            $namaKonsumen = $this->input->post('namaKonsumen');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $password_confirm = $this->input->post('confirm_password');
            $alamat = $this->input->post('alamat');
            $kota = $this->input->post('kota');
            $tlpn = $this->input->post('no_telpon');

            $dataInsert = array(
                'namaKonsumen' => $namaKonsumen,
                'email' => $email,
                'username' => $username,
                'password' => $password,
                'alamat' => $alamat,
                'idKota' => $kota,
                'tlpn' => $tlpn
            );
            $this->Mfrontend->insert('tbl_member', $dataInsert);
            redirect('Home');
        }
    }
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['produk'] = $this->Mfrontend->get_keyword($keyword);
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['produk_terbaru'] = $this->Mfrontend->get_all_produk_terbaru()->result();
        $data['toko'] = $this->Mfrontend->get_toko('')->result();
        $this->template->load('layout_frontend', 'frontend/produk_search', $data);
    }
}
