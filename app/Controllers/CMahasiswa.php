<?php
 
namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\MMahasiswa;
 
class CMahasiswa extends Controller
{
    //tampilan awal saat aplikasi dibuat menggunakan method index
    public function index()
    {
        $model = new MMahasiswa;
        $data['title']     = 'Nama Mahasiswa'; //buat judul page
        $data['getMahasiswa'] = $model->getMahasiswa(); //ngeget dari models
        $data['getMahasiswa'] = $model->paginate(3);
        $data['pager'] = $model->pager;
        $data['no'] = ($this->request->getVar('page_mahasiswa') ? ($this->request->getVar('page_mahasiswa') - 1) * 3 : 0);

        // return view('VMahasiswa/index', $data);
        echo view('layout/v_header', $data);
        echo view('layout/v_navbar', $data);
        echo view('VMahasiswa', $data); //ngirim data ke view mahasiswa
        echo view('layout/v_footer', $data);
    }

    public function search()
    {
        $model = new MMahasiswa;
        $data['title'] = 'Data Mahasiswa by Nama';
        $nama = $this->request->getPost('nama');
        $data['getMahasiswa'] = $model->getMahasiswaByNama($nama);

        echo view('layout/v_header', $data);
        echo view('layout/v_navbar', $data);
        echo view('VMahasiswa', $data); //ngirim data ke view mahasiswa
        echo view('layout/v_footer', $data);

    }
 
    //mengambil data yang diinputkan melalui form view
    public function add()
    {
        $model = new MMahasiswa;
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'nim'   => $this->request->getPost('umur'),
            'umur'  => $this->request->getPost('nim'),
        );
        $model->saveMahasiswa($data);
        echo '<script>
                alert("Selamat! Berhasil Menambah Data Mahasiswa");
                window.location="' . base_url('CMahasiswa') . '"
            </script>';
    }       

    public function hapus($data, $id)
    {
        $model = new MMahasiswa;
        // $getMahasiswa = $model->getMahasiswa($id)->getRow();
        if (isset($getMahasiswa)){
            $data = array(
                'nim' => $this->request->getPost('nim'),
                'nama'   => $this->request->getPost('nama'),
                'umur'  => $this->request->getPost('umur'),
            );
            $model->hapusMahasiswa($id);
            echo '<script>
                    alert("Selamat! Data berhasil terhapus.");
                    window.location="' . base_url('akademis') . '"
                </script>';
        } else {
 
            echo '<script>
                    alert("Gagal Menghapus !");
                    window.location="' . base_url('akademis') . '"
                </script>';
        }
    }

    public function detail($nim){
        $model = new MMahasiswa;
        $data['tittle'] = 'Detail Mahasiswa';
        $data['getMahasiswa'] = $model->getMahasiswa($nim);
        echo view('layout/v_header', $data);
        echo view('layout/v_navbar', $data);
        echo view('VDetailMhs', $data); //ngirim data ke view mahasiswa
        echo view('layout/v_footer', $data);
    }

    public function edit($id)
    {
        $model = new MMahasiswa;
        $data['title']   = 'Edit Mahasiswa';
        $data['tampil'] = $model->getMahasiswa($id);

        echo view('layout/v_header', $data);
        echo view('layout/v_navbar');
        echo view('VEditMhs', $data);
        echo view('layout/v_footer');
    }

    public function update()
    {
        $model = new MMahasiswa;
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'nim'  => $this->request->getPost('nim'),
            'umur' => $this->request->getPost('umur'),
        );

        $model->updateMahasiswa($data);
        echo '<script>
                alert("Selamat! Berhasil Mengupdate Data Mahasiswa");
                window.location="' . base_url('tbl_akademis') . '"
            </script>';
        return redirect('mahasiswa');
    }

    public function addMhs()
    {
        $data['title']   = 'Data Mahasiswa';

        echo view('layout/v_header', $data);
        echo view('layout/v_navbar');
        echo view('VAddMhs');
        echo view('layout/v_footer');
    }

    public function store()
    {
        $model = new MMahasiswa;
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'nim'  => $this->request->getPost('nim'),
            'umur' => $this->request->getPost('umur'),
        );
        $model->saveMahasiswa($data);
        echo '<script>
                alert("Selamat! Berhasil Menambah Data Mahasiswa");
                window.location="' . base_url('mahasiswa') . '"
            </script>';
    }
 
}