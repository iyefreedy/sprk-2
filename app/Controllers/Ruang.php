<?php

namespace App\Controllers;

use App\Models\RuangModel;
use CodeIgniter\API\ResponseTrait;

class Ruang extends BaseController
{
     use ResponseTrait;

     public function index()
     {
          $data = [
               'title' => 'Jadwal Ruang - SPRK'
          ];
          return view('ruang/index', $data);
     }

     public function pinjamRuang()
     {

          if ($this->request->getPost()) {

               $data = $this->request->getPost();
               if ($this->validator->run($data, 'ruang')) {
                    $proposal = $this->request->getFile('proposal');

                    if ($proposal->getError() != 4) {
                         $proposal->move('proposal', $proposal->getName());
                         $data['proposal'] = $proposal->getName();
                    }

                    $ruangModel = new RuangModel();
                    $ruangModel->save($data);
                    session()->setFlashdata('success', 'Berhasil mengajukan peminjaman ruangan');
                    return redirect()->to('/ruang');
               } else {
                    return redirect()->back()->withInput();
               }
          }
          $data = [
               'title' => 'Pinjam Ruang - SPRK',
               'validator' => $this->validator
          ];


          return view('ruang/pinjam_ruang', $data);
     }

     public function menunggu()
     {
          $ruangModel = new RuangModel();
          if ($this->request->getGet('id')) {
               $ruang = $ruangModel->find($this->request->getGet('id'));

               return $this->respond($ruang);
          }

          $data = [
               'title' => 'Jadwal Ruangan - SPRK',
               'ruang' => $ruangModel->where('status', 'MENUNGGU')->orderBy('created_at', 'desc')->findAll()
          ];

          return view('ruang/menunggu', $data);
     }
}
