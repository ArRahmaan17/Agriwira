<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPegawai extends Model
{
    protected $table            = 'pegawai';
    protected $primaryKey       = 'id_pegawai';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nama_pegawai','nomer_pegawai' ,'email', 'password', 'bidang', 'bidang', 'alamat', 'jeniskelamin', 'role', 'status_login'];


    public function cari($katakunci)
    {
        $builder = $this->table("pegawai");
        $arr_katakunci = explode(" ", $katakunci);
        for ($x = 0; $x < count($arr_katakunci); $x++) {
            $builder->orLike("nama", $arr_katakunci[$x]);
            $builder->orLike("alamat", $arr_katakunci[$x]);
            $builder->orLike("bidang", $arr_katakunci[$x]);
        }
        return $builder->findAll();
    }
    public function cariId($id)
    {
        return $this->table("pegawai")->where("id_pegawai", $id)->first();
    }

    public function offline()
    {
        return $this->table("pegawai")->where("status_login", "0")->findAll();
    }
    public function online()
    {
        return $this->table("pegawai")->where("status_login", "1")->findAll();
    }
}
