<?php

namespace App\Controllers;

use App\Models\NIPModel;
use App\Models\UserModel;

class Auth extends BaseController
{

     public function login()
     {
          if (session()->has('logged_in')) {
               return redirect()->to('home');
          }

          $data = [
               'title' => 'Login - SPRK'
          ];

          // Jika ada request form post lakukan proses ini
          if ($this->request->getPost()) {
               $userModel = new UserModel();

               // Cek username ada dalam database atau tidak
               if ($userModel->where(['username' => $this->request->getPost('username')])->first()) {

                    // Deklarasi data user ke dalam variabel
                    $userData = $userModel->where(['username' => $this->request->getPost('username')])->first();
                    $userData = $userData->toArray();
                    $userData['created_at'] = $userData['created_at']->toDateTimeString();
                    $userData['updated_at'] = $userData['updated_at']->toDateTimeString();


                    // Cek kembali apakah password yang di input sama dengan di database
                    // Password di database sudah di hash
                    if (password_verify($this->request->getPost('password'), $userData['password'])) {

                         // Jika username dan password sesuai dengan yang ada di database
                         // Simpan ke dalam session
                         $userData['logged_in'] = true;
                         session()->set($userData);

                         // Alihkan ke halaman dashboard
                         return redirect()->to(base_url('/home'));

                         // Jika password salah alihkan kembali ke halaman login
                    } else {
                         session()->setFlashdata('error', 'Wrong password');
                         return redirect()->to(base_url('login'));
                    }

                    // jika tidak alihkan kembali ke halaman login
               } else {

                    session()->setFlashdata('error', 'Wrong username');
                    return redirect()->back();
               }
          }

          return view('auth/index', $data);
     }

     //--------------------------------------------------------------------

     public function register()
     {
          if (session()->has('logged_in')) {
               return redirect()->to('home');
          }

          $data = [
               'title' => 'Register - SPRK',
               'validation' => $this->validator
          ];

          // Jika terdapat request post dari form lakukan proses ini
          if ($this->request->getPost()) {

               // Cek validasi input
               if ($this->validator->run($this->request->getPost(), 'register')) {

                    // Cek NIP apakah tersedia di database
                    $nip = new NIPModel();
                    if ($nip->where(['nip' => $this->request->getPost('nip')])->first()) {

                         $userEntity = new \App\Entities\User($this->request->getPost());


                         $userModel = new UserModel();

                         // Masukkan data ke dalam database
                         $userModel->insert($userEntity);

                         // Jika input NIP tersedia simpan data ke dalam database tabel user
                         session()->setFlashdata('success', 'Berhasil mendaftar');
                         return redirect()->to(base_url('login'));

                         // Jika NIP tidak terdaftar di database alihkan kembalike halaman register
                    } else {
                         session()->setFlashdata('error', 'NIP yang anda masukkan salah');
                         return redirect()->back();
                    }

                    // Jika validasi gagal alihkan kembali ke halaman register
               } else {
                    return redirect()->back()->withInput();
               }
          }

          return view('auth/register', $data);
     }


     public function logout()
     {
          session()->destroy();

          return redirect()->to(base_url('login'));
     }
}
