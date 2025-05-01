<?php 

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\I18n\Time;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {

        $session = session();

        $isLoggedIn = $session->get('logged_in');
        $loginDate  = $session->get('login_date');
        $today      = Time::now('Asia/Jakarta')->toDateString();

        if (!$isLoggedIn || $loginDate !== $today) {
            $session->destroy();
            return redirect()->to('/')->with('error', 'Session expired. Silakan login kembali.');
        }        
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu diisi biasanya
    }
}
