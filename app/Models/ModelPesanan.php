<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPesanan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pesanan';
    protected $primaryKey       = 'id_pesanan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_pegawai', 'id_pelanggan', 'id_barang', 'jumlah_barang', 'dimensi_barang', 'fotoproses', 'fotoselesai', 'tanggalpesan', 'tanggalselesai', 'status' ];


    public function getbulan($bulan = 1)
    {
        return $this->table('pesanan')->join('pegawai', 'pesanan.id_pegawai = pegawai.id_pegawai', 'left')->join('barang','barang.id_barang = pesanan.id_barang', 'left')->join('pelanggan','pelanggan.id_pelanggan = pesanan.id_pelanggan', 'left')->where('MONTH(tanggalpesan)', $bulan)->findAll();
    }
    public function cariId($id)
    {
        //cari berdasarkan id 
        return $this->table('pesanan')->join('pegawai', 'pesanan.id_pegawai = pegawai.id_pegawai', 'left')->join('barang','barang.id_barang = pesanan.id_barang', 'left')->join('pelanggan','pelanggan.id_pelanggan = pesanan.id_pelanggan', 'left')->where("id_pesanan", $id)->first();
    }
    public function belumproses($id)
    {
        //pesanan yang belum di proses (yang belum memiliki bukti foto proses pengerjaan)
        return $this->table('pesanan')->join('pegawai', 'pesanan.id_pegawai = pegawai.id_pegawai', 'left')->join('barang','barang.id_barang = pesanan.id_barang', 'left')->join('pelanggan','pelanggan.id_pelanggan = pesanan.id_pelanggan', 'left')->where(["id_pesanan" => $id, 'fotoproses ' => null])->first();
    }
    public function sudahproses($id)
    {
        //pesanan yang sudah di proses (yang sudah memiliki bukti foto proses pengerjaan)
        return $this->table('pesanan')->join('pegawai', 'pesanan.id_pegawai = pegawai.id_pegawai', 'left')->join('barang','barang.id_barang = pesanan.id_barang', 'left')->join('pelanggan','pelanggan.id_pelanggan = pesanan.id_pelanggan', 'left')->where(["id_pesanan" => $id, 'fotoproses !=' => null])->first();
    }
    public function statusMasuk()
    {
        //pesanan yang baru masuk (yang status pesanannya = masuk)
        return $this->table('pesanan')->join('pegawai', 'pesanan.id_pegawai = pegawai.id_pegawai', 'left')->join('barang','barang.id_barang = pesanan.id_barang', 'left')->join('pelanggan','pelanggan.id_pelanggan = pesanan.id_pelanggan', 'left')->where("status", "masuk");
    }
    public function statusProses()
    {
        //pesanan yang baru masuk (yang status pesanannya = proses)
        return $this->table('pesanan')->join('pegawai', 'pesanan.id_pegawai = pegawai.id_pegawai', 'left')->join('barang','barang.id_barang = pesanan.id_barang', 'left')->join('pelanggan','pelanggan.id_pelanggan = pesanan.id_pelanggan', 'left')->where("status", "proses");
    }
    public function statusSelesai()
    {
        //pesanan yang baru masuk (yang status pesanannya = selesai)
        return $this->table('pesanan')->join('pegawai', 'pesanan.id_pegawai = pegawai.id_pegawai', 'left')->join('barang','barang.id_barang = pesanan.id_barang', 'left')->join('pelanggan','pelanggan.id_pelanggan = pesanan.id_pelanggan', 'left')->where("status", "selesai");
    }
    
}
