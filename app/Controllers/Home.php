<?php namespace App\Controllers;
use App\Models\Project_model;

class Home extends BaseController
{
	public function index()
	{
		$project_model = new Project_model();
		
		$data['dataweb'] = $project_model->getDataLevel('Web');
		$data['datadesain'] = $project_model->getDataLevel('Desain');
		$data['config'] = $this->settings;
		$data['pesan_gagal'] = $this->session->getFlashdata('inputs');
		$data['error_gagal'] = $this->session->getFlashdata('errors');
		$data['pesan_berhasil'] = $this->session->getFlashdata('success');

		echo view('pages/header', $data);
		echo view('pages/home', $data);
		echo view('pages/footer', $data);
	}

	// Kirim Pesan di Contact
	public function contact()
	{
		$nama = esc($this->request->getPost('nama'));
		$subject = esc($this->request->getPost('subject'));
        $email = esc($this->request->getPost('email'));
        $pesan = esc($this->request->getPost('pesan'));

        $data = [
        	'nama' => $nama,
        	'subject' => $subject,
            'email' => $email,
            'pesan' => $pesan
        ];

        if($this->form_validation->run($data, 'kontak') == FALSE){
            // mengembalikan nilai input yang sudah dimasukan sebelumnya
            $this->session->setFlashdata('inputs', $this->request->getPost());
            // memberikan pesan error pada saat input data
            $this->session->setFlashdata('errors', $this->form_validation->getErrors());
            // kembali ke halaman form
            return redirect()->to(base_url());
        } else {
        	$this->email->setTo($this->settings->email);
			$this->email->setSubject('iVenden - '.$subject);
			$this->email->setMessage('<p>Dari '.$nama.' ('.$email.'),</p><p>'.$pesan.'</p>');

			if ($this->email->send()) {
				$this->session->setFlashdata('success', 'Kirim Pesan berhasil!');
				// kembali ke halaman utama
				return redirect()->to(base_url());
			} else {
	            // memberikan pesan error pada saat input data
	            $this->session->setFlashdata('errors', 'Email gagal terkirim! Error : '.$this->email->printDebugger());
	            // memberikan data input
	            $this->session->setFlashdata('inputs', $this->request->getPost());
	            // kembali ke halaman form
	            return redirect()->to(base_url());
			}
        }
	}
}
