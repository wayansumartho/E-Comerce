<?php
class Toko extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        $this->load->model('Mfrontend');
        $this->load->model('Mtoko');
    }


    public function index()
    {
        $data['toko'] = $this->Mcrud->get_all_data('tbl_toko')->result();

        $this->template->load('layout_adminB', 'admin/toko/form_toko', $data);
    }
    public function aktif($id)
    {
        $dataUpdate = array('statusAktif' => 'Y');
        $this->Mcrud->update('tbl_toko', $dataUpdate, 'idKonsumen', $id);
        redirect('Toko');
    }

    public function non_aktif($id)
    {
        $dataUpdate = array('statusAktif' => 'N');
        $this->Mcrud->update('tbl_toko', $dataUpdate, 'idKonsumen', $id);
        redirect('Toko');
    }

    public function main($idToko)
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['namaToko'] = $this->Mtoko->get_toko($idToko)->row_object();
        $this->template->load('layout_frontend', 'frontend/toko_home', $data);
    }

    public function produk($idToko)
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['namaToko'] = $this->Mtoko->get_toko($idToko)->row_object();
        $data['produk'] = $this->Mtoko->get_produk_by_toko($idToko)->result_array();
        $this->template->load('layout_frontend', 'frontend/toko_produk', $data);
    }
    public function create_produk($idToko)
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['namaToko'] = $this->Mtoko->get_toko($idToko)->row_object();
        $data['idToko'] = $idToko;
        $this->template->load('layout_frontend', 'frontend/toko_create_produk', $data);
    }
    public function insert_produk()
    {
        $idToko = $this->input->post('id_toko');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
        $this->form_validation->set_rules('hargaDiskon', 'Harga Diskon', 'trim|required');
        $this->form_validation->set_rules('stok', 'Stok', 'trim|required');
        $this->form_validation->set_rules('berat', 'Berat', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect('Toko/create_produk/' . $idToko);
        } else {
            $idKat = $this->input->post('kategori');
            $namaProduk = $this->input->post('nama_produk');
            $harga = $this->input->post('harga');
            $hargaDiskon = $this->input->post('hargaDiskon');
            $stok = $this->input->post('stok');
            $berat = $this->input->post('berat');
            $deskripsiProduk = $this->input->post('deskripsi');

            $config['upload_path'] = './upload_produk';
            $config['allowed_types'] = 'jpg|png|jpeg';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_produk')) {
                $data_file = $this->upload->data();

                $data_insert = array(
                    'idKat' => $idKat,
                    'idToko' => $idToko,
                    'namaProduk' => $namaProduk,
                    'harga' => $harga,
                    'hargaDiskon' => $hargaDiskon,
                    'stok' => $stok,
                    'berat' => $berat,
                    'foto' => $data_file['file_name'],
                    'deskripsi' => $deskripsiProduk

                );
                $this->Mtoko->insert_produk($data_insert);
                redirect('Toko/produk/' . $idToko);
            } else {
                $this->session->set_flashdata('pesan', 'Data Gagal Disimpan');
                redirect('Toko/create_produk/' . $idToko);
            }
        }
    }
    public function produk_detail($idToko)
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['namaToko'] = $this->Mtoko->get_toko($idToko)->row_object();
        $data['produk'] = $this->Mtoko->get_produk_by_toko($idToko)->result_array();
        $this->template->load('layout_frontend', 'frontend/toko_produk_detail', $data);
    }
    public function getid_produk($idProduk, $idToko)
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['namaToko'] = $this->Mtoko->get_toko($idToko)->row_object();
        $data['produk'] = $this->Mtoko->get_produk_by_id($idProduk)->row_object();
        $data['idToko'] = $idToko;
        $data['idProduk'] = $idProduk;
        $this->template->load('layout_frontend', 'frontend/toko_edit_produk', $data);
    }
    public function save_edit_produk()
    {
        $idToko = $this->input->post('idToko');
        $idProduk = $this->input->post('idProduk');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
        $this->form_validation->set_rules('stok', 'Stok', 'trim|required');
        $this->form_validation->set_rules('berat', 'Berat', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect('Toko/getid_produk/' . $idProduk . '/' . $idToko);
        } else {

            $idKat = $this->input->post('kategori');
            $idToko = $this->input->post('idToko');
            $namaProduk = $this->input->post('nama_produk');
            $harga = $this->input->post('harga');
            $stok = $this->input->post('stok');
            $berat = $this->input->post('berat');
            $deskripsiProduk = $this->input->post('deskripsi');

            $config['upload_path'] = './upload_produk';
            $config['allowed_types'] = 'jpg|png|jpeg';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_produk')) {
                $data_file = $this->upload->data();

                $data_update = array(
                    'idKat' => $idKat,
                    'idToko' => $idToko,
                    'namaProduk' => $namaProduk,
                    'harga' => $harga,
                    'stok' => $stok,
                    'berat' => $berat,
                    'foto' => $data_file['file_name'],
                    'deskripsi' => $deskripsiProduk

                );
                $this->Mtoko->update_produk('tbl_produk', $data_update, 'idProduk', $idProduk);
                $this->session->set_flashdata('pesan', 'Data Gagal Disimpan');
                redirect('Toko/produk_detail/' . $idToko);
            } else {
                $this->session->set_flashdata('pesan', 'Data Gagal Disimpan');
                redirect('Toko/getid_produk/' . $idProduk . '/' . $idToko);
            }
        }
    }
    public function delete_produk($idProduk, $idToko)
    {
        $q = $this->Mtoko->delete_produk($idProduk);

        if ($q) {
            redirect('Toko/produk_detail/' . $idToko);
        } else {
            $this->session->set_flashdata('pesan', 'Data Gagal di Hapus !');
            redirect('Toko/produk_detail/' . $idToko);
        }
    }

    public function transaksi($idToko)
    {
        $data['transaksi'] = $this->Mtoko->get_transaksi_by_toko($idToko)->result();
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['namaToko'] = $this->Mtoko->get_toko($idToko)->row_object();
        $this->template->load('layout_frontend', 'frontend/toko_transaksi', $data);
    }

    public function invoice($idToko, $idOrder)
    {
        $data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
        $data['namaToko'] = $this->Mtoko->get_toko($idToko)->row_object();
        $data['invoice'] = $this->Mtoko->invoice($idOrder)->result();
        $this->template->load('layout_frontend', 'frontend/toko_invoice', $data);
    }
}
