<?php
namespace App\Libraries;
use Config\Services;

class AuthLibrary
{
    protected $session;
    public function __construct(){
       $this->session = Services::session();
// for information, i config App.php for session storage in files (WRITEPATH.'sessions_cache', with directory named "sessions_cache" and no problem at this level
    }

    public function isLoggedIn(){
        return (isset($_SESSION['user_id']) != 0)?true:false;
    }
}

?>
