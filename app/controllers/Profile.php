<?php

class Profile extends Controller
{

    public function index($pages = 1)
    {
        $data['profile'] = $this->model('Profile_model')->getUserById($_SESSION['id_akun']);
        $data['rumah'] = $this->model('Profile_model')->getRumahbyIdAkun($_SESSION['id_akun'], $pages);
        $data['totalPages'] = $this->model('Profile_model')->totalPagesRumahByIdAkun($_SESSION['id_akun']);
        $data['currentPage'] = $pages;
        $this->view('templates/header');
        $this->view('profile/index', $data);
        $this->view('templates/footer');
    }

    public function edit()
    {
        if ($this->model('Profile_model')->updateProfile($_POST) > 0) {
            // Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/profile/index');
            exit;
        } else {
            // Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/profile/index');
            exit;
        }
    }

    public function getEditProfile()
    {
        echo json_encode($this->model('Profile_model')->getUserById($_POST['id']));
    }
}