<?php
class Jasa_Pengiriman extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        $this->cek_login();
    }

    private function cek_login()
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('Adminpanel');
        }
    }

    //CRUD KOTA
    public function kota()
    {
        $data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();
        $this->template->load('layout_adminB', 'admin/jasa_pengiriman/form_kota', $data);
    }

    public function add_kota()
    {

        $this->template->load('layout_adminB', 'admin/jasa_pengiriman/view_crud/form_add_kota');
    }

    public function save_kota()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('idKota', 'namaKota', 'Isi Semua Field', 'required');
        if ($this->form_validation->run() == TRUE) {
            $this->session->set_flashdata('pesan', 'Data Harus di Isi !');
            redirect('Jasa_Pengiriman/add_kota');
        } else {
            $idKota = $this->input->post('idKota');
            $namaKota = $this->input->post('namaKota');

            $dataInsert = array(
                'idKota' => $idKota,
                'namaKota' => $namaKota
            );

            $this->Mcrud->insert('tbl_kota', $dataInsert);
            $this->session->set_flashdata('pesan1', 'Data Kota Berhasil Ditambah');
            redirect('Jasa_Pengiriman/kota');
        }
    }

    public function getid_kota($id)
    {

        $datawhere = array('idKota' => $id);

        $data['kota'] = $this->Mcrud->get_by_id('tbl_kota', $datawhere)->row_object();
        $this->template->load('layout_adminB', 'admin/jasa_pengiriman/view_crud/form_edit_kota', $data);
    }

    public function edit_kota()
    {

        $id = $this->input->post('id');
        $namaKota = $this->input->post('namaKota');
        $dataUpdate = array('namaKota' => $namaKota);

        $this->Mcrud->update('tbl_kota', $dataUpdate, 'idKota', $id);
        $this->session->set_flashdata('pesan2', 'Data Kota Berhasil Diubah');
        redirect('Jasa_Pengiriman/kota');
    }

    public function delete_kota($idKota)
    {
        $this->Mcrud->delete_kota($idKota);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            echo '<script>alert("Gagal menghapus data (Data Terpakai)."); document.location="../../Jasa_Pengiriman/kota";</script>';
        } else {
            if ($this->db->affected_rows()) {
                redirect('Jasa_Pengiriman/kota');
            } else {
                echo "Data gagal dihapus";
            }
        }
    }


    //CRUD KURIR
    public function kurir()
    {
        $data['kurir'] = $this->Mcrud->get_all_data('tbl_kurir')->result();
        $this->template->load('layout_adminB', 'admin/jasa_pengiriman/form_kurir', $data);
    }

    public function add_kurir()
    {

        $this->template->load('layout_adminB', 'admin/Jasa_pengiriman/view_crud/form_add_kurir');
    }

    public function save_kurir()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('idKurir', 'namaKurir', 'Isi Semua Field', 'required');
        if ($this->form_validation->run() == TRUE) {
            $this->session->set_flashdata('pesan', 'Data Harus di Isi !');
            redirect('Jasa_Pengiriman/add_kurir');
        } else {
            $idKurir = $this->input->post('idKurir');
            $namaKurir = $this->input->post('namaKurir');

            $dataInsert = array(
                'idKurir' => $idKurir,
                'namaKurir' => $namaKurir
            );

            $this->Mcrud->insert('tbl_kurir', $dataInsert);
            $this->session->set_flashdata('pesan1', 'Data Ongkir Berhasil Ditambah');
            redirect('Jasa_Pengiriman/kurir');
        }
    }

    public function getid_kurir($id)
    {

        $datawhere = array('idKurir' => $id);

        $data['kurir'] = $this->Mcrud->get_by_id('tbl_kurir', $datawhere)->row_object();
        $this->template->load('layout_adminB', 'admin/jasa_pengiriman/view_crud/form_edit_kurir', $data);
    }

    public function edit_kurir()
    {

        $id = $this->input->post('id');
        $namaKurir = $this->input->post('namaKurir');
        $dataUpdate = array('namaKurir' => $namaKurir);

        $this->Mcrud->update('tbl_kurir', $dataUpdate, 'idKurir', $id);
        $this->session->set_flashdata('pesan2', 'Data Kurir Berhasil Diubah');
        redirect('Jasa_Pengiriman/kurir');
    }

    public function delete_kurir($idKurir)
    {
        $this->db->where('idKurir', $idKurir);
        if ($this->db->delete('tbl_kurir')) {
            redirect('Jasa_Pengiriman/kurir');
        } else {
            echo '<script>alert("Gagal menghapus data (Data Terpakai)."); document.location="../../Jasa_Pengiriman/kurir";</script>';
        }
    }


    //CRUD ONGKIR
    public function ongkir()
    {
        $data['ongkir'] = $this->Mcrud->get_ongkir()->result();
        $this->template->load('layout_adminB', 'admin/jasa_pengiriman/form_ongkir', $data);
    }

    public function add_ongkir()
    {
        $data['kurir'] = $this->Mcrud->get_all_data('tbl_kurir')->result();
        $data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();


        $this->template->load('layout_adminB', 'admin/Jasa_pengiriman/View_crud/form_add_ongkir', $data);
    }

    public function save_ongkir()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('ongkir', 'Isi Semua Field', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', 'Data Harus di Isi !');
            redirect('Jasa_Pengiriman/add_ongkir');
        } else {
            $idBiayaKirim = $this->input->post('idBiayaKirim');
            $idKurir = $this->input->post('idKurir');
            $idKotaAsal = $this->input->post('idKotaAsal');
            $idKotaTujuan = $this->input->post('idKotaTujuan');
            $biaya = $this->input->post('ongkir');

            if ($idKotaAsal == $idKotaTujuan) {
                $this->session->set_flashdata('pesan', 'Data Kota Asal dan Tujuan Tidak Boleh Sama !');
                redirect('Jasa_Pengiriman/add_ongkir');
            } else {
                $this->load->model('Mcrud');
                $account_duplicate = $this->Mcrud->cek_duplicate_ongkir($idKurir, $idKotaAsal, $idKotaTujuan)->num_rows();

                if ($account_duplicate > 0) {
                    $this->session->set_flashdata('pesan', 'Data Telah Sudah Tersedia !');
                    redirect('Jasa_Pengiriman/add_ongkir');
                } else {
                    $dataInsert = array(
                        'idBiayaKirim' => $idBiayaKirim,
                        'idKurir' => $idKurir,
                        'idKotaAsal' => $idKotaAsal,
                        'idKotaTujuan' => $idKotaTujuan,
                        'biaya' => $biaya
                    );
                    $this->Mcrud->insert('tbl_biaya_kirim', $dataInsert);
                    $this->session->set_flashdata('pesan1', 'Data Ongkir Berhasil Ditambah');
                    redirect('Jasa_Pengiriman/ongkir');
                }
            }
        }
    }

    public function getid_ongkir($id)
    {

        $datawhere = array('idBiayaKirim' => $id);
        $data['kurir'] = $this->Mcrud->get_all_data('tbl_kurir')->result();
        $data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();
        $data['ongkir'] = $this->Mcrud->get_by_id('tbl_biaya_kirim', $datawhere)->row_object();
        $this->template->load('layout_adminB', 'admin/jasa_pengiriman/view_crud/form_edit_ongkir', $data);
    }

    public function edit_ongkir()
    {

        $this->form_validation->set_rules('idBiayaKirim', 'IdBiayaKirim', 'trim|required');
        $this->form_validation->set_rules('idKurir', 'IdKurir', 'trim|required');
        $this->form_validation->set_rules('idKotaAsal', 'IdKotaAsal', 'trim|required');
        $this->form_validation->set_rules('idKotaTujuan', 'IdKotaTujuan', 'trim|required');
        $this->form_validation->set_rules('biaya', 'biaya', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', 'Data Harus di Isi !');
            redirect('Jasa_Pengiriman/getid_ongkir');
        } else {
            $idBiayaKirim = $this->input->post('idBiayaKirim');
            $idKurir = $this->input->post('idKurir');
            $idKotaAsal = $this->input->post('idKotaAsal');
            $idKotaTujuan = $this->input->post('idKotaTujuan');
            $biaya = $this->input->post('biaya');

            if ($idKotaAsal == $idKotaTujuan) {
                $this->session->set_flashdata('pesan', 'Data Kota Asal dan Tujuan Tidak Boleh Sama !');
                redirect('Jasa_Pengiriman/getid_ongkir');
            } else {
                $this->load->model('Mcrud');
                $account_duplicate = $this->Mcrud->cek_duplicate_ongkir($idKurir, $idKotaAsal, $idKotaTujuan)->num_rows();

                if ($account_duplicate > 0) {
                    $this->session->set_flashdata('pesan', 'Data Telah Sudah Tersedia !');
                    redirect('Jasa_Pengiriman/getid_ongkir');
                } else {
                    $dataUpdate = array(
                        'idBiayaKirim' => $idBiayaKirim,
                        'idKurir' => $idKurir,
                        'idKotaAsal' => $idKotaAsal,
                        'idKotaTujuan' => $idKotaTujuan,
                        'biaya' => $biaya
                    );
                    $this->Mcrud->update('tbl_biaya_kirim', $dataUpdate, 'idBiayaKirim', $idBiayaKirim);
                    $this->session->set_flashdata('pesan2', 'Data Ongkir Berhasil Diubah');
                    redirect('Jasa_Pengiriman/ongkir');
                }
            }
        }
    }

    public function delete_ongkir($idBiayaKirim)
    {
        $this->Mcrud->delete_ongkir($idBiayaKirim);
        if ($this->db->affected_rows()) {
            redirect('Jasa_Pengiriman/ongkir');
        } else {
            echo "Data gagal dihapus";
        }
    }
}
