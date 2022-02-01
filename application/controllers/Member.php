<?php
class Member extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        $this->load->model('Mfrontend');
        $this->load->model('Mmember');
        $this->load->library('cart');
    }

    public function index()
    {
        $data['member'] = $this->Mcrud->get_all_data('tbl_member')->result();
        $this->template->load('layout_adminB', 'admin/member/form_member', $data);
    }

    public function aktif($id)
    {
        $dataUpdate = array('statusAktif' => 'Y');
        $this->Mcrud->update('tbl_member', $dataUpdate, 'idKonsumen', $id);
        redirect('Member');
    }

    public function non_aktif($id)
    {
        $dataUpdate = array('statusAktif' => 'N');
        $this->Mcrud->update('tbl_member', $dataUpdate, 'idKonsumen', $id);
        redirect('Member');
    }

    public function atc_login()
    {

        $u = $this->input->post('username');
        $p = $this->input->post('password');

        $cek = $this->Mmember->cek_login($u, $p)->num_rows();
        $result = $this->Mmember->cek_login($u, $p)->result();
        if ($cek == 1) {
            $data_session = array(
                'userName' => $u,
                'id' => $result[0]->idKonsumen,
                'status' => 'Login'
            );

            $this->session->set_userdata($data_session);
            redirect('member/dashboard');
        } else {
            $this->session->set_flashdata('pesan', 'Username atau Password salah !');
            redirect('home/Login');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Home');
    }

    public function dashboard()
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend', 'frontend/dashboard_member', $data);
    }
    public function toko()
    {
        $data['toko'] = $this->Mmember->get_toko_by_member()->result_array();
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend', 'frontend/member_toko', $data);
    }
    public function create_toko()
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend', 'frontend/form_create_toko', $data);
    }
    public function insert_toko()
    {
        $id = $this->session->userdata('id');
        $nama_toko = $this->input->post('nama_toko');
        $deskripsi = $this->input->post('deskripsi');

        $config['upload_path'] = './upload_logo_toko';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('logo_toko')) {
            $data_file = $this->upload->data();

            $data_insert = array(
                'idKonsumen' => $id,
                'namaToko' => $nama_toko,
                'logo' => $data_file['file_name'],
                'deskripsi' => $deskripsi,
                'statusaktif' => 'Y'
            );
            $this->Mmember->insert_toko($data_insert);
            redirect('Member/toko');
        } else {
            redirect('Member/create_toko');
        }
    }

    public function cart_tambah($idProduk)
    {

        if (empty($this->session->userdata('status'))) {
            $this->session->set_flashdata('pesan', 'Silahkan Login Sebelum Membeli !!');
            redirect('Home/Login');
        } else {
            $jml_keranjang = count($this->cart->contents());
            if (empty($jml_keranjang)) {
                $data_produk = $this->Mmember->get_produk_by_id($idProduk)->row_object();

                $insert_cart = array(
                    'id' => $idProduk,
                    'idToko' => $data_produk->idToko,
                    'name' => $data_produk->namaProduk,
                    'price' => $data_produk->harga,
                    'gambar' => $data_produk->foto,
                    'qty' => 1
                );
                $this->cart->insert($insert_cart);
                redirect('Member/keranjang');
            } else {
                $idToko = "";
                if ($cart = $this->cart->contents()) {
                    foreach ($cart as $item) {
                        $idToko = $item['idToko'];
                    }
                }
                ///
                $data_produk = $this->Mmember->get_produk_by_id($idProduk)->row_object();
                if ($idToko == $data_produk->idToko) {
                    $data_produk = $this->Mmember->get_produk_by_id($idProduk)->row_object();

                    $insert_cart = array(
                        'id' => $idProduk,
                        'idToko' => $data_produk->idToko,
                        'name' => $data_produk->namaProduk,
                        'price' => $data_produk->harga,
                        'gambar' => $data_produk->foto,
                        'qty' => 1
                    );

                    $this->cart->insert($insert_cart);
                    redirect('Member/keranjang');
                } else {
                    echo "Barang harus dari toko yang sama";
                }
            }
        }
    }

    public function keranjang()
    {

        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend', 'frontend/keranjang', $data);
    }
    public function delete_cart($rowid)
    {
        $data_hapus = array(
            'rowid' => $rowid,
            'qty' => 0
        );
        $this->cart->update($data_hapus);
        redirect('Member/keranjang');
    }
    public function selesai_belanja()
    {
        $idToko = "";

        if ($cart = $this->cart->contents()) {
            foreach ($cart as $item) {
                $idToko = $item['idToko'];
            }
        }

        $data_pembeli = array(
            'idKonsumen' => $this->session->userdata('id'),
            'tglOrder' => date('Y-m-d'),
            'idToko' => $idToko,
            'statusOrder' => 'Belum Bayar',
        );
        $idTerakhir = $this->Mmember->insert_order($data_pembeli);

        if ($cart = $this->cart->contents()) {
            foreach ($cart as $item) {
                $data_detail = array(
                    'idOrder' => $idTerakhir,
                    'idProduk' => $item['id'],
                    'jumlah' => $item['qty'],
                    'harga' => $item['price']
                );
                $this->Mmember->insert_detail_order($data_detail);
            }
        }
        $this->cart->destroy();
        redirect('Member/transaksi');
    }

    public function transaksi()
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['jml_trans_bb'] = $this->Mmember->jml_transaksi_belum_bayar();
        $data['transaksi'] = $this->Mmember->get_trans_by_konsumen()->result();
        $this->template->load('layout_frontend', 'frontend/member_transaksi', $data);
    }
    public function lupa_password()
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend', 'frontend/lupa_password', $data);
    }
    public function ganti_password()
    {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('ulangiPassword', 'Ulangi Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect('Member/lupa_password');
        } else {
            $u = $this->input->POST('username');
            $p = $this->input->POST('password');
            $ulangiPassword = $this->input->POST('ulangiPassword');

            $member = $this->Mmember->get_member($u)->row_object();
            if ($member) {
                if ($p == $ulangiPassword) {
                    $data = array(
                        'password' => $p
                    );
                    $this->db->update('tbl_member', $data, array(
                        'username' => $u
                    ));
                    $this->session->set_flashdata('pesan', 'Ganti Password Berhasil');
                    redirect('Home/login');
                }
            }
        }
    }

    public function detail_produk()
    {
        $id = $this->input->get('id');
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['produk'] = $this->Mfrontend->detail_produk(['idProduk' => $id])->result_array();
        $this->template->load('layout_frontend', 'frontend/detail_produk', $data);
    }
}
