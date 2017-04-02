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
        $this->load->model('Detail_pesanan_m');
        $this->load->model('Pesanan_m');
      }

      public function index()
      {
        $id_pesanan=0;
        $pesananprev = $this->Pesanan_m->get_row(['status'=>'belum']);
            if(isset($pesananprev)){
              $id_pesanan = $pesananprev->id_pesanan;
            }
        date_default_timezone_set("Asia/Jakarta");
        if ($this->POST('submit')) {
          if ($this->POST('jumlah')<= 0 ) {
            $this->flashmsg('<i class=""></i>Tentukan input yang valid', 'warning');
            redirect('panel');
            exit;
          }
          $menu = $this->Menu_m->get_row(['id_menu'=>$this->POST('kode')]);
          if (isset($menu)) {
            $pesananprev = $this->Pesanan_m->get_row(['status'=>'belum']);
            if(isset($pesananprev)){
              $id_pesanan = $pesananprev->id_pesanan;
               $data = ['id_menu' => $menu->id_menu,
                    'jumlah' => $this->POST('jumlah'),
                    'id_pesanan' => $pesananprev->id_pesanan
                ];
                $this->Detail_pesanan_m->insert($data);
            } else{
               $data_resi = ['tanggal' => date('Y-m-d')];
            $this->Pesanan_m->insert($data_resi);
            $data_nota = ['tanggal' => date('Y-m-d'),'id_nota'=> $this->db->insert_id(),'id_pesanan'=>$this->db->insert_id()];
            $this->load->model('Nota_pembayaran_m');
            $this->Nota_pembayaran_m->insert($data_nota);
            $data = ['id_menu' => $menu->id_menu,
                    'jumlah' => $this->POST('jumlah'),
                    'id_pesanan' => $this->db->insert_id()
            ];
            $id_pesanan = $this->db->insert_id();
            $this->Detail_pesanan_m->insert($data);
            }
          } else {
            redirect('panel');
          }
        }

        if($this->POST('uangmasuk')){
          $this->load->model('Nota_pembayaran_m');
          $data = ['total'=> $this->POST('total'), 'uang'=>$this->POST('uang') ];
          $id_pesanan = $this->POST('resi');
          $this->Pesanan_m->update($this->POST('resi'),$data);
          $data_nota = ['total'=> $this->POST('total')];
          $this->Nota_pembayaran_m->update($this->POST('resi'),$data_nota);
        }

        $this->data['list_menu'] = $this->Menu_m->get();
        $this->data['list_pesanan'] = $this->Detail_pesanan_m->get(['id_pesanan'=>$id_pesanan]);
        $this->data['title'] = '.:: Dashboard ::.';
        $this->data['content'] = 'dashboard';
        $this->template($this->data);
      }

      public function penjualan()
      {
        date_default_timezone_set("Asia/Jakarta");
        $this->data['list_penjualan'] = $this->Detail_pesanan_m->get(['tanggal' => date('Y-m-d') ]);
        $this->data['title'] = '.:: Penjualan ::.';
        $this->data['content'] = 'penjualan';
        $this->template($this->data);
      }

      public function pembayaran()
      {
        $id_pesanan;
        $resi = $this->Pesanan_m->get_row(['status'=>'belum']);
        if(isset($resi)){
          $id_pesanan = $resi->id_pesanan;
        } else {
          $id_pesanan = 0;
        }

        date_default_timezone_set("Asia/Jakarta");
          $list_pesanan=$this->Detail_pesanan_m->get(['id_pesanan'=>$id_pesanan]);
          $data = ['status'=>'confirmed','tanggal'=> date('Y-m-d')];
          foreach ($list_pesanan as $pesanan) {
            $this->Detail_pesanan_m->update($pesanan->id_detailpesanan,$data);
          }
          $this->Pesanan_m->update($id_pesanan,$data);
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
        $id_pesanan;
        $this->data['resi'] = $this->Pesanan_m->get_row(['status'=>'belum']);
        if(isset($this->data['resi'])){
          $id_pesanan = $this->data['resi']->id_pesanan;
        } else {
          $id_pesanan = 0;
        }
        $this->data['list_pesanan'] = $this->Detail_pesanan_m->get(['id_pesanan'=>$id_pesanan]);
        $this->load->view('resi',$this->data);
      }

      public function cancel(){
        $id_pesanan;
        $resi = $this->Pesanan_m->get_row(['status'=>'belum']);
        if(isset($resi)){
          $id_pesanan = $resi->id_pesanan;
        } else {
          $id_pesanan = 0;
        }

        $data_resi = ['id_pesanan'=> $id_pesanan];
        $this->Pesanan_m->delete_by($data_resi);

        $data_resi = ['id_pesanan'=> $id_pesanan];
        $this->Detail_pesanan_m->delete_by($data_resi);

        redirect('panel');
      }

      public function total_penjualan(){
        date_default_timezone_set("Asia/Jakarta");
        $bulan = $this->uri->segment(3);
        if(isset($bulan))
          $this->data['list_penjualan'] = $this->Detail_pesanan_m->penjualan_bulan($bulan);
        else
          $this->data['list_penjualan'] = $this->Detail_pesanan_m->get();
          
       
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

      public function cetakreport(){
        $this->data['list_penjualan'] = $this->Detail_pesanan_m->get();
        $this->load->view('report', $this->data);
      }

      public function deletepesanan(){
        $id = $this->uri->segment(3);
        $this->Detail_pesanan_m->delete($id);
        redirect('panel');
      }

    }

 ?>
