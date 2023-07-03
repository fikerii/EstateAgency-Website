<?php

class Rumah extends Controller
{
    public function index($page = 1)
    {
        $data['rumah'] = $this->model('Profile_model')->getRumahbyIdAkun($_SESSION['id_akun'], $page);
        $data['totalPages'] = $this->model('Profile_model')->totalPagesRumahbyIdAkun($_SESSION['id_akun']);
        $data['currentPage'] = $page;
        $this->view('templates/header');
        $this->view('table/index', $data);
        $this->view('templates/footer');
    }
    public function tambah()
    {
        if ($this->model('Rumah_model')->tambahDataRumah($_POST) > 0) {
            // Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/rumah/index');
            exit;
        } else {
            // Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/rumah/index');
            exit;
        }

    }
    public function hapus($id_rumah)
    {
        if ($this->model('Rumah_model')->hapusDataRumah($id_rumah) > 0) {
            // Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/rumah/index');
            exit;
        } else {
            // Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/rumah/index');
            exit;
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model('Rumah_model')->getRumahById($_POST['id']));
    }

    public function ubah()
    {
        // $data['rumah'] = $this->model('Rumah_model')->getRumahById($_POST['id']);
        if ($this->model('Rumah_model')->ubahDataRumah($_POST) > 0) {
            Flasher::setFlash('Data Anda', 'berhasil', 'diubah', 'success');

            header('Location: ' . BASEURL . '/rumah/index');
            exit;
        } else {
            Flasher::setFlash('Data Anda', 'gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/rumah/index');
            exit;
        }
    }



    public function cetak()
    {
        $data = $this->model('Rumah_model')->getRumahbyIdAkun();
        $this->model('Rumah_model')->cetakTable($data);
    }
}
?>