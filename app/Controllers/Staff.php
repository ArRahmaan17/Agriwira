<?php

namespace App\Controllers;

use App\Models\ModelPegawai;
use CodeIgniter\Exceptions\AlertError;
use PhpParser\Node\Stmt\Echo_;

class Staff extends BaseController
{
  public function __construct()
  {
    $this->pegawai = new ModelPegawai();
    session()->start();
  }
  public function index()
  {
    $data = [
      'title' => 'Staff Dashboard',
    ];
    return view('staff/staffview', $data);
  }
}
