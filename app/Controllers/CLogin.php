<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\MUser;
 
class CLogin extends Controller
{
    public function index()
    {
        helper(['form']);
        $data['tittle'] = 'Login Page';
        echo view('VLogin');
    } 
 
    public function auth()
    {
        $session = session();
        $model = new MUser();

        //INPUT
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');


        $data = $model->where('username LIKE BINARY', $username)->first();
        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);

            if($verify_pass){
                $ses_data = [
                    'id'        => $data['id'],
                    'nama'      => $data['nama'],
                    'username'  => $data['username'],
                    'logged_in' => TRUE
                ];
                //pembuatan session
                $session->set($ses_data);
                return redirect()->to('/home');
            }else{
                $session->setFlashdata('msg', 'PASSWORD SALAH!');
                return redirect()->to('/login');
            }
        }else{
            $session->setFlashdata('msg', 'Username anda salah');
            return redirect()->to('/login');
        }
    }
 
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}