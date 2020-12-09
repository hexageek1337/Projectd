<?php namespace Config;

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
	// Kontak
	public $kontak = [
		'nama' => 'required|alpha_numeric_space',
		'subject' => 'required|alpha_numeric_punct|max_length[30]',
		'email' => 'required|valid_email',
		'pesan' => 'required'
	];

	public $kontak_errors = [
		'nama' => [
			'required' => 'Nama wajib diisi',
			'alpha_numeric_space' => 'Nama hanya boleh diisi dengan huruf, angka dan spasi'
		],
		'subject' => [
			'required' => 'Subject wajib diisi',
			'alpha_numeric_punct' => 'Subject tidak diizinkan',
			'max_length' => 'Subject hanya boleh diisi dengan maksimal 30 karakter'
		],
		'email' => [
			'required' => 'Email wajib diisi',
			'valid_email' => 'Email tidak valid'
		],
		'pesan' => [
			'required' => 'Pesan wajib diisi'
		]
	];

	// Save Project
	public $simpanproject = [
		'kode' => 'required|alpha_numeric|max_length[6]|is_unique[project.kode_project,uuid,{uuid}]',
		'nama' => 'required|alpha_numeric_punct|max_length[80]',
		'mulai' => 'required|valid_date',
		'selesai' => 'required|valid_date',
		'folder' => 'required|alpha_numeric|max_length[30]',
		'level' => 'required|alpha',
		'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,4096]'
	];

	// Update Project
	public $updateproject = [
		'kode' => 'required|alpha_numeric|max_length[6]',
		'nama' => 'required|alpha_numeric_punct|max_length[80]',
		'mulai' => 'required|valid_date',
		'selesai' => 'required|valid_date',
		'folder' => 'required|alpha_numeric|max_length[30]',
		'level' => 'required|alpha',
		'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,4096]'
	];

	// Safelink
	public $safelink = [
		'nama' => 'required|alpha_numeric_punct|min_length[5]|max_length[80]',
		'slug' => 'required|alpha_dash|is_unique[project.slug_safelink,uuid,{uuid}]',
		'url' => 'required|valid_url'
	];

	public $safelink_errors = [
		'nama' => [
			'required'      => 'Nama Safelink wajib diisi',
			'min_length'    => 'Nama Safelink minimal terdiri dari 5 karakter',
			'max_length'    => 'Nama Safelink maksimal terdiri dari 80 karakter'
		],
		'slug' => [
			'required'      => 'Slug Safelink wajib diisi',
			'alpha_dash'    => 'Slug Safelink hanya boleh diisi dengan karakter dan dash (-)',
			'is_unique'      => 'Slug Safelink sudah pernah dipakai'
		],
		'url' => [
			'required'      => 'URL Safelink wajib diisi',
			'valid_url'    => 'URL Safelink tidak valid'
		]
	];
	
	// Login
	public $login = [
		'username' => 'required|alpha_numeric|min_length[5]|max_length[20]',
		'password' => 'required|min_length[8]|max_length[30]'
	];

	public $login_errors = [
		'username' => [
			'required'      => 'Username wajib diisi',
			'alpha_numeric' => 'Username hanya boleh diisi dengan huruf dan angka',
			'min_length'    => 'Username minimal terdiri dari 5 karakter',
			'max_length'    => 'Username maksimal terdiri dari 20 karakter'
		],
		'password' => [
			'required'      => 'Password wajib diisi',
			'min_length'    => 'Password minimal terdiri dari 8 karakter',
			'max_length'    => 'Password maksimal terdiri dari 20 karakter'
		]
	];
}
