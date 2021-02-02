<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Dashboard - SPRK'
		];

		return view('home/index', $data);
	}

	//--------------------------------------------------------------------

	public function profile()
	{
		$data = [
			'title' => 'Profile - SPRK',
			'validator' => $this->validator,
		];

		// Lakukan proses ini jika ada form request post
		if ($this->request->getPost()) {

			$data = $this->request->getPost();

			// Cek validasi input
			if ($this->validator->run($this->request->getPost(), 'profile')) {
				$image = $this->request->getFile('photo');
				$oldImage = $this->request->getPost('old_image');

				// Cek apakah ada file gambar yang di upload
				if ($image->getError() != 4) {

					// Jika ada file yang di upload
					$data['photo'] = $image->getRandomName();
					$image->move('img', $data['photo']);
					// Hapus gambbar sebelumnya yang ada di file server
					if ($oldImage != 'default.jpg') {
						unlink('img/' . $oldImage);
					}
				} else {
					$data['photo'] = $oldImage;
				}

				$userModel = new UserModel();
				unset($data['old_image']);
				$userModel->update(session()->get('id'), $data);
				$user = $userModel->find(session()->get('id'));
				$user = $user->toArray();
				$user['created_at'] = $user['created_at']->toDateTimeString();
				$user['updated_at'] = $user['updated_at']->toDateTimeString();
				$user['logeed_in'] = true;
				// Update session user karna telah melakukan perubahan pada profil nya
				session()->set($user);

				session()->setFlashdata('success', 'Profil berhasil di ubah');
				return redirect()->to(base_url('home'));
			} else {
				return redirect()->back()->withInput();
			}
		}

		return view('home/profile', $data);
	}
}
