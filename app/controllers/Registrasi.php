<?php

class Registrasi extends Controller
{
    public function index()
    {

        $this->view('registrasi/index');
    }

    public function tambah()
    {

        $id['id_akun'] = $this->model('Registrasi_model')->tambahAkun($_POST);
        $this->model('Registrasi_model')->setProfile($_POST, $id);
        Flasher::setFlash('Akun Anda', 'berhasil', 'ditambahkan', 'success');
        header('Location: ' . BASEURL . '/login');
        exit;

    }
}