<?php namespace App\Controllers;
use App\Models\Project_model;
use App\Models\Admin_model;
use App\Models\Safelink_model;
use CodeIgniter\HTTP\Files\UploadedFile;

class Admin extends BaseController
{
	public function index()
	{
		// Check Login Here
		if ($this->session->has('logProjectd') === false) {
			return redirect()->to(base_url());
		}

		/**
		* Load Module
		*/
		$project_model = new Project_model();
		$Safelink_model = new Safelink_model();

		$data['datasafelink'] = $Safelink_model->getData();
		$data['data'] = $project_model->getData();
		$data['config'] = $this->settings;
		$data['recaptchaWidget'] = $this->recaptcha->getWidget();
		$data['recaptchaScript'] = $this->recaptcha->getScriptTag();
		$data['pesan_gagal'] = $this->session->getFlashdata('inputs');
		$data['error_gagal'] = $this->session->getFlashdata('errors');
		$data['pesan_berhasil'] = $this->session->getFlashdata('success');

		$data['errlog'] = $this->session->getFlashdata('errlog');

		echo view('admin/header', $data);
		echo view('admin/home', $data);
		echo view('admin/footer', $data);
	}

	// Login
	public function login()
	{
		// Check Login Here
		if ($this->session->has('logProjectd') === true) {
			return redirect()->to(base_url('projectd'));
		}

		$admin_model = new Admin_model();

		$username = esc($this->request->getPost('username'));
		$password = esc($this->request->getPost('password'));
        $remember = esc($this->request->getPost('remember'));
        $captcha = $this->request->getPost('g-recaptcha-response');

        $validationForm = [
        	'username' => $username,
        	'password' => $password
        ];

        if($this->form_validation->run($validationForm, 'login') == FALSE){
            // memberikan pesan error pada saat input data
            $this->session->setFlashdata('errlog', $this->form_validation->getErrors());
            // kembali ke halaman form
            return redirect()->to(base_url());
        } else {
        	$response = $this->recaptcha->verifyResponse($captcha);
        	if (isset($response['success']) AND $response['success'] === true) {
				/**
				* Success Verify Anti Bot
				*/

				$Login = $admin_model->resolveLogin($username, $password);

				if ($Login) {
					// Create Session Login
					$this->session->set('logProjectd', true);

					if (isset($remember) AND $remember == 'rememberme') {
						$this->session->markAsTempdata('logProjectd', 604800);
					} else {
						$this->session->markAsTempdata('logProjectd', 10800);
					}

					// Create Flashdata
					$this->session->setFlashdata('successlog', 'Login Berhasil!');
					// kembali ke halaman utama
					return redirect()->to(base_url('projectd'));
				} else {
					// memberikan pesan error pada saat input data
		        	$this->session->setFlashdata('errlog', 'Login Gagal!');
		        	// kembali ke halaman form
		        	return redirect()->to(base_url());
				}
        	} else {
        		// memberikan pesan error pada saat input data
		        $this->session->setFlashdata('errlog', 'Captcha gagal!');
		        // kembali ke halaman form
		        return redirect()->to(base_url());
        	}
        }
	}

	// Logout
	public function logout()
	{
		$this->session->destroy();
		// kembali ke halaman form
		return redirect()->to(base_url());
	}

	// Save Data
	public function simpan()
	{
		// Check Login Here
		if ($this->session->has('logProjectd') === false) {
			return redirect()->to(base_url());
		}

		/**
		* Load Module
		*/
		$project_model = new Project_model();

		$path = FCPATH.'uploads';
		$file = new \CodeIgniter\Files\File($path);

		$kodeP = esc($this->request->getPost('kode'));
		$namaP = esc($this->request->getPost('nama'));
        $mulaiP = esc($this->request->getPost('mulai'));
        $selesaiP = esc($this->request->getPost('selesai'));
        $folderP = esc($this->request->getPost('folder'));
        $levelP = esc($this->request->getPost('level'));
        $captcha = $this->request->getPost('g-recaptcha-response');
        $gambarP = $this->request->getFile('gambar');

        $randomNamaGambar = $gambarP->getRandomName();

        $validationForm = [
        	'kode' => $kodeP,
        	'nama' => $namaP,
        	'mulai' => $mulaiP,
            'selesai' => $selesaiP,
            'folder' => $folderP,
            'level' => $levelP,
            'gambar' => $randomNamaGambar
        ];

        if($this->form_validation->run($validationForm, 'simpanproject') == FALSE){
            // mengembalikan nilai input yang sudah dimasukan sebelumnya
            $this->session->setFlashdata('inputs', $this->request->getPost());
            // memberikan pesan error pada saat input data
            $this->session->setFlashdata('errors', $this->form_validation->getErrors());
            // kembali ke halaman form
            return redirect()->to(base_url('projectd'));
        } else {
        	$response = $this->recaptcha->verifyResponse($captcha);
        	if (isset($response['success']) AND $response['success'] === true) {
				/**
				* Success Verify Anti Bot
				*/
				// Apa yang mau disimpan
				$data = [
			        'kode_project' => $kodeP,
			       	'nama_project' => $namaP,
			       	'mulai_project' => $mulaiP,
			        'selesai_project' => $selesaiP,
			        'folder_project' => $folderP,
			        'gambar_project' => $randomNamaGambar,
			        'level_project' => $levelP
			    ];

				$simpan = $project_model->saveData($data);
					
				if ($simpan) {
					if($gambarP->move($path, $randomNamaGambar)){
						$this->session->setFlashdata('success', 'Simpan Data Berhasil!');
						// kembali ke halaman utama
						return redirect()->to(base_url('projectd'));
					} else {
						// memberikan pesan error pada saat input data
				        $this->session->setFlashdata('errors', 'Upload gambar gagal!');
				        // memberikan data input
				        $this->session->setFlashdata('inputs', $this->request->getPost());
				        // kembali ke halaman form
				        return redirect()->to(base_url('projectd'));
					}
				} else {
					// memberikan pesan error pada saat input data
					$this->session->setFlashdata('errors', 'Simpan Data Gagal!');
					// kembali ke halaman form
					return redirect()->to(base_url('projectd'));
				}
        	} else {
        		// memberikan pesan error pada saat input data
		        $this->session->setFlashdata('errors', 'Captcha gagal!');
		        // memberikan data input
		        $this->session->setFlashdata('inputs', $this->request->getPost());
		        // kembali ke halaman form
		        return redirect()->to(base_url('projectd'));
        	}
        }
	}

	// Update Data
	public function ubah()
	{
		// Check Login Here
		if ($this->session->has('logProjectd') === false) {
			return redirect()->to(base_url());
		}

		/**
		* Load Module
		*/
		$project_model = new Project_model();

		$path = FCPATH.'uploads';
		$file = new \CodeIgniter\Files\File($path);

		$kodeP = esc($this->request->getPost('kode'));
		$namaP = esc($this->request->getPost('nama'));
        $mulaiP = esc($this->request->getPost('mulai'));
        $selesaiP = esc($this->request->getPost('selesai'));
        $folderP = esc($this->request->getPost('folder'));
        $levelP = esc($this->request->getPost('level'));
        $captcha = $this->request->getPost('g-recaptcha-response');
        $gambarP = $this->request->getFile('gambar');

        $randomNamaGambar = $gambarP->getRandomName();

        $z = $project_model->getData($kodeP)->getRow();
		$nama_gambar = $z->gambar_project;

        $validationForm = [
        	'kode' => $kodeP,
        	'nama' => $namaP,
        	'mulai' => $mulaiP,
            'selesai' => $selesaiP,
            'folder' => $folderP,
            'level' => $levelP,
            'gambar' => $randomNamaGambar
        ];

        if($this->form_validation->run($validationForm, 'updateproject') == FALSE){
            // mengembalikan nilai input yang sudah dimasukan sebelumnya
            $this->session->setFlashdata('inputs', $this->request->getPost());
            // memberikan pesan error pada saat input data
            $this->session->setFlashdata('errors', $this->form_validation->getErrors());
            // kembali ke halaman form
            return redirect()->to(base_url('projectd'));
        } else {
        	$response = $this->recaptcha->verifyResponse($captcha);
        	if (isset($response['success']) AND $response['success'] === true) {
				/**
				* Success Verify Anti Bot
				*/
				// Apa yang mau diupdate
				$data = [
					'nama_project' => $namaP,
			       	'mulai_project' => $mulaiP,
			       	'selesai_project' => $selesaiP,
			       	'folder_project' => $folderP,
			       	'gambar_project' => $randomNamaGambar,
			       	'level_project' => $levelP
			    ];

				$update = $project_model->updateData($data, $kodeP);
					
				if ($update) {
					if($gambarP->move($path, $randomNamaGambar)){
						$this->session->setFlashdata('success', 'Update Data Berhasil!');
						if ($nama_gambar != 'gambar.jpg') {
							unlink($path.'/'.$nama_gambar);
						}
						// kembali ke halaman utama
						return redirect()->to(base_url('projectd'));
					} else {
						// memberikan pesan error pada saat input data
				        $this->session->setFlashdata('errors', 'Upload gambar gagal!');
				        // memberikan data input
				        $this->session->setFlashdata('inputs', $this->request->getPost());
				        // kembali ke halaman form
				        return redirect()->to(base_url('projectd'));
					}
				} else {
		            // memberikan pesan error pada saat input data
		            $this->session->setFlashdata('errors', 'Update Data Gagal!');
		            // kembali ke halaman form
		            return redirect()->to(base_url('projectd'));
				}
        	} else {
        		// memberikan pesan error pada saat input data
		        $this->session->setFlashdata('errors', 'Captcha gagal!');
		        // memberikan data input
		        $this->session->setFlashdata('inputs', $this->request->getPost());
		        // kembali ke halaman form
		        return redirect()->to(base_url('projectd'));
        	}
        }
	}

	// Delete Data
	public function hapus($id)
	{
		// Check Login Here
		if ($this->session->has('logProjectd') === false) {
			return redirect()->to(base_url());
		}

		/**
		* Load Module
		*/
		$project_model = new Project_model();

		$path = FCPATH.'uploads';
		$file = new \CodeIgniter\Files\File($path);

		$z = $project_model->getData($id)->getRow();
		$nama_gambar = $z->gambar_project;
		$hapus = $project_model->deleteData($id);
		
		if ($hapus) {
			$this->session->setFlashdata('success', 'Hapus Data Berhasil!');
			if ($nama_gambar != 'gambar.jpg') {
				unlink($path.'/'.$nama_gambar);
			}
			// kembali ke halaman utama
			return redirect()->to(base_url('projectd'));
		} else {
            // memberikan pesan error pada saat input data
            $this->session->setFlashdata('errors', 'Hapus Data Gagal!');
            // kembali ke halaman form
            return redirect()->to(base_url('projectd'));
		}
	}

	public function tambah()
	{
		// Check Login Here
		if ($this->session->has('logProjectd') === false) {
			return redirect()->to(base_url());
		}

		$data['config'] = $this->settings;
		$data['recaptchaWidget'] = $this->recaptcha->getWidget();
		$data['recaptchaScript'] = $this->recaptcha->getScriptTag();

		echo view('admin/header', $data);
		echo view('admin/add', $data);
		echo view('admin/footer', $data);
	}

	// Detail Data
	public function detail($id)
	{
		// Check Login Here
		if ($this->session->has('logProjectd') === false) {
			return redirect()->to(base_url());
		}

		/**
		* Load Module
		*/
		$project_model = new Project_model();
		
		$data['data'] = $project_model->getData($id)->getRow();
		$data['config'] = $this->settings;
		$data['recaptchaWidget'] = $this->recaptcha->getWidget();
		$data['recaptchaScript'] = $this->recaptcha->getScriptTag();

		echo view('admin/header', $data);
		echo view('admin/detail', $data);
		echo view('admin/footer', $data);
	}
}
