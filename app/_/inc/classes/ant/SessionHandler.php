<?php
namespace Ant;

class SessionHandler
{
    private $sessionError;
    private $sessionTimeout;
    private $sessionLastUpdate;
    private $sessionLogin;
    private $sessionLogout;
    private $sessionActive;
    private $sessionUserId;
    private $sessionUserPassword;

    public function __construct()
    {
        $this->sessionError = false;
        $this->sessionTimeout = 15 * 60;
        $this->sessionLastUpdate = isset($_SESSION['user_last_update']) ? $_SESSION['user_last_update'] : 0;
        $this->sessionLogin = isset($_POST['user_login']) ? $_POST['user_login'] : false;
        $this->sessionLogout = isset($_POST['user_logout']) ? $_POST['user_logout'] : false;
        $this->sessionActive = isset($_SESSION['user_active']) ? $_SESSION['user_active'] : false;

        if ($this->sessionLogout)
        {
            $this->sessionReset();
        }

        else if ($this->sessionLogin)
        {
            $this->sessionUserId = isset($_POST['user_login_id']) ? $_POST['user_login_id'] : null;
            $this->sessionUserPassword = isset($_POST['user_login_password']) ? $_POST['user_login_password'] : null;
            $this->sessionLastUpdate = time();
        }

        else if ($this->sessionActive)
        {
            $this->sessionUserId = isset($_SESSION['user_active_id']) ? $_SESSION['user_active_id'] : null;
        }

        else
        {
            $this->sessionReset();
        }
    }

    // Validate session activity
    private function isSessionExpired()
    {
        var_dump($_SESSION);
        echo "(".time()." - $this->sessionLastUpdate) > $this->sessionTimeout)";
        if ((time() - $this->sessionLastUpdate) > $this->sessionTimeout)
        {
            return true;
        }

        return false;
    }

    private function sessionInit()
    {
        $_SESSION['user_last_update'] = time();
        $_SESSION['user_active'] = true;
        $_SESSION['user_id'] = $this->sessionUserId;
    }

    private function sessionReset()
    {
        $this->sessionUserId = null;
        $this->sessionUserPassword = null;
        $this->sessionLastUpdate = null;
        $this->sessionLogin = false;
        $this->sessionLogout = false;
        $this->sessionActive = false;
    }

    private function sessionExit()
    {
        $path = pathinfo( $_SERVER['SCRIPT_NAME'] );
        $dir = $path['dirname'];

        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();
    }

    public function isValidSession()
    {
        // verify session data
        if (isset($this->sessionUserId) && ! $this->isSessionExpired())
        {
            $api = new Api();

            // validate user and password
            $id = array($this->sessionUserId);
            $user = $api->executeApiCall('userGet', $id);

            if ($user) $userInfo = $user[0];

            if (isset($userInfo))
            {
                if (isset($this->sessionUserPassword))
                {
                    if (! password_verify($this->sessionUserPassword, $userInfo['password']))
                    {
                        $this->sessionError = true;
                    }
                }
            }

            else
            {
                $this->sessionError = true;
            }
        }

        else
        {
            $this->sessionError = true;
        }

        if ($this->sessionError)
        {
            $this->sessionReset();
            $this->sessionExit();
            return false;
        }

        else
        {
            $this->sessionInit();
            return true;
        }
    }
}
