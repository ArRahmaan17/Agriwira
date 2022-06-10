<?php

namespace App\Controllers;

use App\Models\ModelPegawai;

class Home extends BaseController
{
    public function __construct()
    {
        $this->pegawai = new ModelPegawai();
    }
    public function reset()
    {
        $db = db_connect();
        $db->query("UPDATE pegawai set status_login = '0' ");
        return redirect()->to(base_url());
    }
    public function logout()
    {
        $db = db_connect();
        $dataLogin =  $this->pegawai->where(['email' => session()->get('email'), 'role' => 'admin', 'status_login' => '1'])->first();
        $online = $this->pegawai->where(['role' => 'admin', 'status_login' => '1'])->findAll();
        if (count($online) > 1) {
            $db->query("UPDATE pegawai set status_login = '0' WHERE id_pegawai = " . $dataLogin['id_pegawai']);
        } else {
            $db->query("UPDATE pegawai set status_login = '0'");
        }
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to(base_url());
    }
    public function index()
    {
        $db = db_connect();
        $session = \Config\Services::session();
        $login = $this->request->getVar('login');
        if ($login) {
            $email = $this->request->getVar('inputEmail');
            $password = $this->request->getVar('inputPassword');
            $dataLogin =  $this->pegawai->where(['email' => $email, 'status_login' => '0'])->first();
            if ($dataLogin == null) {
                $error = "User Tidak Tersedia";
                $session->setFlashdata('email', $email);
                $session->setFlashdata('error', $error);
                return redirect()->to(base_url());
            } elseif ($dataLogin['password'] !== $password) {
                $error = "Password Tidak Sesuai";
                $session->setFlashdata('email', $email);
                $session->setFlashdata('error', $error);
                return redirect()->to(base_url());
            } elseif ($dataLogin['role'] == 'admin') {
                $db->query("UPDATE pegawai set status_login = '1' WHERE id_pegawai = " . $dataLogin['id_pegawai']);
                $dataLogin =  $this->pegawai->where(['id_pegawai' => $dataLogin['id_pegawai'], 'nama_pegawai' => $dataLogin['nama_pegawai'], 'status_login' => '1'])->first();
                $session->set($dataLogin);
                return redirect()->to(base_url('/admindashboard'));
            } else {
               $db->query("UPDATE pegawai set status_login = '1' WHERE id_pegawai = " . $dataLogin['id_pegawai']);
                $dataLogin =  $this->pegawai->where(['id_pegawai' => $dataLogin['id_pegawai'], 'nama_pegawai' => $dataLogin['nama_pegawai'], 'status_login' => '1'])->first();
                $session->set($dataLogin);
                return redirect()->to(base_url('/dashboard'));  
            }
        }
        return view('allin/login_view', [
            'title' => 'Login Pegawai',
        ]);
    }
}
