<?php
    /**
     *
     */
    class Panel extends MY_Controller
    {

      function __construct()
      {
        parent::__construct();
        $this->data['username'] = $this->session->userdata('username');
		    $this->data['id_role']  = $this->session->userdata('id_role');
		    if (!isset($this->data['username']))
		      {
			         $this->flashmsg('<i class="glyphicon glyphicon-remove"></i> Anda harus login terlebih dahulu', 'danger');
			         redirect('login');
			         exit;
		       }
		    $this->session->set_userdata(['login' => TRUE]);

        $this->load->model('Menu_m');
        $this->load->model('Login_m');
        $this->load->model('Penjualan_m');
        $this->load->model('User_data');
        $this->load->model('Resi_m');
      }

      public function index()
      {
        date_default_timezone_set("Asia/Jakarta");
        $id_resi;
        $resi = $this->Resi_m->get_row(['status'=>'belum']);
        if(isset($resi)){
          $id_resi = $resi->no_resi;
        } else {
          $id_resi = 0;
        }

        if ($this->POST('submit')) {
          if ($this->POST('jumlah')<= 0 ) {
            $this->flashmsg('<i class=""></i>Tentukan input yang valid', 'warning');
            redirect('panel');
            exit;
          }
          if($id_resi==0){
            $data_resi = ['tanggal' => date('Y-m-d')];
            $this->Resi_m->insert($data_resi);
            $id_resi = $this->Resi_m->get_row(['status'=>'belum']);
          }
          $menu = $this->Menu_m->get_row(['id_menu'=>$this->POST('kode')]);
          $user = $this->User_data->get_row(['username'=>$this->session->userdata('username')]);
          if (isset($menu)) {
            $data = ['id_menu' => $menu->id_menu,
                    'jumlah' => $this->POST('jumlah'),
                    'kasir' => $user->nama,
                    'id_resi' => $id_resi,
            ];
            $this->Penjualan_m->insert($data);
          } else {
            redirect('panel');
          }
        }

        if($this->POST('uangmasuk')){
          $data = ['uang' => $this->POST('uang')];
          $this->Resi_m->update($id_resi,$data);
        }

        $this->data['list_menu'] = $this->Menu_m->get();
        $this->data['list_pesanan'] = $this->Penjualan_m->get(['id_resi'=>$id_resi]);
        $this->data['title'] = '.:: Dashboard ::.';
        $this->data['content'] = 'dashboard';
        $this->template($this->data);
      }

      public function penjualan()
      {
        date_default_timezone_set("Asia/Jakarta");
        $this->data['list_penjualan'] = $this->Penjualan_m->get(['tanggal' => date('Y-m-d') ]);
        $this->data['title'] = '.:: Penjualan ::.';
        $this->data['content'] = 'penjualan';
        $this->template($this->data);
      }

      public function pembayaran()
      {
        $id_resi;
        $resi = $this->Resi_m->get_row(['status'=>'belum']);
        if(isset($resi)){
          $id_resi = $resi->no_resi;
        } else {
          $id_resi = 0;
        }

        date_default_timezone_set("Asia/Jakarta");
          $list_pesanan=$this->Penjualan_m->get(['status'=>'unconfirmed']);
          $data = ['status'=>'confirmed','tanggal'=> date('Y-m-d')];
          foreach ($list_pesanan as $pesanan) {
            $this->Penjualan_m->update($pesanan->id_penjualan,$data);
          }
          $this->Resi_m->update($id_resi,$data);
          $this->flashmsg('<i class=""></i>Transaksi Sukses!', 'success','msg_trans');
        redirect('panel');
      }

      public function logout()
    	{
    		$this->session->sess_destroy();
    		redirect('login');
    		exit;
    	}

      public function cetak_resi(){
        $id_resi;
        $resi = $this->Resi_m->get_row(['status'=>'belum']);
        if(isset($resi)){
          $id_resi = $resi->no_resi;
        } else {
          $id_resi = 0;
        }
        $this->data['id_resi'] = $id_resi;
        $this->data['list_pesanan'] = $this->data['list_penjualan'] = $this->Penjualan_m->get(['id_resi'=>$id_resi]);
        $this->load->view('resi',$this->data);
      }

      public function cancel(){
        $id_resi;
        $resi = $this->Resi_m->get_row(['status'=>'belum']);
        if(isset($resi)){
          $id_resi = $resi->no_resi;
        } else {
          $id_resi = 0;
        }

        $data_resi = ['no_resi'=> $id_resi];
        $this->Resi_m->delete_by($data_resi);

        $data_resi = ['id_resi'=> $id_resi];
        $this->Penjualan_m->delete_by($data_resi);

        redirect('panel');
      }

      public function total_penjualan(){
        date_default_timezone_set("Asia/Jakarta");
        $bulan = $this->uri->segment(3);
        if(isset($bulan))
          $this->data['list_penjualan'] = $this->Penjualan_m->penjualan_bulan($bulan);
        else
          $this->data['list_penjualan'] = $this->Penjualan_m->get();
          
       
        $this->data['title'] = '.:: Penjualan ::.';
        $this->data['content'] = 'penjualan_total';
        $this->template($this->data);
      }

      public function menu(){
        if($this->POST('add')){
          $data_menu = ['id_menu'=> $this->POST('kode'),
                        'nama_menu'=>$this->POST('nama'),
                        'harga'=> $this->POST('harga')
          ];
          $this->Menu_m->insert($data_menu);
        }
        if($this->POST('edit')){
          $data_menu = ['id_menu'=> $this->POST('kode'),
                        'nama_menu'=>$this->POST('nama'),
                        'harga'=> $this->POST('harga')
          ];
          $this->Menu_m->update($this->POST('kode'),$data_menu);
        }
        $this->data['list_menu'] = $this->Menu_m->get();
        $this->data['title'] = '.:: Daftar Menu ::.';
        $this->data['content'] = 'menu';
        $this->template($this->data);
      }

      public function tambah_menu(){
        $this->data['title'] = '.:: Tambah Menu ::.';
        $this->data['content'] = 'tambah_menu';
        $this->template($this->data);
      }

      public function edit_menu(){
        $this->data['menu'] = $this->Menu_m->get_row(['id_menu'=>$this->uri->segment(3)]);
        $this->data['title'] = '.:: Edit Menu ::.';
        $this->data['content'] = 'edit_menu';
        $this->template($this->data);
      }

      public function delete_menu(){
        $id = $this->uri->segment(3);
        $this->Menu_m->delete($id);
        redirect('panel/menu');
      }

      // public function edit_user(){
      //   if($this->data['id_role']!=1){
      //     echo "kau bukan owner";
      //   }

      //   if($this->POST('edit')){
      //     $data_user = ['password'=> $this->POST('password'),
      //               'username' => $this->POST('username')
      //     ];
      //     $this->Login_m->update($this->POST('username'),$data_user);
      //     // echo $this->POST('password').'<br>';
      //     // echo $this->POST('username').'<br>';
      //   }
      //   $this->data['owner'] = $this->Login_m->get_row(['id_role'=>1]);
      //   $this->data['kasir'] = $this->Login_m->get_row(['id_role'=>2]);
      //   $this->data['title'] = '.:: Edit User ::.';
      //   $this->data['content'] = 'edit_user';
      //   $this->template($this->data);
      // }

    }

 ?>
