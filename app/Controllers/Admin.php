<?php

namespace App\Controllers;

use App\Models\ModelPegawai;
use App\Models\ModelPesanan;
use App\Models\ModelBarangMasuk;
use App\Models\ModelBarang;
use App\Models\ModelPelanggan;
use CodeIgniter\I18n\Time;

class Admin extends BaseController
{

    public function __construct()
    {
        $this->pegawai = new ModelPegawai();
        $this->pesanan = new ModelPesanan();
        $this->barangmasuk = new ModelBarangMasuk();
        $this->barang = new ModelBarang();
        $this->pelanggan = new ModelPelanggan();
        session()->start();
    }
    public function jam()
    {
        return date('Y-m-d h:i:s');
    }
    public function laporan($mouth = null)
    {
        if ($mouth == null) {
            $bulan = date("m");
        }else{
            $bulan = $mouth;
        }
        
        $data = [
            'title' => 'Laporan',
            'data' => $this->pesanan->getbulan($bulan)
        ];
        return view('admin/laporan', $data);
    }
    public function editbarang($id)
    {
        $validation = \Config\Services::validation();
        $aturan = [
            'id_barang'=>[
                'rules' => 'numeric'
            ],
            'nama_barang'=>[
                'label'=>'Nama Barang',
                'rules' => 'alpha_space'
            ],
            'dimensi_barang'=>[
                'label' => 'Dimensi Barang',
                'rules' => 'alpha_space'
            ],
            'kemasan_barang' => [
                'label' => 'Kemasan Barang',
                'rules' => 'alpha_space'
            ],
            'expired_barang' => [
                'label' => 'Expired Barang',
                'rules' => 'numeric'
            ]
        ];
        $validation->setRules($aturan);

        if ($validation->withRequest($this->request)->run()) {
            $data = [
                'id_barang' => $this->request->getVar('id_barang'),
                'nama_barang' => $this->request->getVar('nama_barang'),
                'dimensi_barang' => $this->request->getVar('dimensi_barang'),
                'kemasan_barang' => $this->request->getVar('kemasan_barang'),
                'expired_barang' => $this->request->getVar('expired_barang')
            ];
            $update = $this->barang->save($data);
            if ($update) {
                session()->setFlashdata('berhasil', 'DataBerhasil DiUpdate');
                return redirect()->to(base_url('/listbarang'));
            } else {
                session()->setFlashdata('gagal', $validation->listErrors());
                return redirect()->to(base_url('/listbarang/editbarang/'.$id))->withInput();   
            }
        }else {
            session()->setFlashdata('gagal', $validation->listErrors());
            return redirect()->to(base_url('/listbarang/editbarang/'.$id))->withInput();
        }
    }
    public function editbarangview($id)
    {
        $data = [
            'title' => 'Edit Barang',
            'online'=> $this->pegawai->online(),
            'data' => $this->barang->cariId($id)
        ];
        return view('admin/editbarang', $data);
    }
    public function tambahbarang()
    {
        $validation = \Config\Services::validation();
        $aturan = [
            'nama_barang'=>[
                'label'=>"Nama Barang",
                'rules' => 'required'
            ],
            'dimensi_barang'=>[
                'label' => 'Dimensi Barang',
                'rules' => 'required'
            ],
            'kemasan_barang' => [
                'label' => 'Kemasan Barang',
                'rules' => 'required'
            ],
            'expired_barang' => [
                'label' => 'Expired Barang',
                'rules' => 'required'
            ]
        ];
        $validation->setRules($aturan);

        if ($validation->withRequest($this->request)->run()) {
            $data = [
                'nama_barang' => $this->request->getVar('nama_barang'),
                'dimensi_barang' => $this->request->getVar('dimensi_barang'),
                'kemasan_barang' => $this->request->getVar('kemasan_barang'),
                'expired_barang' => $this->request->getVar('expired_barang')
            ];
            $save = $this->barang->save($data);
            if ($save) { 
                session()->setFlashdata('berhasil', 'DataBerhasil DiUpdate');
                return redirect()->to(base_url('/listbarang'));
            }else {
            session()->setFlashdata('gagal', $validation->listErrors());
            return redirect()->to(base_url('/listbarang/tambahbarang/'))->withInput();
            }
        } else {
            session()->setFlashdata('gagal', $validation->listErrors());
            return redirect()->to(base_url('/listbarang/tambahbarang/'))->withInput();
        }
    }
    
    public function tambahbarangview()
    {
        $data = [
            'title' => 'Tambah Barang',
            'online'=> $this->pegawai->online()
        ];
        return view('admin/tambahbarang', $data);
    }
    public function listbarang()
    {
        $data = [
            'title' => 'Manage Barang',
            'online'=> $this->pegawai->online(),
            'barang' => $this->barang->findAll()
        ];
        return view('admin/listbarang', $data);
    }
    public function tambahbarangmasuk()
    {
        $validation = \Config\Services::validation();
        $aturan = [
            'id_barang' => [
                'label' => 'Nama Barang',
                'rules' => 'alpha_space'
            ],
            'nama_pelanggan' => [
                'label' => 'Nama Pengirim',
                'rules' => 'alpha_space'
            ],
            'id_pegawai' => [
                'rules' => 'numeric'
            ],
            'jumlah_kiriman' => [
                'label' => 'Jumlah Pesanan',
                'rules' => 'numeric'
            ],
            'dimensi' => [
                'label'=> 'Dimensi Pesanan',
                'rules' => 'alpha_space'
            ]
        ];
        $validation->setRules($aturan);

        if ($validation->withRequest($this->request)->run()) {
            $data = [
                'id_barang' => $this->request->getVar('nama_barang'),
                'id_pelanggan' => $this->request->getVar('nama_barang'),
                'id_pegawai' => $this->request->getVar('id_pegawai'),
                'dimensi_barang' => $this->request->getVar('dimensi_barang'),
                'jumlah_barang' => $this->request->getVar('jumlah_kiriman'),
                'tanggalmasuk' => date("Y-m-d")
            ];
            $this->barangmasuk->save($data);
            session()->setFlashdata('berhasil', 'DataBerhasil DiUpdate');
            return redirect()->to(base_url('/barangmasuk'));
        } else {
            session()->setFlashdata('gagal', $validation->listErrors());
            return redirect()->to(base_url('/barangmasuk/tambahbarangmasuk/'))->withInput();
        }
    }
    public function tambahbarangmasukview()
    {
        $data = [
            'title' => 'Tambah Barang Masuk',
            'online'=> $this->pegawai->online(),
            'pelanggan' => $this->pelanggan->findAll(),
            'barang' => $this->barang->findAll()
        ];
        return view('admin/tambahbarangmasuk', $data);
    }
    public function barangmasuk()
    {
        $data = [
            'title' => 'Barang Masuk',
            'online'=> $this->pegawai->online(),
            'barang' => $this->barangmasuk->barang()->findAll(),
        ];
        return view('admin/barangmasuk', $data);
    }
    // end Barang Masuk
    public function editpesanan($id)
    {
        $validation = \Config\Services::validation();
        $aturan = [
            'id_pegawai' => [
                'rules' => 'numeric'
            ],
            'id_pelanggan' => [
                'label' => 'Nama Pemesan',
                'rules' => 'numeric'
            ],
            'id_barang' => [
                'label' => 'Barang Pesanan',
                'rules' => 'numeric'
            ],
            'jumlahPesanan' => [
                'label' => 'Jumlah Pesanan',
                'rules' => 'numeric'
            ],
            'dimensi' => [
                'label'=> 'Dimensi Pesanan',
                'rules' => 'string'
            ]
        ];
        $validation->setRules($aturan);
        if ($validation->withRequest($this->request)->run()) {
            $data = [
                'id_pesanan' => $id,
                'id_pegawai' => $this->request->getVar('id_pegawai'),
                'id_pelanggan' => $this->request->getVar('id_pelanggan'),
                'id_barang' => $this->request->getVar('id_barang'),
                'jumlah_barang' => $this->request->getVar('jumlahPesanan'),
                'dimensi_barang' => $this->request->getVar('dimensi'),
            ];
            $this->pesanan->save($data);
            session()->setFlashdata('berhasil', 'DataBerhasil DiUpdate');
            return redirect()->to(base_url('/orderoffline'));
        } else {
            session()->setFlashdata('gagal', $validation->listErrors());
            return redirect()->to(base_url('/orderoffline/editpesanan/'.$id))->withInput();
        }
    }
    public function editpesananview($id)
    {
        $datapesanan = $this->pesanan->cariId($id);
        $data = [
            'title' => 'Edit Pesanan Offline',
            'online'=> $this->pegawai->online(),
            'data'  => $datapesanan,
            'pelanggan' => $this->pelanggan->findAll(),
            'barang' => $this->barang->findAll()
        ];
        return view('Admin/editpesanan', $data);
    }
    public function tambahpesananview()
    {
        return view('admin/tambahpesanan', [
            'title' => 'Tambah Pesanan Offline',
            'online'=> $this->pegawai->online(),
            'pelanggan' => $this->pelanggan->findAll(),
            'barang' => $this->barang->findAll()
        ]);
    }
    public function tambahpesanan()
    {
        $validation = \Config\Services::validation();
        $aturan = [
            'id_pegawai' => [
                'rules' => 'required'
            ],
            'namapemesan' => [
                'label' => 'Nama Pemesan',
                'rules' => 'required'
            ],
            'barangpesanan' => [
                'label' => 'Barang Pesanan',
                'rules' => 'required'
            ],
            'jumlahpesanan' => [
                'label' => 'Jumlah Pesanan',
                'rules' => 'required'
            ],
            'dimensi_barang' => [
                'label' => 'Dimensi Barang',
                'rules' => 'required'
            ]
        ];
        $validation->setRules($aturan);
        if ($validation->withRequest($this->request)->run()) {
            $data = [
                'id_pegawai' => $this->request->getVar('id_pegawai'),
                'id_pelanggan' => $this->request->getVar('namapemesan'),
                'id_barang' => $this->request->getVar('barangpesanan'),
                'jumlah_barang' => $this->request->getVar('jumlahpesanan'),
                'dimensi_barang' => $this->request->getVar('dimensi_barang'),
                'tanggalpesan' => Time::now(),
                'status' => 'masuk'
            ];
            $save =  $this->pesanan->save($data);
            if ($save) {
                session()->setFlashdata('berhasil', 'DataBerhasil Ditambahkan');
                return redirect()->to(base_url('/orderoffline'));
            } else {
                session()->setFlashdata('gagal', $validation->listErrors());
                return redirect()->to(base_url('orderoffline/tambahpesanan'))->withInput();
            }
        } else {
            session()->setFlashdata('gagal', $validation->listErrors());
            return redirect()->to(base_url('/orderoffline/tambahpesanan'))->withInput();
        }
    }
    public function buktiselesai($id)
    {
        $foto = $this->request->getFile('foto_selesai');
        $validation = \Config\Services::validation();
        $aturan = [
            'foto_selesai' => [
                'label' => 'Bukti Pesanan Selesai',
                'rules' => 'uploaded[foto_selesai]|is_image[foto_selesai]',
            ]
        ];
        $validation->setRules($aturan);
        if ($validation->withRequest($this->request)->run()) {
            $namafoto = $foto->getRandomName();
            $data = [
                'id_pesanan' => $id,
                'id_pegawai' => $this->request->getVar('id_pegawai'),
                'fotoselesai' => $namafoto,
                'status' => 'selesai',
                'tanggalselesai' => Time::now()
            ];
            $update = $this->pesanan->save($data);
            if ($update) {
                $foto->move('img/fotoselesai/', $namafoto);
                return redirect()->to(base_url('/orderoffline'));
            } else {
                session()->setFlashdata('gagal', $validation->listErrors());
                return redirect()->to(base_url('orderoffline/selesai/' . $id))->withInput();
            }
        } else {
            session()->setFlashdata('gagal', $validation->listErrors());
            return redirect()->to(base_url('orderoffline/selesai/' . $id))->withInput();
        }
    }
    public function buktiproses($id)
    {
        $foto = $this->request->getFile('foto_proses');
        $validation = \Config\Services::validation();
        $aturan = [
            'foto_proses' => [
                'label' => 'Foto Proses',
                'rules' => 'uploaded[foto_proses]|is_image[foto_proses]'
            ]
        ];
        $validation->setRules($aturan);
        if ($validation->withRequest($this->request)->run()) {
            $namafoto = $foto->getRandomName();
            $data = [
                'id_pesanan' => $id,
                'fotoproses' => $namafoto
            ];
            $update = $this->pesanan->save($data);
            if ($update) {
                $foto->move('img/fotoproses/', $namafoto);
                return redirect()->to(base_url('/orderoffline'));
            } else {
                return redirect()->to(base_url('/orderoffline/proses/' . $id));
            }
        } else {
            return redirect()->to(base_url('/orderoffline/proses/' . $id));
        }
    }
    public function cariidpesanan($id)
    {
        $datapesanan = $this->pesanan->cariId($id);

        if ($datapesanan['fotoproses']) {
            $dataupdate = $this->pesanan->sudahproses($id);
            return view('admin/selesaipesanan', [
                'title' => 'Selesaikan Pesanan',
                'online'=> $this->pegawai->online(),
                'pelanggan' => $this->pelanggan->findAll(),
                'barang' => $this->barang->findAll(),
                'data' => $dataupdate
            ]);
        } else {
            $dataupdate = $this->pesanan->belumproses($id);
            return view('admin/prosespesanan', [
                'title' => 'Proses Pesanan',
                'online'=> $this->pegawai->online(),
                'pelanggan' => $this->pelanggan->findAll(),
                'barang' => $this->barang->findAll(),
                'data' => $dataupdate
            ]);
        }
        
    }
    //using ajax
    public function prosespesanan($id)
    {
        $data = [
            'id_pesanan' => $id,
            'status' => 'proses'
        ];
        $update = $this->pesanan->save($data);
        if ($update) {
            $hasil['status'] = true;
            $hasil['pesan'] = 'Pesanan Berhasil DiProses';
        } else {
            $hasil['status'] = false;
            $hasil['pesan'] = 'Pesanan gagal DiProses';
        }
        return json_encode($hasil);
    }

    public function pesananmasuk()
    {
        $masuk = $this->pesanan->statusMasuk()->findAll();
        return view('admin/pesananmasuk', [
            'title' => 'pesanan Masuk',
            'online'=> $this->pegawai->online(),
            'masuk' => $masuk
        ]);
    }  
    public function orderoffline()
    {
        $masuk = $this->pesanan->statusMasuk()->paginate(5);
        $proses = $this->pesanan->statusProses()->paginate(5);
        $selesai = $this->pesanan->statusSelesai()->paginate(5);
        return view('admin/orderoffline', [
            'title' => 'Order Offline',
            'online'=> $this->pegawai->online(),
            'masuk' => $masuk,
            'proses' => $proses,
            'selesai' => $selesai

        ]);
    }
    // end Order Offline
    public function hapus($id)
    {
        $this->pegawai->delete($id);
        return redirect()->to(base_url());
    }
    public function edit($id)
    {
        return json_encode($this->pegawai->cariId($id));
    }
    public function simpan()
    {
        $validation = \Config\Services::validation();

        $aturan = [
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required|min_length[5]|max_length[50]',
                'errors' => [
                    'required' => 'Kolom {field} Harus Di isi',
                    'min_length' => 'Minimal karakter yang di isikan di Kolom {field} adalah 5',
                    'max_length' => 'Maximal karakter yang di isikan di Kolom {field} adalah 50',
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'valid_email|min_length[5]|max_length[50]|is_unique[pegawai.email]',
                'errors' => [
                    'valid_email' => 'Kolom {field} Harus Format Email',
                    'min_length' => 'Minimal karakter yang di isikan di Kolom {field} adalah 5',
                    'max_length' => 'Maximal karakter yang di isikan di Kolom {field} adalah 50',
                    'is_unique' => '{field} Sudah Terdaftar Mohon Cek Kembali'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[5]|max_length[50]',
                'errors' => [
                    'required' => 'Kolom {field} Harus Di isi',
                    'min_length' => 'Minimal karakter yang di isikan di Kolom {field} adalah 5',
                    'max_length' => 'Maximal karakter yang di isikan di Kolom {field} adalah 50'
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'is_image[foto]|ext_in[foto,png,webp]|max_size[foto,200]',
                'errors' => [
                    'is_image' => 'Kolom {field} Harus berupa Foto',
                    'ext_in' => 'Kolom {field} Harus Berextensi png Atau webp',
                    'max_size' => 'Kolom {field} tidak boleh lebih dari 200kb'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required|min_length[5]|max_length[50]',
                'errors' => [
                    'required' => 'Kolom {field} Harus Di isi',
                    'min_length' => 'Minimal karakter yang di isikan di Kolom {field} adalah 5',
                    'max_length' => 'Maximal karakter yang di isikan di Kolom {field} adalah 50',
                ]
            ]
        ];
        $validation->setRules($aturan);
        if ($validation->withRequest($this->request)->run()) {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'password' =>  $this->request->getPost('password'),
                'bidang' => $this->request->getPost('bidang'),
                'alamat' => $this->request->getPost('alamat'),
                'jeniskelamin' => $this->request->getPost('jeniskelamin'),
                'role' => $this->request->getPost('role'),
                'status_login' => $this->request->getPost('status_login')
            ];
            $this->pegawai->save($data);
            $hasil['status'] = true;
            $hasil['pesan'] = 'Data Berhasil Ditambahkan';
        } else {
            $hasil['status'] = false;
            $hasil['pesan'] = $validation->listErrors();
        }
        return json_encode($hasil);
    }
    //
    public function update()
    {
        $validation = \Config\Services::validation();
        $datacheck = $this->pegawai->cariId($this->request->getPost('id'));
        if (empty($datacheck)) {
            $password = md5($this->request->getPost('password'));
            $alert['status'] = 'Data Pegawai' + 404;
            $alert['pesan'] = 'Data Pegawai Tidak ada';
        } else {
            if ($datacheck['password'] == $this->request->getPost('password')) {
                $password = $this->request->getPost('password');
            } else {
                $password = md5($this->request->getPost('password'));
            }
        }
        if (session()->get('id_pegawai') == $datacheck['id_pegawai']) {
            $status_login = '1';
        } else {
            $status_login = '0';
        }

        if ($datacheck['email'] == $this->request->getPost('email')) {
            $emailrule = 'valid_email|min_length[5]|max_length[50]';
        } else {
            $emailrule = 'valid_email|min_length[5]|max_length[50]|is_unique[pegawai.email]';
        }
        $aturan = [
            'nama_pegawai' => [
                'label' => 'Nama',
                'rules' => 'required|min_length[5]|max_length[50]',
                'errors' => [
                    'required' => 'Kolom {field} Harus Di isi',
                    'min_length' => 'Minimal karakter yang di isikan di Kolom {field} adalah 5',
                    'max_length' => 'Maximal karakter yang di isikan di Kolom {field} adalah 50',
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => $emailrule,
                'errors' => [
                    'valid_email' => 'Kolom {field} Harus Format Email',
                    'min_length' => 'Minimal karakter yang di isikan di Kolom {field} adalah 5',
                    'max_length' => 'Maximal karakter yang di isikan di Kolom {field} adalah 50',
                    'is_unique' => '{field} Sudah Terdaftar Mohon Cek Kembali'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[5]|max_length[50]',
                'errors' => [
                    'required' => 'Kolom {field} Harus Di isi',
                    'min_length' => 'Minimal karakter yang di isikan di Kolom {field} adalah 5',
                    'max_length' => 'Maximal karakter yang di isikan di Kolom {field} adalah 50'
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'is_image[foto]|ext_in[foto,png,webp]|max_size[foto,200]',
                'errors' => [
                    'is_image' => 'Kolom {field} Harus berupa Foto',
                    'ext_in' => 'Kolom {field} Harus Berextensi png Atau webp',
                    'max_size' => 'Kolom {field} tidak boleh lebih dari 200kb'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required|min_length[5]|max_length[50]',
                'errors' => [
                    'required' => 'Kolom {field} Harus Di isi',
                    'min_length' => 'Minimal karakter yang di isikan di Kolom {field} adalah 5',
                    'max_length' => 'Maximal karakter yang di isikan di Kolom {field} adalah 50',
                ]
            ]
        ];
        $validation->setRules($aturan);
        $datacheck = $this->pegawai->cariId($this->request->getPost('id'));
        if (empty($datacheck)) {
            $password = md5($this->request->getPost('password'));
        } else {
            if ($datacheck['password'] == $this->request->getPost('password')) {
                $password = $this->request->getPost('password');
            } else {
                $password = md5($this->request->getPost('password'));
            }
        }
        if (session()->get('id_pegawai') == $datacheck['id_pegawai']) {
            $status_login = '1';
        } else {
            $status_login = '0';
        }
        if ($validation->withRequest($this->request)->run()) {
            $data = [
                'id_pegawai' => $this->request->getPost('id'),
                'nama_pegawai' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'password' => $password,
                'bidang' => $this->request->getPost('bidang'),
                'alamat' => $this->request->getPost('alamat'),
                'jeniskelamin' => $this->request->getPost('jeniskelamin'),
                'role' => $this->request->getPost('role'),
                'status_login' => $status_login
            ];
            $this->pegawai->save($data);
            $hasil['status'] = true;
            $hasil['pesan'] = 'Data Berhasil Ditambahkan';
        } else {
            $hasil['status'] = false;
            $hasil['pesan'] = $validation->listErrors();
        }
        return json_encode($hasil);
    }
    //displaying admindashoard view
    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        if ($keyword) {
            $carian = $this->pegawai->cari($keyword);
        } else {
            $carian = $this->pegawai;
        }
        $data = [
            'title' => 'Admin Dashboard',
            'keyword' => $keyword,
            'allpesanan' => $this->pesanan->countAll(),
            'online'=> $this->pegawai->online(),
            'allbarangmasuk'=> $this->barangmasuk->countAll(),
            'pesananselesai' => $this->pesanan->statusSelesai()->countAllResults(),
            'prosespesanan' => $this->pesanan->statusProses(),
            'barang' => $this->barangmasuk->barang()->paginate(5),
            'pagerbarang' => $this->barang->pager
        ];
        return view('admin/admindashboard', $data);
    }
}
