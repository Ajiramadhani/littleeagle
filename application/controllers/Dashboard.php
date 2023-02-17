<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('m_data');

		// cek session yang login, 
		// jika session status tidak sama dengan session telah_login, berarti pengguna belum login
		// maka halaman akan di alihkan kembali ke halaman login.
		if($this->session->userdata('status')!="telah_login"){
			redirect(base_url().'login?alert=belum_login');
		}
	}

	public function index()
	{
		// hitung jumlah artikel
		$data['jumlah_artikel'] = $this->m_data->get_data('artikel')->num_rows();
		// hitung jumlah kategori
		$data['jumlah_kategori'] = $this->m_data->get_data('kategori')->num_rows();
		// hitung jumlah pengguna
		$data['jumlah_pengguna'] = $this->m_data->get_data('pengguna')->num_rows();
		// hitung jumlah halaman
		$data['jumlah_halaman'] = $this->m_data->get_data('halaman')->num_rows();
		// hitung jumlah event
		$data['jumlah_event'] = $this->m_data->get_data('event')->num_rows();

		$data['kategori'] = $this->m_data->get_data('kategori')->result();
		
		$this->load->view('dashboard/v_header',$data);
		$this->load->view('dashboard/v_index',$data);
		$this->load->view('dashboard/v_footer',$data);
	}

	public function keluar()
	{
		$this->session->sess_destroy();
		redirect('login?alert=logout');
	}

	public function ganti_password()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_ganti_password');
		$this->load->view('dashboard/v_footer');
	}

	public function ganti_password_aksi()
	{

		// form validasi
		$this->form_validation->set_rules('password_lama','Password Lama','required');
		$this->form_validation->set_rules('password_baru','Password Baru','required|min_length[8]');
		$this->form_validation->set_rules('konfirmasi_password','Konfirmasi Password Baru','required|matches[password_baru]');

		// cek validasi
		if($this->form_validation->run() != false){

			// menangkap data dari form
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru');
			$konfirmasi_password = $this->input->post('konfirmasi_password');

			// cek kesesuaian password lama dengan id pengguna yang sedang login dan password lama
			$where = array(
				'pengguna_id' => $this->session->userdata('id'),
				'pengguna_password' => md5($password_lama)
			);
			$cek = $this->m_data->cek_login('pengguna', $where)->num_rows();

			// cek kesesuaikan password lama
			if($cek > 0){

				// update data password pengguna
				$w = array(
					'pengguna_id' => $this->session->userdata('id')
				);
				$data = array(
					'pengguna_password' => md5($password_baru)
				);
				$this->m_data->update_data($where, $data, 'pengguna');

				// alihkan halaman kembali ke halaman ganti password
				redirect('dashboard/ganti_password?alert=sukses');
			}else{
				// alihkan halaman kembali ke halaman ganti password
				redirect('dashboard/ganti_password?alert=gagal');
			}

		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_ganti_password');
			$this->load->view('dashboard/v_footer');
		}

	}

	// CRUD KATEGORI
	public function kategori()
	{
		$data['kategori'] = $this->m_data->get_data('kategori')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_kategori',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function kategori_tambah()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_kategori_tambah');
		$this->load->view('dashboard/v_footer');
	}

	public function kategori_aksi()
	{
		$this->form_validation->set_rules('kategori','Kategori','required');

		if($this->form_validation->run() != false){

			$kategori = $this->input->post('kategori');

			$data = array(
				'kategori_nama' => $kategori,
				'kategori_slug' => strtolower(url_title($kategori))
			);

			$this->m_data->insert_data($data,'kategori');

			redirect(base_url().'dashboard/kategori');
			
		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_kategori_tambah');
			$this->load->view('dashboard/v_footer');
		}
	}

	public function kategori_edit($id)
	{
		$where = array(
			'kategori_id' => $id
		);
		$data['kategori'] = $this->m_data->edit_data($where,'kategori')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_kategori_edit',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function kategori_update()
	{
		$this->form_validation->set_rules('kategori','Kategori','required');

		if($this->form_validation->run() != false){

			$id = $this->input->post('id');
			$kategori = $this->input->post('kategori');

			$where = array(
				'kategori_id' => $id
			);

			$data = array(
				'kategori_nama' => $kategori,
				'kategori_slug' => strtolower(url_title($kategori))
			);

			$this->m_data->update_data($where, $data,'kategori');

			redirect(base_url().'dashboard/kategori');
			
		}else{

			$id = $this->input->post('id');
			$where = array(
				'kategori_id' => $id
			);
			$data['kategori'] = $this->m_data->edit_data($where,'kategori')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_kategori_edit',$data);
			$this->load->view('dashboard/v_footer');
		}
	}


	public function kategori_hapus($id)
	{
		$where = array(
			'kategori_id' => $id
		);

		$this->m_data->delete_data($where,'kategori');

		redirect(base_url().'dashboard/kategori');
	}
	// END CRUD KATEGORI

	// CRUD PAKET
	public function paket()
	{
		$data['paket'] = $this->m_data->get_data('paket')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_paket',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function paket_tambah()
	{

		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_paket_tambah');
		$this->load->view('dashboard/v_footer');
	}

	public function paket_aksi()
	{
		$this->form_validation->set_rules('paket_nama','NamaGuru','required');

		// Membuat gambar wajib di isi
		if (empty($_FILES['foto']['name'])){
			$this->form_validation->set_rules('foto', 'FotoGuru', 'required');
		}

		if($this->form_validation->run() != false){

			$config['upload_path']   = './gambar/profil/';
			$config['allowed_types'] = 'jpeg|jpg|png';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {

				// mengambil data tentang gambar
				$gambar = $this->upload->data();

				$foto = $gambar['file_name'];
				$paket_nama = $this->input->post('paket_nama');

				$data = array(
					'paket_nama' => $paket_nama,
					'foto' => $foto,
				);

				$this->m_data->insert_data($data,'paket');

				redirect(base_url().'dashboard/paket');	
				
			} else {

				$this->form_validation->set_message('foto', $data['gambar_error'] = $this->upload->display_errors());
				$this->load->view('dashboard/v_header');
				$this->load->view('dashboard/v_paket_tambah');
				$this->load->view('dashboard/v_footer');
			}
		}
	}

	public function paket_edit($id)
	{
		$where = array(
			'paket_id' => $id
		);
		$data['paket'] = $this->m_data->edit_data($where,'paket')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_paket_edit',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function paket_update()
	{
		$this->form_validation->set_rules('paket_nama','Nama Guru','required');

		if($this->form_validation->run() != false){

			$id = $this->input->post('id');
			$paket_nama = $this->input->post('paket_nama');
			$foto	= $_FILES['foto'];
			if ($foto = '') { } else {
				$config['upload_path']		= './gambar/profil';
				$config['allowed_types']	= 'jpg|png|jpeg';
				$config['overwrite'] 		= true;

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					redirect('dashboard/paket?alert=gagal');
				} else {
					$foto = $this->upload->data('file_name');
				}
			}

			$where = array(
				'paket_id' => $id
			);

			$data = array(
				'paket_nama' => $paket_nama,
				'foto' => $foto
			);

			$this->m_data->update_data($where, $data,'paket');

			redirect(base_url().'dashboard/paket/?alert=sukses');
			
		}else{

			$id = $this->input->post('id');
			$where = array(
				'paket_id' => $id
			);
			$data['paket'] = $this->m_data->edit_data($where,'paket')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_paket_edit',$data);
			$this->load->view('dashboard/v_footer');
		}
	}


	public function paket_hapus($id)
	{
		$where = array(
			'paket_id' => $id
		);

		$this->m_data->delete_data($where,'paket');

		redirect(base_url().'dashboard/paket');
	}
	// END CRUD PAKET

	// CRUD KATA
	public function kata()
	{
		$data['kata'] = $this->m_data->get_data('kata')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_kata',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function kata_tambah()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_kata_tambah');
		$this->load->view('dashboard/v_footer');
	}

	public function kata_aksi()
	{
		$this->form_validation->set_rules('kata_nama','Narasi Video','required');
		$this->form_validation->set_rules('kata_slug','Link','required');
		$this->form_validation->set_rules('kata_width','Width','required');
		$this->form_validation->set_rules('kata_height','Heigth','required');

		if($this->form_validation->run() != false){

			$kata_nama = $this->input->post('kata_nama');
			$kata_slug = $this->input->post('kata_slug');
			$kata_width = $this->input->post('kata_width');
			$kata_height = $this->input->post('kata_height');


			$data = array(
				'kata_nama' => $kata_nama,
				'kata_slug' => $kata_slug,
				'kata_width' => $kata_width,
				'kata_height' => $kata_height

			);

			$this->m_data->insert_data($data,'kata');

			redirect(base_url().'dashboard/kata');
			
		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_kata_tambah');
			$this->load->view('dashboard/v_footer');
		}
	}

	public function kata_edit($id)
	{
		$where = array(
			'kata_id' => $id
		);
		$data['kata'] = $this->m_data->edit_data($where,'kata')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_kata_edit',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function kata_update()
	{
		$this->form_validation->set_rules('kata_nama','Narasi Video','required');
		$this->form_validation->set_rules('kata_slug','Link','required');
		$this->form_validation->set_rules('kata_width','Width','required');
		$this->form_validation->set_rules('kata_height','Heigth','required');

		if($this->form_validation->run() != false){

			$id = $this->input->post('id');
			$kata_nama = $this->input->post('kata_nama');
			$kata_slug = $this->input->post('kata_slug');
			$kata_width = $this->input->post('kata_width');
			$kata_height = $this->input->post('kata_height');

			$where = array(
				'kata_id' => $id
			);

			$data = array(
				'kata_nama' => $kata_nama,
				'kata_slug' => $kata_slug,
				'kata_width' => $kata_width,
				'kata_height' => $kata_height
			);

			$this->m_data->update_data($where, $data,'kata');

			redirect(base_url().'dashboard/kata');
			
		}else{

			$id = $this->input->post('id');
			$where = array(
				'kata_id' => $id
			);
			$data['kata'] = $this->m_data->edit_data($where,'kata')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_kata_edit',$data);
			$this->load->view('dashboard/v_footer');
		}
	}


	public function kata_hapus($id)
	{
		$where = array(
			'kata_id' => $id
		);

		$this->m_data->delete_data($where,'kata');

		redirect(base_url().'dashboard/kata');
	}
	// END CRUD KATA

	// CRUD ARTIKEL
	public function artikel()
	{
		$data['artikel'] = $this->db->query("SELECT * FROM artikel,kategori,pengguna WHERE artikel_kategori=kategori_id and artikel_author=pengguna_id order by artikel_id desc")->result();	
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_artikel',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function artikel_tambah()
	{
		$data['kategori'] = $this->m_data->get_data('kategori')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_artikel_tambah',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function artikel_aksi()
	{
		// Wajib isi judul,konten dan kategori
		$this->form_validation->set_rules('judul','Judul','required|is_unique[artikel.artikel_judul]');
		$this->form_validation->set_rules('konten','Konten','required');
		$this->form_validation->set_rules('kategori','Kategori','required');

		// Membuat gambar wajib di isi
		if (empty($_FILES['sampul']['name'])){
			$this->form_validation->set_rules('sampul', 'Gambar Sampul', 'required');
		}

		if($this->form_validation->run() != false){

			$config['upload_path']   = './gambar/artikel/';
			$config['allowed_types'] = 'jpeg|jpg|png';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('sampul')) {

				// mengambil data tentang gambar
				$gambar = $this->upload->data();

				$tanggal = date('Y-m-d H:i:s');
				$judul = $this->input->post('judul');
				$slug = strtolower(url_title($judul));
				$konten = $this->input->post('konten');
				$sampul = $gambar['file_name'];
				$author = $this->session->userdata('id');
				$kategori = $this->input->post('kategori');
				$status = $this->input->post('status');

				$data = array(
					'artikel_tanggal' => $tanggal,
					'artikel_judul' => $judul,
					'artikel_slug' => $slug,
					'artikel_konten' => $konten,
					'artikel_sampul' => $sampul,
					'artikel_author' => $author,
					'artikel_kategori' => $kategori,
					'artikel_status' => $status,
				);

				$this->m_data->insert_data($data,'artikel');

				redirect(base_url().'dashboard/artikel');	
				
			} else {

				$this->form_validation->set_message('sampul', $data['gambar_error'] = $this->upload->display_errors());

				$data['kategori'] = $this->m_data->get_data('kategori')->result();
				$this->load->view('dashboard/v_header');
				$this->load->view('dashboard/v_artikel_tambah',$data);
				$this->load->view('dashboard/v_footer');
			}

		}else{
			$data['kategori'] = $this->m_data->get_data('kategori')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_artikel_tambah',$data);
			$this->load->view('dashboard/v_footer');
		}
	}


	public function artikel_edit($id)
	{
		$where = array(
			'artikel_id' => $id
		);
		$data['artikel'] = $this->m_data->edit_data($where,'artikel')->result();
		$data['kategori'] = $this->m_data->get_data('kategori')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_artikel_edit',$data);
		$this->load->view('dashboard/v_footer');
	}


	public function artikel_update()
	{
		// Wajib isi judul,konten dan kategori
		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('konten','Konten','required');
		$this->form_validation->set_rules('kategori','Kategori','required');
		
		if($this->form_validation->run() != false){

			$id = $this->input->post('id');

			$judul = $this->input->post('judul');
			$slug = strtolower(url_title($judul));
			$konten = $this->input->post('konten');
			$kategori = $this->input->post('kategori');
			$status = $this->input->post('status');

			$where = array(
				'artikel_id' => $id
			);

			$data = array(
				'artikel_judul' => $judul,
				'artikel_slug' => $slug,
				'artikel_konten' => $konten,
				'artikel_kategori' => $kategori,
				'artikel_status' => $status,
			);

			$this->m_data->update_data($where,$data,'artikel');


			if (!empty($_FILES['sampul']['name'])){
				$config['upload_path']   = './gambar/artikel/';
				$config['allowed_types'] = 'gif|jpg|png';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('sampul')) {

					// mengambil data tentang gambar
					$gambar = $this->upload->data();

					$data = array(
						'artikel_sampul' => $gambar['file_name'],
					);

					$this->m_data->update_data($where,$data,'artikel');

					redirect(base_url().'dashboard/artikel');	

				} else {
					$this->form_validation->set_message('sampul', $data['gambar_error'] = $this->upload->display_errors());
					
					$where = array(
						'artikel_id' => $id
					);
					$data['artikel'] = $this->m_data->edit_data($where,'artikel')->result();
					$data['kategori'] = $this->m_data->get_data('kategori')->result();
					$this->load->view('dashboard/v_header');
					$this->load->view('dashboard/v_artikel_edit',$data);
					$this->load->view('dashboard/v_footer');
				}
			}else{
				redirect(base_url().'dashboard/artikel');	
			}

		}else{
			$id = $this->input->post('id');
			$where = array(
				'artikel_id' => $id
			);
			$data['artikel'] = $this->m_data->edit_data($where,'artikel')->result();
			$data['kategori'] = $this->m_data->get_data('kategori')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_artikel_edit',$data);
			$this->load->view('dashboard/v_footer');
		}
	}

	public function artikel_hapus($id)
	{
		$where = array(
			'artikel_id' => $id
		);

		$this->m_data->delete_data($where,'artikel');

		redirect(base_url().'dashboard/artikel');
	}
	// end crud artikel


	// CRUD EVENT
	public function event()
	{
		$data['event'] = $this->db->query("SELECT * FROM event,kategori,pengguna WHERE event_kategori=kategori_id  and event_author=pengguna_id order by event_id desc")->result();	
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_event',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function event_tambah()
	{
		$data['kategori'] = $this->m_data->get_data('kategori')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_event_tambah',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function event_aksi()
	{
		// Wajib isi judul,konten dan kategori
		$this->form_validation->set_rules('judul','Judul','required|is_unique[event.event_judul]');
		$this->form_validation->set_rules('konten','Konten','required');
		$this->form_validation->set_rules('kategori','Kategori','required');

		// Membuat gambar wajib di isi
		if (empty($_FILES['sampul']['name'])){
			$this->form_validation->set_rules('sampul', 'Gambar Sampul', 'required');
		}

		if($this->form_validation->run() != false){

			$config['upload_path']   = './gambar/event/';
			$config['allowed_types'] = 'jpeg|jpg|png';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('sampul')) {

				// mengambil data tentang gambar
				$gambar = $this->upload->data();

				$tanggal = date('Y-m-d H:i:s');
				$judul = $this->input->post('judul');
				$slug = strtolower(url_title($judul));
				$konten = $this->input->post('konten');
				$sampul = $gambar['file_name'];
				$author = $this->session->userdata('id');
				$kategori = $this->input->post('kategori');
				$status = $this->input->post('status');
				$link = $this->input->post('link');

				$data = array(
					'event_tanggal' => $tanggal,
					'event_judul' => $judul,
					'event_slug' => $slug,
					'event_konten' => $konten,
					'event_sampul' => $sampul,
					'event_author' => $author,
					'event_kategori' => $kategori,
					'event_status' => $status,
					'event_link' => $link,
				);

				$this->m_data->insert_data($data,'event');

				redirect(base_url().'dashboard/event');	
				
			} else {

				$this->form_validation->set_message('sampul', $data['gambar_error'] = $this->upload->display_errors());

				$data['kategori'] = $this->m_data->get_data('kategori')->result();
				$this->load->view('dashboard/v_header');
				$this->load->view('dashboard/v_event_tambah',$data);
				$this->load->view('dashboard/v_footer');
			}

		}else{
			$data['kategori'] = $this->m_data->get_data('kategori')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_event_tambah',$data);
			$this->load->view('dashboard/v_footer');
		}
	}


	public function event_edit($id)
	{
		$where = array(
			'event_id' => $id
		);
		$data['event'] = $this->m_data->edit_data($where,'event')->result();
		$data['kategori'] = $this->m_data->get_data('kategori')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_event_edit',$data);
		$this->load->view('dashboard/v_footer');
	}


	public function event_update()
	{
		// Wajib isi judul,konten dan kategori
		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('konten','Konten','required');
		$this->form_validation->set_rules('kategori','Kategori','required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		
		
		if($this->form_validation->run() != false){

			$id = $this->input->post('id');

			$judul = $this->input->post('judul');
			$slug = strtolower(url_title($judul));
			$konten = $this->input->post('konten');
			$kategori = $this->input->post('kategori');
			$status = $this->input->post('status');
			$link = $this->input->post('link');
			
			$where = array(
				'event_id' => $id
			);

			$data = array(
				'event_judul' => $judul,
				'event_slug' => $slug,
				'event_konten' => $konten,
				'event_kategori' => $kategori,
				'event_status' => $status,
				'event_link' => $link,
			);

			$this->m_data->update_data($where,$data,'event');


			if (!empty($_FILES['sampul']['name'])){
				$config['upload_path']   = './gambar/event/';
				$config['allowed_types'] = 'jpeg|jpg|png';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('sampul')) {

					// mengambil data tentang gambar
					$gambar = $this->upload->data();

					$data = array(
						'event_sampul' => $gambar['file_name'],
					);

					$this->m_data->update_data($where,$data,'event');

					redirect(base_url().'dashboard/event');	

				} else {
					$this->form_validation->set_message('sampul', $data['gambar_error'] = $this->upload->display_errors());
					
					$where = array(
						'event_id' => $id
					);
					$data['event'] = $this->m_data->edit_data($where,'event')->result();
					$data['kategori'] = $this->m_data->get_data('kategori')->result();
					$this->load->view('dashboard/v_header');
					$this->load->view('dashboard/v_event_edit',$data);
					$this->load->view('dashboard/v_footer');
				}
			}else{
				redirect(base_url().'dashboard/event');	
			}

		}else{
			$id = $this->input->post('id');
			$where = array(
				'event_id' => $id
			);
			$data['event'] = $this->m_data->edit_data($where,'event')->result();
			$data['kategori'] = $this->m_data->get_data('kategori')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_event_edit',$data);
			$this->load->view('dashboard/v_footer');
		}
	}

	public function event_hapus($id)
	{
		$where = array(
			'event_id' => $id
		);

		$this->m_data->delete_data($where,'event');

		redirect(base_url().'dashboard/event');
	}
	// end crud event


	// CRUD PAGES
	public function pages()
	{
		$data['halaman'] = $this->m_data->get_data('halaman')->result();	
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pages',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function pages_tambah()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pages_tambah');
		$this->load->view('dashboard/v_footer');
	}

	public function pages_aksi()
	{
		// Wajib isi judul,konten
		$this->form_validation->set_rules('judul','Judul','required|is_unique[halaman.halaman_judul]');
		$this->form_validation->set_rules('konten','Konten','required');

		if($this->form_validation->run() != false){

			$judul = $this->input->post('judul');
			$slug = strtolower(url_title($judul));
			$konten = $this->input->post('konten');

			$data = array(
				'halaman_judul' => $judul,
				'halaman_slug' => $slug,
				'halaman_konten' => $konten
			);

			$this->m_data->insert_data($data,'halaman');

			// alihkan kembali ke method pages
			redirect(base_url().'dashboard/pages');	

		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_pages_tambah');
			$this->load->view('dashboard/v_footer');
		}
	}

	public function pages_edit($id)
	{
		$where = array(
			'halaman_id' => $id
		);
		$data['halaman'] = $this->m_data->edit_data($where,'halaman')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pages_edit',$data);
		$this->load->view('dashboard/v_footer');
	}


	public function pages_update()
	{
		// Wajib isi judul,konten 
		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('konten','Konten','required');
		
		if($this->form_validation->run() != false){

			$id = $this->input->post('id');

			$judul = $this->input->post('judul');
			$slug = strtolower(url_title($judul));
			$konten = $this->input->post('konten');
			
			$where = array(
				'halaman_id' => $id
			);

			$data = array(
				'halaman_judul' => $judul,
				'halaman_slug' => $slug,
				'halaman_konten' => $konten
			);

			$this->m_data->update_data($where,$data,'halaman');

			redirect(base_url().'dashboard/pages');
		}else{
			$id = $this->input->post('id');
			$where = array(
				'halaman_id' => $id
			);
			$data['halaman'] = $this->m_data->edit_data($where,'halaman')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_pages_edit',$data);
			$this->load->view('dashboard/v_footer');
		}
	}

	public function pages_hapus($id)
	{
		$where = array(
			'halaman_id' => $id
		);
		
		$this->m_data->delete_data($where,'halaman');

		redirect(base_url().'dashboard/pages');
	}
	// end crud pages


	public function profil()
	{
		// id pengguna yang sedang login
		$id_pengguna = $this->session->userdata('id');

		$where = array(
			'pengguna_id' => $id_pengguna
		);

		$data['profil'] = $this->m_data->edit_data($where,'pengguna')->result();

		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_profil',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function profil_update()
	{
		// Wajib isi nama dan email
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required');

		if($this->form_validation->run() != false){

			$id = $this->session->userdata('id');

			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$deskripsi = $this->input->post('deskripsi');
			$foto	= $_FILES['foto'];
			if ($foto = '') { } else {
				$config['upload_path']		= './gambar/profil/pengguna';
				$config['allowed_types']	= 'jpg|png|jpeg';
				$config['overwrite'] 		= true;

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					redirect('dashboard/profil?alert=gagal');
				} else {
					$foto = $this->upload->data('file_name');
				}
			}
			
			$where = array(
				'pengguna_id' => $id
			);

			$data = array(
				'pengguna_nama' => $nama,
				'pengguna_email' => $email,
				'deskripsi' => $deskripsi,
				'foto' => $foto
			);

			// update pengguna
			$this->m_data->update_data($where, $data, 'pengguna');
			redirect('dashboard/profil?alert=sukses');


			$this->load->view('dashboard/v_header', $data);
			$this->load->view('dashboard/v_profil', $data);
			$this->load->view('dashboard/v_footer', $data);
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_profil',$data);
			$this->load->view('dashboard/v_footer');
		}
	}

	// CRUD PENGATURAN

	public function pengaturan()
	{
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->result();

		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pengaturan',$data);
		$this->load->view('dashboard/v_footer');
	}


	public function pengaturan_update()
	{
		// Wajib isi nama dan deskripsi website
		$this->form_validation->set_rules('nama','Nama Website','required');
		$this->form_validation->set_rules('deskripsi','Deskripsi Website','required');
		$this->form_validation->set_rules('telpon','Telpon','required');		

		if($this->form_validation->run() != false){

			$nama = $this->input->post('nama');
			$deskripsi = $this->input->post('deskripsi');
			$link_facebook = $this->input->post('link_facebook');
			$link_twitter = $this->input->post('link_twitter');
			$link_instagram = $this->input->post('link_instagram');
			$link_youtube = $this->input->post('link_youtube');
			$pesan_wa = $this->input->post('pesan_wa');
			$telpon = $this->input->post('telpon');
			$email = $this->input->post('email');

			$where = array();


			$data = array(
				'nama' => $nama,
				'deskripsi' => $deskripsi,
				'link_facebook' => $link_facebook,
				'link_twitter' => $link_twitter,
				'link_instagram' => $link_instagram,
				'link_youtube' => $link_youtube,
				'pesan_wa' => $pesan_wa,
				'telpon' => $telpon,
				'email' => $email
			);

			// update pengaturan
			$this->m_data->update_data($where,$data,'pengaturan');

			// Periksa apakah ada gambar logo yang diupload
			if (!empty($_FILES['logo']['name'])){
				
				$config['upload_path']   = './gambar/website/';
				$config['allowed_types'] = 'jpg|png|jpeg';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('logo')) {
					// mengambil data tentang gambar logo yang diupload
					$gambar = $this->upload->data();

					$logo = $gambar['file_name'];
					
					$this->db->query("UPDATE pengaturan SET logo='$logo'");
				}
			}

			redirect(base_url().'dashboard/pengaturan/?alert=sukses');

		}else{
			$data['pengaturan'] = $this->m_data->get_data('pengaturan')->result();

			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_pengaturan',$data);
			$this->load->view('dashboard/v_footer');
		}
	}

	// CRUD PENGGUNA
	public function pengguna()
	{
		$data['pengguna'] = $this->m_data->get_data('pengguna')->result();	
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pengguna',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function pengguna_tambah()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pengguna_tambah');
		$this->load->view('dashboard/v_footer');
	}

	public function pengguna_aksi()
	{
		// Wajib isi
		$this->form_validation->set_rules('nama','Nama Pengguna','required');
		$this->form_validation->set_rules('email','Email Pengguna','required');
		$this->form_validation->set_rules('username','Username Pengguna','required');
		$this->form_validation->set_rules('password','Password Pengguna','required|min_length[8]');
		$this->form_validation->set_rules('level','Level Pengguna','required');
		$this->form_validation->set_rules('status','Status Pengguna','required');

		if($this->form_validation->run() != false){

			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$level = $this->input->post('level');
			$status = $this->input->post('status');
			$deskripsi = $this->input->post('deskripsi');

			$data = array(
				'pengguna_nama' => $nama,
				'pengguna_email' => $email,
				'pengguna_username' => $username,
				'pengguna_password' => $password,
				'pengguna_level' => $level,
				'pengguna_status' => $status,
				'deskripsi' => $deskripsi
			);


			$this->m_data->insert_data($data,'pengguna');

			redirect(base_url().'dashboard/pengguna');	

		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_pengguna_tambah');
			$this->load->view('dashboard/v_footer');
		}
	}

	public function pengguna_edit($id)
	{
		$where = array(
			'pengguna_id' => $id
		);
		$data['pengguna'] = $this->m_data->edit_data($where,'pengguna')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pengguna_edit',$data);
		$this->load->view('dashboard/v_footer');
	}


	public function pengguna_update()
	{
		// Wajib isi
		$this->form_validation->set_rules('nama','Nama Pengguna','required');
		$this->form_validation->set_rules('email','Email Pengguna','required');
		$this->form_validation->set_rules('username','Username Pengguna','required');
		$this->form_validation->set_rules('level','Level Pengguna','required');
		$this->form_validation->set_rules('status','Status Pengguna','required');

		if($this->form_validation->run() != false){

			$id = $this->input->post('id');

			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$level = $this->input->post('level');
			$status = $this->input->post('status');
			$deskripsi = $this->input->post('deskripsi');

			if($this->input->post('password') == ""){
				$data = array(
					'pengguna_nama' => $nama,
					'pengguna_email' => $email,
					'pengguna_username' => $username,
					'pengguna_level' => $level,
					'pengguna_status' => $status,
					'deskripsi' => $deskripsi
				);
			}else{
				$data = array(
					'pengguna_nama' => $nama,
					'pengguna_email' => $email,
					'pengguna_username' => $username,
					'pengguna_password' => $password,
					'pengguna_level' => $level,
					'pengguna_status' => $status,
					'deskripsi' => $deskripsi
				);
			}
			
			$where = array(
				'pengguna_id' => $id
			);

			$this->m_data->update_data($where,$data,'pengguna');

			redirect(base_url().'dashboard/pengguna');
		}else{
			$id = $this->input->post('id');
			$where = array(
				'pengguna_id' => $id
			);
			$data['pengguna'] = $this->m_data->edit_data($where,'pengguna')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_pengguna_edit',$data);
			$this->load->view('dashboard/v_footer');
		}
	}

	public function pengguna_hapus($id)
	{
		$where = array(
			'pengguna_id' => $id
		);
		$data['pengguna_hapus'] = $this->m_data->edit_data($where,'pengguna')->row();
		$data['pengguna_lain'] = $this->db->query("SELECT * FROM pengguna WHERE pengguna_id != $id")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pengguna_hapus',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function pengguna_hapus_aksi()
	{
		$pengguna_hapus = $this->input->post('pengguna_hapus');
		$pengguna_tujuan = $this->input->post('pengguna_tujuan');

		// hapus pengguna
		$where = array(
			'pengguna_id' => $pengguna_hapus
		);

		$this->m_data->delete_data($where,'pengguna');

		// pindahkan semua artikel pengguna yang dihapus ke pengguna yang dipilih
		$w = array(
			'artikel_author' => $pengguna_hapus
		);

		$d = array(
			'artikel_author' => $pengguna_tujuan
		);

		$this->m_data->update_data($w,$d,'artikel');

		// pindahkan semua event pengguna yang dihapus ke pengguna yang dipilih
		$w = array(
			'event_author' => $pengguna_hapus
		);

		$d = array(
			'event_author' => $pengguna_tujuan
		);

		$this->m_data->update_data($w,$d,'event');

		redirect(base_url().'dashboard/pengguna');
	}
	// end crud pengguna
	
}
