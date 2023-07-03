<?php

class Profile_model
{

    private $table = 'data_akun';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }


    public function getUserById($id_akun)
    {
        $this->db->query('SELECT * FROM data_akun WHERE id_akun=:id');
        $this->db->bind('id', $id_akun);

        return $this->db->resultSet();
    }



    public function updateProfile($data)
    {
        if (isset($_FILES['images']) && $_FILES['images']['error'] === UPLOAD_ERR_OK) {

            $direktori = "img/profile/";
            $file_name = $_FILES['images']['name'];
            move_uploaded_file($_FILES['images']['tmp_name'], $direktori . $file_name);
        } else {
            $file_name = $data['backups'];
        }

        $query = "UPDATE data_akun SET
                    nama_lengkap = :nama_lengkap,
                    email = :email,
                    phone = :phone,
                    images = :images
                    WHERE id_akun = :id_akun";
        $this->db->query($query);
        $this->db->bind('id_akun', $_SESSION['id_akun']);
        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('phone', $data['phone']);
        $this->db->bind('images', $file_name);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getRumahbyIdAkun($id, $page)
    {
        $dataPerPage = 6;
        $offset = ($page - 1) * $dataPerPage;

        $query = "SELECT * FROM data_rumah where id_akun = :id_akun LIMIT :offset, :dataPerPage";
        $this->db->query($query);
        $this->db->bind('id_akun', $id);
        $this->db->bind('offset', $offset);
        $this->db->bind('dataPerPage', $dataPerPage);

        return $this->db->resultSet();
    }

    public function totalPagesRumahbyIdAkun($id)
    {
        $query = "SELECT COUNT(*) as rowData FROM data_rumah where id_akun = :id_akun";
        $this->db->query($query);
        $this->db->bind('id_akun', $id);
        $this->db->execute();



        return ceil($this->db->single()['rowData'] / 6);
    }

}