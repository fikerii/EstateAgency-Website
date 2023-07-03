<?php

class Display extends Controller
{

    public function index($page = 1)
    {

        $data['rumah'] = $this->model('Rumah_model')->getAllRumahPagination($page);
        $data['totalPages'] = $this->model('Rumah_model')->totalPagesAllRumah();
        $data['currentPage'] = $page;
        $this->view('templates/header');
        $this->view('display/index', $data);
        $this->view('templates/footer');
    }

    public function resetFilter()
    {
        $_SESSION['cari'] = 0;
        header('Location: ' . BASEURL . '/display/index');
        exit;
    }

    public function cari($pages = 1)
    {
        if ($this->model('Rumah_model')->cariDataRumah($pages) > 0) {
            $data['rumah'] = $this->model('Rumah_model')->cariDataRumah($pages);
            $data['totalPages'] = $this->model('Rumah_model')->totalPagesCariDataRumah();
            $data['currentPage'] = $pages;
            $_SESSION['cari'] = 1;
            $this->view('templates/header');
            $this->view('display/index', $data);
            $this->view('templates/footer');
        }
    }
}