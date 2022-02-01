<?php
class Adminpanel extends CI_Controller
{

    public function index()
    {
        $this->load->view('admin/form_login');
    }

    public function dashboardA()
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('Adminpanel');
        }
        $this->template->load('layout_adminA', 'admin/dashboard');
    }
    public function dashboardB()
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('Adminpanel');
        }
        $this->template->load('layout_adminB', 'admin/dashboard');
    }
}
