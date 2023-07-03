<?php

class Home extends Controller
{
    public function index()
    {
        $data['best'] = $this->model('Home_model')->getBestRumah();
        $data['latest'] = $this->model('Home_model')->getLatestRumah();
        $this->view('templates/header');
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function logout()
    {
        unset($_SESSION['id_akun']);
        header('Location: ' . BASEURL . '/login');
    }
}
?>