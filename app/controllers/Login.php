<?php

class Login extends Controller
{
    public function index()
    {

        $this->view('login/index');
    }

    public function validasi()
    {
        $data['akun'] = $this->model('Login_model')->cekAkun($_POST);

        if ($data['akun'] == null) {
            Flasher::setFlash('Akun Anda', 'Gagal Login', '<br/>Username atau Password salah', 'danger');
            header('Location: ' . BASEURL . '/login');
            exit;
        } else {
            // Flasher::setFlash('berhasil', 'login', 'success');
            $_SESSION['id_akun'] = $data['akun'][0]['id_akun'];
            $_SESSION['role'] = $data['akun'][0]['role'];
            $_SESSION['cari'] = 0;
            header('Location: ' . BASEURL . '/home');
            exit;
        }


    }
}