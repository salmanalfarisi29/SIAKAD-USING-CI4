<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class MPegawai extends Model
{
    protected $table = 'tbl_pegawai';
    protected $primarykey = 'nip';
    
    //fungsi yang memanggil semua data yang ada pada view
    public function getPegawai($id = false)
    {
        if ($id === false) {
            //CARA CEPAT MENCARI AMBIL DATABASE
            // return $this->findAll();

            $query = $this->db->query("SELECT * FROM tbl_pegawai");
            return $query->getResult(); //return nya berupa array objek
        } else {
            //cara menaual atau query builder
            // return $this->getWhere(['id' => $id]);
            
            $query = $this->db->query("SELECT * FROM tbl_pegawai WHERE id = '$id' ");
            return $query->getResult(); //return berupa array objek
        }
    }
    public function getPegawaiByNama($nama)
    {
        if($nama === false) {
            $query = $this->db->query("SELECT * FROM tbl_pegawai");
            return $query->getResult();

        } else {
            $query = $this->db->query("SELECT * FROM tbl_pegawai where nama LIKE '%$nama%' ");
            return $query->getResult(); 
        }

    }
    
    //menyimpan data baru ke database
    public function savePegawai($data)
    {
        // var_dump($data);
        // die();
        // Manual atau Quert Builder
        $nip = $data['nip'];
        $nama = $data['nama'];
        $gender = $data['gender'];
        $telepon = $data['telepon'];
        $email = $data['email'];
        $pendidikan = $data['pendidikan'];
        $query = $this->db->query("INSERT INTO tbl_pegawai (nip,nama,gender,telepon,email,pendidikan) VALUES('$nip','$nama','$gender','$telepon','$email','$pendidikan' )");
        return $query;

    }

    public function hapusPegawai($data)
    {
        $nip = $data['nip'];
        $nama = $data['nama'];
        $gender = $data['gender'];
        $telepon = $data['telepon'];
        $email = $data['email'];
        $pendidikan = $data['pendidikan'];
        $query = $this->db->query("INSERT INTO tbl_pegawai (nip,nama,gender,telepon,email,pendidikan) VALUES('$nip','$nama','$gender','$telepon','$email','$pendidikan')");
        return $query;
    }

    public function updatePegawai($data)
    {
    $id = $data['id'];
    $nip = $data['nip'];
    $nama = $data['nama'];
    $gender = $data['gender'];
    $telepon = $data['telepon'];
    $email = $data['email'];
    $pendidikan = $data['pendidikan'];
    $query = $this->db->query("UPDATE tbl_pegawai SET nip='$nip', nama='$nama', gender='$gender', telepon='$telepon', email='$email', pendidikan='$pendidikan' WHERE id='$id'");
    return $query;
    }
}