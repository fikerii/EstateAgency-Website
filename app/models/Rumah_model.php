<?php

class Rumah_model
{
    private $table = 'data_rumah';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllRumah()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function getRumahbyIdAkun()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_akun=:id');
        $this->db->bind('id', $_SESSION['id_akun']);
        return $this->db->resultSet();
    }

    public function getRumahById($id_rumah)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_rumah=:id');
        $this->db->bind('id', $id_rumah);
        return $this->db->single();
    }

    public function getAllRumahPagination($page)
    {
        $dataPerPage = 6;
        $offset = ($page - 1) * $dataPerPage;

        $query = "SELECT * FROM data_rumah LIMIT :offset, :dataPerPage";
        $this->db->query($query);
        $this->db->bind('offset', $offset);
        $this->db->bind('dataPerPage', $dataPerPage);

        return $this->db->resultSet();
    }

    public function totalPagesAllRumah()
    {
        $query = "SELECT COUNT(*) as rowData FROM data_rumah";
        $this->db->query($query);
        $this->db->execute();



        return ceil($this->db->single()['rowData'] / 6);
    }

    public function tambahDataRumah($data)
    {
        $direktori = "img/rumah/";
        $file_name = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $direktori . $file_name);

        $query = "INSERT INTO data_rumah
                    VALUES
                    ('', :id_akun, :tipe, :alamat, :area, :harga, :beds, :baths, :garages, :image, '' )";

        $this->db->query($query);
        $this->db->bind('id_akun', $_SESSION['id_akun']);
        $this->db->bind('tipe', $data['tipe']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('area', $data['area']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('beds', $data['beds']);
        $this->db->bind('baths', $data['baths']);
        $this->db->bind('garages', $data['garages']);
        $this->db->bind('image', $file_name);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataRumah($id)
    {
        $query = "DELETE FROM data_rumah WHERE id_rumah=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function ubahDataRumah($data)
    {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {

            $direktori = "img/profile/";
            $file_name = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $direktori . $file_name);
        } else {
            $file_name = $data['backup'];
        }
        $query = "UPDATE data_rumah SET
                    id_akun = :id_akun,
                    tipe = :tipe,
                    alamat = :alamat,
                    area = :area,
                    harga = :harga,
                    beds = :beds,
                    baths = :baths,
                    garages = :garages,
                    image = :image,
                    status = :status
                    WHERE id_rumah = :id_rumah";

        $this->db->query($query);
        $this->db->bind('id_rumah', $data['id_rumah']);
        $this->db->bind('id_akun', $data['id_akun']);
        $this->db->bind('tipe', $data['tipe']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('area', $data['area']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('beds', $data['beds']);
        $this->db->bind('baths', $data['baths']);
        $this->db->bind('garages', $data['garages']);
        $this->db->bind('image', $file_name);
        $this->db->bind('status', $data['status']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function totalPagesCariDataRumah()
    {

        if ($_POST['kategori'] == "tipe") {
            $query = "SELECT COUNT(*) as rowData FROM data_rumah WHERE tipe LIKE :keyword";
            $keyword = $_POST['tipe'];
            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");
        } elseif ($_POST['kategori'] == "alamat") {
            $query = "SELECT COUNT(*) as rowData FROM data_rumah WHERE alamat LIKE :keyword";
            $keyword = $_POST['alamat'];
            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");
        } elseif ($_POST['kategori'] == "harga") {
            $query = "SELECT COUNT(*) as rowData FROM data_rumah WHERE harga>=:min_harga AND harga<=:max_harga";
            $min = $_POST['min_harga'];
            $max = $_POST['max_harga'];
            $this->db->query($query);
            $this->db->bind('min_harga', $min);
            $this->db->bind('max_harga', $max);
        } elseif ($_POST['kategori'] == "area") {
            $query = "SELECT COUNT(*) as rowData FROM data_rumah WHERE area>=:min_area AND area<=:max_area";
            $min = $_POST['min_area'];
            $max = $_POST['max_area'];
            $this->db->query($query);
            $this->db->bind('min_area', $min);
            $this->db->bind('max_area', $max);
        }
        $this->db->execute();



        return ceil($this->db->single()['rowData'] / 6);
    }
    public function cariDataRumah($page)
    {
        $dataPerPage = 6;
        $offset = ($page - 1) * $dataPerPage;
        if ($_POST['kategori'] == "tipe") {
            $query = "SELECT * FROM data_rumah WHERE tipe LIKE :keyword LIMIT :offset, :dataPerPage";
            $keyword = $_POST['tipe'];
            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");
        } elseif ($_POST['kategori'] == "alamat") {
            $query = "SELECT * FROM data_rumah WHERE alamat LIKE :keyword LIMIT :offset, :dataPerPage";
            $keyword = $_POST['alamat'];
            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");
        } elseif ($_POST['kategori'] == "harga") {
            $query = "SELECT * FROM data_rumah WHERE harga>=:min_harga AND harga<=:max_harga LIMIT :offset, :dataPerPage";
            $min = $_POST['min_harga'];
            $max = $_POST['max_harga'];
            $this->db->query($query);
            $this->db->bind('min_harga', $min);
            $this->db->bind('max_harga', $max);
        } elseif ($_POST['kategori'] == "area") {
            $query = "SELECT * FROM data_rumah WHERE area>=:min_area AND area<=:max_area";
            $min = $_POST['min_area'];
            $max = $_POST['max_area'];
            $this->db->query($query);
            $this->db->bind('min_area', $min);
            $this->db->bind('max_area', $max);
        }
        $this->db->bind('offset', $offset);
        $this->db->bind('dataPerPage', $dataPerPage);


        return $this->db->resultSet();
    }

    public function cetakTable($rumah)
    {

        // memanggil library FPDF
        require('../fpdf/fpdf.php');
        // intance object dan memberikan pengaturan halaman PDF
        $pdf = new FPDF('P', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string
        $pdf->Cell(188, 10, 'Laporan Data Rumah', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(188, 10, 'Estate Agency', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 10);
        // $pdf->Cell(21, 6, '', 0, 0);
        $pdf->Cell(8, 6, 'No', 1, 0);
        $pdf->Cell(20, 6, 'Tipe', 1, 0);
        $pdf->Cell(25, 6, 'Alamat', 1, 0);
        $pdf->Cell(20, 6, 'Area', 1, 0);
        $pdf->Cell(25, 6, 'Harga', 1, 0);
        $pdf->Cell(20, 6, 'Kamar', 1, 0);
        $pdf->Cell(25, 6, 'Kamar Mandi', 1, 0);
        $pdf->Cell(20, 6, 'Garasi', 1, 0);
        $pdf->Cell(25, 6, 'Status', 1, 1);

        $pdf->SetFont('Arial', '', 10);
        $no = 1;
        $jumlahSale = 0;
        $untungSale = 0;
        $jumlahRent = 0;
        $untungRent = 0;
        foreach ($rumah as $rm) {
            if ($rm['status'] == 0) {
                $status = "for sale";
                $untungSale = $untungSale + $rm['harga'];
                $jumlahSale++;
            } else {
                $status = "rent";
                $untungRent = $untungRent + $rm['harga'];
                $jumlahRent++;
            }
            // $pdf->Cell(21, 6, '', 0, 0);
            $pdf->Cell(8, 6, $no++, 1, 0);
            $pdf->Cell(20, 6, $rm['tipe'], 1, 0);
            $pdf->Cell(25, 6, $rm['alamat'], 1, 0);
            $pdf->Cell(20, 6, $rm['area'], 1, 0);
            $pdf->Cell(25, 6, '$ ' . $rm['harga'], 1, 0);
            $pdf->Cell(20, 6, $rm['beds'], 1, 0);
            $pdf->Cell(25, 6, $rm['baths'], 1, 0);
            $pdf->Cell(20, 6, $rm['garages'], 1, 0);
            $pdf->Cell(25, 6, $status, 1, 1);
        }

        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(70, 10, 'Rent', 0, 1, 'C');
        $pdf->Cell(70, 10, 'Jumlah Rumah : ' . $jumlahRent, 1, 1);
        $pdf->Cell(70, 10, 'Total Keuntungan : $ ' . $untungRent . ' / per bulan', 1, 1);


        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(70, 10, 'For Sale', 0, 1, 'C');
        $pdf->Cell(70, 10, 'Jumlah Rumah : ' . $jumlahSale, 1, 1);
        $pdf->Cell(70, 10, 'Total Keuntungan : $ ' . $untungSale, 1, 1);

        $pdf->Output();
    }
}