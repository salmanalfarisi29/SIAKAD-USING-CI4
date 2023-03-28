<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MPegawai;

class CPegawai extends BaseController
{
    public function index()
    {
        $model = new MPegawai();
        $data['title'] = 'Nama Pegawai';
        $data['getPegawai'] = $model->getPegawai();
        
        //TAMPILAN
        echo view('layout/v_header', $data);
        echo view('layout/v_navbar', $data);
        echo view('pegawai/index', $data);
        echo view('layout/v_footer', $data);
    }

    public function search()
    {
        $model = new MPegawai();
        $data['title'] = 'Nama Pegawai by nama';
        $nama = $this->request->getPost('nama');
        $data['getPegawai'] = $model->getPegawaiByNama($nama);

        echo view('layout/v_header', $data);
        echo view('layout/v_navbar', $data);
        echo view('pegawai/index', $data);
        echo view('layout/v_footer', $data);

    }

    public function add()
    {
        $data['title'] = 'Nama Pegawai';

        echo view('layout/v_header', $data);
        echo view('layout/v_navbar', $data);
        echo view('pegawai/add', $data);
        echo view('layout/v_footer', $data);
    }

    public function detail($nip){
        $model = new MPegawai;
        $data['tittle'] = 'Detail Mahasiswa';
        $data['getMahasiswa'] = $model->getPegawai($nip);
        echo view('layout/v_header', $data);
        echo view('layout/v_navbar', $data);
        echo view('pegawai/index', $data); //ngirim data ke view mahasiswa
        echo view('layout/v_footer', $data);
    }

    public function save(){
        $model = new MPegawai;

        // //////////
        if (!$this->validate([
            'nip' => ['label' => 'nip', 'rules' => 'required|exact_length[9]|is_unique[tbl_pegawai.nip]'],
            'nama' => ['label' => 'nama', 'rules' => 'required|alpha_space|max_length[50]'],
            'gender' => ['label' => 'gender', 'rules' => 'required'],
            'telepon' => ['label' => 'telepon', 'rules' => 'required|min_length[9]|max_length[15]|numeric|is_unique[tbl_pegawai.telepon]'],
            'email' => ['label' => 'email', 'rules' => 'required|min_length[5]|valid_email|is_unique[tbl_pegawai.email]'],
            'pendidikan' => ['label' => 'pendidikan', 'rules' => 'required'],
        ])) {
            session()->setFlashdata('msg', $this->validator->listErrors());
            return redirect()->back()->withInput();
            // echo view('validation_form', ['validation' => $this->validator]);
            // echo view('pegawai/add', ['validation' => $this->validator]);
            // echo $this->validator->listErrors();
        } else {
            $data = array(
                'nip' => $this->request->getPost('nip'),
                'nama' => $this->request->getPost('nama'),
                'gender' => $this->request->getPost('gender'),
                'telepon' => $this->request->getPost('telepon'),
                'email' => $this->request->getPost('email'),
                'pendidikan' => $this->request->getPost('pendidikan')
            );
            $model->savePegawai($data);
            echo '<script>
                    alert("Selamat! Berhasil Menambah Data Pegawai");
                    window.location="' . base_url('pegawai') . '"
                </script>';
        }
        
    }

    public function edit($id){
        $model = new MPegawai;
        $data['title'] = 'Data Pegawai - Edit';
        $data['getPegawai'] = $model->getPegawai($id);

        echo view('layout/v_header', $data);
        echo view('layout/v_navbar');
        echo view('pegawai/edit', $data);
        echo view('layout/v_footer');
    }

    public function update(){
        $model = new MPegawai;

        $data = array(
            'id' => $this->request->getPost('id'),
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
            'gender' => $this->request->getPost('gender'),
            'telepon' => $this->request->getPost('telepon'),
            'email' => $this->request->getPost('email'),
            'pendidikan' => $this->request->getPost('pendidikan')
        );
        $model->updatePegawai($data);

        echo '<script>
                alert("Selamat! Berhasil Mengubah Data Pegawai");
                window.location="' . base_url('pegawai') . '"
            </script>';
    }


    public function delete($id){
        $model = new MPegawai;
        $model->delete($id);
        echo '<script>
                alert("Selamat! Berhasil Menghapus Data Pegawai");
                window.location="' . base_url('pegawai') . '"
            </script>';
    }
}

