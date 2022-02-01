<?php
class Login extends CI_Controller
{
    public function aksi_login()
    {
        $this->load->model('Mlogin');
        $u = $this->input->post('username');
        $p = $this->input->post('password');
        $level = $this->input->post('level');

        if ($level == "A") {
            $cek = $this->Mlogin->cek_login($u, $p)->num_rows();

            if ($cek == 1) {
                $data_session = array(
                    'userName' => $u,
                    'status' => 'Login'
                );

                $this->session->set_userdata($data_session);
                redirect('Adminpanel/dashboardA');
            } else {
                $this->session->set_flashdata('pesan', 'Username atau Password salah !');
                redirect('Adminpanel');
            }
        } elseif ($level == "B") {
            $cek = $this->Mlogin->cek_login($u, $p)->num_rows();

            if ($cek == 1) {
                $data_session = array(
                    'userName' => $u,
                    'status' => 'Login'
                );

                $this->session->set_userdata($data_session);
                redirect('Adminpanel/dashboardB');
            } else {
                $this->session->set_flashdata('pesan', 'Username atau Password salah !');
                redirect('Adminpanel');
            }
        } else {
            $this->session->set_flashdata('pesan', 'Level Tidak Valid (Harus Di Isi!)');
            redirect('Adminpanel');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Adminpanel');
    }
}
