<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,

	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $register = [
		'nip' => [
			'label' => 'NIP',
			'rules' => 'required|min_length[8]|is_natural',
			'errors' => [
				'required' => '{field} tidak boleh kosong',
				'is_unique' => '{field} yang anda masukkan tidak valid',
				'min_length' => '{field} terlalu pendek',
			]
		],
		'username' => [
			'label' => 'Username',
			'rules' => 'is_unique[users.username]|min_length[6]',
			'errors' => [
				'required' => '{field} tidak boleh kosong',
				'is_unique' => '{field} sudah terdaftar',
				'min_length' => '{field} terlalu pendek'
			]
		],
		'password' => [
			'label' => 'Password',
			'rules' => 'required|min_length[6]',
			'errors' => [
				'required' => '{field} tidak boleh kosong',
				'min_length' => '{field} terlalu pendek'
			]
		],
		'confirm_password' => [
			'label' => 'Konfirmasi Password',
			'rules' => 'matches[password]',
			'errors' => [
				'matches' => '{field} tidak sama dengan password',
			]
		]
	];

	public $profile = [
		'fullname' => [
			'label' => 'Nama Lengkap',
			'rules' => 'trim|alpha_space',
			'errors' => [
				'alpha_Space' => '{field} tidak boleh mengandung karakter lain selain huruf'
			]
		],
		'email' => [
			'label' => 'Email',
			'rules' => 'trim|valid_email',
			'errors' => [
				'valid_email' => '{field} yang anda masukkan tidak valid'
			]
		],
		'phone' => [
			'label' => 'Nomor Telpon',
			'rules' => 'trim|is_natural',
			'errors' => [
				'is_natural' => '{field} yang anda masukkan tidak sesuai'
			]
		]
	];

	public $ruang = [
		'phone' => [
			'label' => 'Nomor Telepon',
			'rules' => 'is_natural|trim|required',
			'errors' => [
				'is_natural' => '{field} yang anda masukkan tidak valid',
				'required' => '{field} tidak boleh kosong'
			]
		],
		'activity_name' => [
			'label' => 'Nama Kegiatan',
			'rules' => 'required|trim',
			'errors' => [
				'required' => '{field} tidak boleh kosong'
			]
		],
		'activity_type' => [
			'label' => 'Jenis Kegiatan',
			'rules' => 'required|trim',
			'errors' => [
				'required' => 'Silahkan pilih {field}'
			]
		],
		'start_time' => [
			'label' => 'Waktu Mulai',
			'rules' => 'required|trim',
			'errors' => [
				'required' => '{field} tidak boleh kosong'
			]
		],
		'end_time' => [
			'label' => 'Waktu Akhir',
			'rules' => 'required|trim',
			'errors' => [
				'required' => '{field} tidak boleh kosong'
			]
		],
		'involved_party' => [
			'label' => 'Pihak',
			'rules' => 'required|trim',
			'errors' => [
				'required' => 'Silahkan pilih keterlibatan {field}',
			]
		],
		'invitation_number' => [
			'label' => 'Jumlah Undangan',
			'rules' => 'required|trim|greater_than[3]',
			'errors' => [
				'required' => '{field} tidak boleh kosong',
				'greater_than' => '{field} yang terlibat terlalu sedikit'
			]
		],
		'room' => [
			'label' => 'Ruang',
			'rules' => 'required|trim',
			'errors' => [
				'required' => 'Silahkan pilih {field}'
			]
		],
		'proposal' => [
			'label' => 'Proposal',
			'rules' => 'max_size[proposal,5120]|ext_in[proposal,pdf,doc,docx]',
			'errors' => [
				'max_size' => 'Ukuran {field} terlalu besar',
				'ext_in' => 'Tipe file tidak di perbolehkan'
			]
		]
	];
}
