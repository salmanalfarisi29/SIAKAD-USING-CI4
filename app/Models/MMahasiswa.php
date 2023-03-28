<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class MMahasiswa extends Model
{
    protected $table = 'tbl_akademis';
    protected $primarykey = 'nim';
    
    public function index()
    {
        
        $model = new MMahasiswa();

        //ngeget data berdasarkan nim, jika sesuai maka get
        $query = $this->db->table('tbl_akademis')->where('nim', 1)->get()->getResult();

        //pakai array dan pager, pager merupakan fitur dari CI untuk menavigasi
        $data = [
            'users' => $query,
            'pager' => $model->pager,
        ];

        return view('VEditMhs', $data);
    }


    //fungsi yang memanggil semua data yang ada pada view
    public function getMahasiswa($nim = false)
    {
        if ($nim === false) {
            //CARA CEPAT MENCARI AMBIL DATABASE
            // return $this->findAll();

            $query = $this->db->query("SELECT * FROM tbl_akademis");
            return $query->getResult(); //return nya berupa array objek
        } else {
            //cara menaual atau query builder
            // return $this->getWhere(['id' => $id]);
            
            $query = $this->db->query("SELECT * FROM tbl_akademis WHERE nim = '$nim' ");
            return $query->getResult(); //return berupa array objek
        }
    }
    public function getMahasiswaByNama($nama)
    {
        if($nama === false) {
            $query = $this->db->query("SELECT * FROM tbl_akademis");
            return $query->getResult();

        } else {
            $query = $this->db->query("SELECT * FROM tbl_akademis where nama LIKE '%$nama%' ");
            return $query->getResult(); 
        }

    }
    
    //menyimpan data baru ke database
    public function saveMahasiswa($data)
    {
        // $builder = $this->db->table($this->table);
        // return $builder->insert($data);

        // Manual atau Quert Builder
        $nim = $data['nim'];
        $nama = $data['nama'];
        $umur = $data['umur'];
        $query = $this->db->query("INSERT INTO tbl_akademis (nim,nama,umur) VALUES('$nim','$nama','$umur')");
        return $query;
    }

    public function hapusMahasiswa($data)
    {
        $nim = $data['nim'];
        $nama = $data['nama'];
        $umur = $data['umur'];
        $query = $this->db->query("DELETE FROM tbl_akademis (nim,nama,umur) VALUES('$nim','$nama','$umur')");
        return $query;
    }

    public function updateMahasiswa($data)
    {
        $nim = $data['nim'];
        $nama = $data['nama'];
        $umur = $data['umur'];
        $query = $this->db->query("UPDATE tbl_akademis SET nama='".$nama."', umur='".$umur."' WHERE nim='".$nim."'");
        return $query;
    }
}