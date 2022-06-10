<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class haveSession implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    if (session()->get('role') === 'admin' && (session()->get('status_login') === '1')) {
      return redirect()->to(base_url('/admindashboard'));
    }elseif (session()->get('role') === 'Staff' && (session()->get('status_login') === '1')) {
      return redirect()->to(base_url('/dashboard'));
    }else{
      // kosong
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // hehe
  }
}
