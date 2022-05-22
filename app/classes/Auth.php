<?php

namespace App\Classes;

header('Access-Control-Allow-Origin:*');

class Auth
{
    private $auth;

    public function __construct()
    {
        $this->auth = new Database();
    }

    public function index()
    {
        if (isset($_SESSION['id_pengguna'])) {
            redirect('Dashboard');
        }
        $title = 'Sitem Pakar Mendiagnosis pada masa kehamilan';
        return view('login', compact('title'));
    }

    public function cek_login()
    {
        $input = post($_POST);
        $email = $input['email'];
        $password = $input['password'];
        $user = $this->auth->get("SELECT * from tb_pengguna WHERE email = '$email'");
        if ($user) {
            if ($user->status != '1') {
                $data['msg'] = 'Email atau password tidak ditemukan !';
                $data['title'] = 'Login Failed ';
                $data['login_status'] = 0;
            } else {
                if (password_verify($password, $user->password)) :
                    $emailPengguna = $user->email;
                    $nama = $user->nama_lengkap;
                    $type = $user->tipe;
                    
                    $data['title'] = 'Login Success';
                    $data['msg'] = 'Data ditemukan';
                    $data['login_status'] = 1;
                    if($type == '3'){
                        $data['page'] = 'Diagnosis';
                    }else{
                        $data['page'] = 'Dashboard';
                    }
                    session_set('emailPengguna', $emailPengguna);
                    session_set('nama', $nama);
                    session_set('type', $type);
                else :
                    $data['msg'] = 'Email atau password tidak ditemukan !';
                    $data['title'] = 'Login Failed ';
                    $data['login_status'] = 0;
                endif;
            }
        } else {
            $data['msg'] = 'Email atau password tidak ditemukan !';
            $data['title'] = 'Login Failed ';
            $data['login_status'] = 0;
        }

        echo json_encode($data);
    }

    public function register()
    {
        $title = 'Registrasi Akun';
        return view('register', compact('title'));
    }

    public function proses_register()
    {
        $input = post($_POST);
        $nama = $input['nama_lengkap'];
        $email = $input['email'];
        $password = $input['password'];

       // cek duplikasi email
        $cek_email = $this->auth->get("SELECT * from tb_pengguna WHERE email = '$email'");
        if ($cek_email) {
            $data['msg'] = 'Email sudah terdaftar !';
            $data['title'] = 'Registrasi Failed ';
            $data['status'] = 0;
        } else {
            $data['msg'] = 'Registrasi berhasil! Silakan melakukan login';
            $data['title'] = 'Registrasi Success ';
            $data['status'] = 1;
            $data['page'] = 'Auth';
            // insert
            $password = password_hash($password, PASSWORD_DEFAULT);
            $this->auth->insert("INSERT INTO tb_pengguna (nama_lengkap, email, `password`, tipe, `status`) VALUES ('$nama', '$email', '$password', '3', 1)");
        }
        echo json_encode($data);
        die;
    }
    public function logout()
    {
        session_del('emailPengguna');
        session_del('nama');
        session_del('type');
        session_destroy();
        redirect('Auth');
    }
}
