<?php namespace App\Controllers;
use App\Models\Safelink_model;

class Safelink extends BaseController
{
	public function index()
	{
		/**
		* Load Module
		*/
		$Safelink_model = new Safelink_model();

		$data['data'] = $Safelink_model->getData();
		$data['config'] = $this->settings;
		$data['recaptchaWidget'] = $this->recaptcha->getWidget();
		$data['recaptchaScript'] = $this->recaptcha->getScriptTag();
		$data['pesan_gagal'] = $this->session->getFlashdata('inputs');
		$data['error_gagal'] = $this->session->getFlashdata('errors');
		$data['pesan_berhasil'] = $this->session->getFlashdata('success');

		$data['errlog'] = $this->session->getFlashdata('errlog');

		echo view('link/header', $data);
		echo view('link/home', $data);
		echo view('link/footer', $data);
	}

	public function goLink($slug)
	{
		/**
		* Load Module
		*/
		$Safelink_model = new Safelink_model();

		$data = $Safelink_model->goLink($slug);

		if ($data) {
			//var_dump($data);
			$hitssekarang = $data->hits_safelink;
			$update = $Safelink_model->CounterSafelink($hitssekarang, $slug);
			
			if ($update) {
				return redirect()->to($data->url_safelink);
			} else {
				// 404 Page
				throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
			}
		} else {
			// 404 Page
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}

	// Save Data
	public function simpan()
	{
		/**
		* Load Module
		*/
		$Safelink_model = new Safelink_model();

		$namaP = esc($this->request->getPost('nama'));
        $slugP = esc($this->request->getPost('slug'));
        $urlP = esc($this->request->getPost('url'));
        $captcha = $this->request->getPost('g-recaptcha-response');

        $validationForm = [
        	'nama' => $namaP,
        	'slug' => $slugP,
            'url' => $urlP
        ];

        if($this->form_validation->run($validationForm, 'safelink') == FALSE){
            // mengembalikan nilai input yang sudah dimasukan sebelumnya
            $this->session->setFlashdata('inputs', $this->request->getPost());
            // memberikan pesan error pada saat input data
            $this->session->setFlashdata('errors', $this->form_validation->getErrors());
            // kembali ke halaman form
            return redirect()->to(base_url('link'));
        } else {
        	$response = $this->recaptcha->verifyResponse($captcha);
        	if (isset($response['success']) AND $response['success'] === true) {
				/**
				* Success Verify Anti Bot
				*/
				// Apa yang mau disimpan
				$data = [
			        'kode_safelink' => NULL,
			       	'nama_safelink' => $namaP,
			       	'slug_safelink' => url_title($namaP),
			        'url_safelink' => $urlP,
			        'hits_safelink' => NULL,
			        'created_safelink' => now()
			    ];

				$simpan = $Safelink_model->saveData($data);
					
				if ($simpan) {
					$this->session->setFlashdata('success', 'Simpan Data Berhasil!');
					// kembali ke halaman utama
					return redirect()->to(base_url('link'));
				} else {
					// memberikan pesan error pada saat input data
					$this->session->setFlashdata('errors', 'Simpan Data Gagal!');
					// kembali ke halaman form
					return redirect()->to(base_url('link'));
				}
        	} else {
        		// memberikan pesan error pada saat input data
		        $this->session->setFlashdata('errors', 'Captcha gagal!');
		        // memberikan data input
		        $this->session->setFlashdata('inputs', $this->request->getPost());
		        // kembali ke halaman form
		        return redirect()->to(base_url('link'));
        	}
        }
	}

	// Update Data
	public function ubah()
	{
		/**
		* Load Module
		*/
		$Safelink_model = new Safelink_model();

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

        $z = $Safelink_model->getData($kodeP)->getRow();
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
            return redirect()->to(base_url('link'));
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

				$update = $Safelink_model->updateData($data, $kodeP);
					
				if ($update) {
					if($gambarP->move($path, $randomNamaGambar)){
						$this->session->setFlashdata('success', 'Update Data Berhasil!');
						if ($nama_gambar != 'gambar.jpg') {
							unlink($path.'/'.$nama_gambar);
						}
						// kembali ke halaman utama
						return redirect()->to(base_url('link'));
					} else {
						// memberikan pesan error pada saat input data
				        $this->session->setFlashdata('errors', 'Upload gambar gagal!');
				        // memberikan data input
				        $this->session->setFlashdata('inputs', $this->request->getPost());
				        // kembali ke halaman form
				        return redirect()->to(base_url('link'));
					}
				} else {
		            // memberikan pesan error pada saat input data
		            $this->session->setFlashdata('errors', 'Update Data Gagal!');
		            // kembali ke halaman form
		            return redirect()->to(base_url('link'));
				}
        	} else {
        		// memberikan pesan error pada saat input data
		        $this->session->setFlashdata('errors', 'Captcha gagal!');
		        // memberikan data input
		        $this->session->setFlashdata('inputs', $this->request->getPost());
		        // kembali ke halaman form
		        return redirect()->to(base_url('link'));
        	}
        }
	}

	// Delete Data
	public function hapus($id)
	{
		/**
		* Load Module
		*/
		$Safelink_model = new Safelink_model();

		$path = FCPATH.'uploads';
		$file = new \CodeIgniter\Files\File($path);

		$hapus = $Safelink_model->deleteData($id);
		
		if ($hapus) {
			$this->session->setFlashdata('success', 'Hapus Data Berhasil!');
			// kembali ke halaman utama
			return redirect()->to(base_url('link'));
		} else {
            // memberikan pesan error pada saat input data
            $this->session->setFlashdata('errors', 'Hapus Data Gagal!');
            // kembali ke halaman form
            return redirect()->to(base_url('link'));
		}
	}

	public function tambah()
	{
		$data['config'] = $this->settings;
		$data['recaptchaWidget'] = $this->recaptcha->getWidget();
		$data['recaptchaScript'] = $this->recaptcha->getScriptTag();

		echo view('link/header', $data);
		echo view('link/add', $data);
		echo view('link/footer', $data);
	}

	// Detail Data
	public function detail($id)
	{
		/**
		* Load Module
		*/
		$Safelink_model = new Safelink_model();
		
		$data['data'] = $Safelink_model->getData($id)->getRow();
		$data['config'] = $this->settings;
		$data['recaptchaWidget'] = $this->recaptcha->getWidget();
		$data['recaptchaScript'] = $this->recaptcha->getScriptTag();

		echo view('link/header', $data);
		echo view('link/detail', $data);
		echo view('link/footer', $data);
	}
}
