<?php
namespace Ant;

class User
{
    private $userId;
    private $userRoleId;
    private $userName;
    private $userEmail;
    private $userPasswordLastUpdate;
    private $userActive;
    private $userPermission = array();

    public function __construct($id)
    {
        $api = new Api;

        $id = array($id);
        $user = $api->executeApiCall('userGet', $id);
        $permission = $api->executeApiCall('userPermissionGet', $id);

        if ($user)
        {
            $userInfo = $user[0];
        }

        if (isset($userInfo))
        {
            $this->userId = $id;
            $this->userRoleId = $userInfo['user_role_id'];
            $this->userName = $userInfo['name'];
            $this->userEmail = $userInfo['email'];
            $this->userPasswordLastUpdate = $userInfo['password_last_update'];
            $this->userActive = $userInfo['active'];
            $this->userPermission = $permission;
        }
    }

    public function getId()
    {
        return $this->userId;
    }

    public function getRoleId()
    {
        return $this->userRoleId;
    }

    public function getName()
    {
        return $this->userName;
    }

    public function getEmail()
    {
        return $this->userEmail;
    }

    public function getPasswordLastUpdate()
    {
        return $this->userPasswordLastUpdate;
    }

    public function getActive()
    {
        return $this->userActive;
    }

    public function getPermission()
    {
        return $this->userPermission;
    }
}
