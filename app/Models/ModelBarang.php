<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarang extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'barang';
    protected $primaryKey       = 'id_barang';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_barang', 'deskripsi_barang' , 'dimensi_barang', 'kemasan_barang','expired_barang'];

    public function cariId($id)
    {
        //cari berdasarkan id 
        return $this->table('barang')->where("id_barang", $id)->first();
    }

}
