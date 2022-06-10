<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarangMasuk extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'barangmasuk';
    protected $primaryKey       = 'id_barangmasuk';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_barang', 'id_pelanggan','id_pegawai', 'jumlah_barang', 'dimensi_barang', 'tanggalmasuk'];

    public function barang()
    {
        return $this->table('barangmasuk')->join('pegawai', 'barangmasuk.id_pegawai = pegawai.id_pegawai ')->join('barang', 'barang.id_barang = barangmasuk.id_barang ')->join('pelanggan', 'barangmasuk.id_pelanggan = pelanggan.id_pelanggan ');
    }
}
