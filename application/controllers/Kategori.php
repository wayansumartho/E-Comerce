<?php
class Kategori extends CI_Controller
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
    public function A()
    {

        $data['kategori'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
        $this->template->load('layout_adminA', 'admin/kategori/indexA', $data);
    }
    public function addA()
    {

        $this->template->load('layout_adminA', 'admin/kategori/form_addA');
    }

    public function saveA()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'namaKategori',
            'Harus di Isi',
            'required'
        );
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', 'Data Harus di Isi !');
            redirect('Kategori/addA');
        } else {
            $namaKategori = $this->input->post('namaKategori');

            $dataInsert = array('namakat' => $namaKategori);

            $this->Mcrud->insert('tbl_kategori', $dataInsert);
            $this->session->set_flashdata('pesan1', 'Data Kategori Berhasil Ditambah');
            redirect('Kategori/A');
        }
    }

    public function getidA($id)
    {

        $datawhere = array('idkat' => $id);

        $data['kategori'] = $this->Mcrud->get_by_id('tbl_kategori', $datawhere)->row_object();
        $this->template->load('layout_adminA', 'admin/kategori/form_editA', $data);
    }

    public function editA()
    {
        $id = $this->input->post('id');
        $namaKategori = $this->input->post('namaKategori');
        $dataUpdate = array('namakat' => $namaKategori);

        $this->Mcrud->update('tbl_kategori', $dataUpdate, 'idkat', $id);
        $this->session->set_flashdata('pesan2', 'Data Kategori Berhasil Diubah');
        redirect('Kategori/A');
    }

    public function deleteA($idkat)
    {
        $this->Mcrud->delete_kategori($idkat);
        if ($this->db->affected_rows()) {
            redirect('Kategori/A');
        } else {
            echo "Data gagal dihapus";
        }
    }
    public function B()
    {

        $data['kategori'] = $this->Mcrud->get_all_data('tbl_kategori')->result();
        $this->template->load('layout_adminB', 'admin/kategori/indexB', $data);
    }

    public function addB()
    {

        $this->template->load('layout_adminB', 'admin/kategori/form_addB');
    }

    public function saveB()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'namaKategori',
            'Harus di Isi',
            'required'
        );
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', 'Data Harus di Isi !');
            redirect('Kategori/addB');
        } else {
            $namaKategori = $this->input->post('namaKategori');

            $dataInsert = array('namakat' => $namaKategori);

            $this->Mcrud->insert('tbl_kategori', $dataInsert);
            $this->session->set_flashdata('pesan1', 'Data Kategori Berhasil Ditambah');
            redirect('Kategori/B');
        }
    }

    public function getidB($id)
    {

        $datawhere = array('idkat' => $id);

        $data['kategori'] = $this->Mcrud->get_by_id('tbl_kategori', $datawhere)->row_object();
        $this->template->load('layout_adminB', 'admin/kategori/form_editB', $data);
    }

    public function editB()
    {
        $id = $this->input->post('id');
        $namaKategori = $this->input->post('namaKategori');
        $dataUpdate = array('namakat' => $namaKategori);

        $this->Mcrud->update('tbl_kategori', $dataUpdate, 'idkat', $id);
        $this->session->set_flashdata('pesan2', 'Data Kategori Berhasil Diubah');
        redirect('Kategori/B');
    }

    public function deleteB($idkat)
    {
        $this->Mcrud->delete_kategori($idkat);
        if ($this->db->affected_rows()) {
            redirect('Kategori/B');
        } else {
            echo "Data gagal dihapus";
        }
    }
}
