<?php

namespace App\Controllers;

class AuthController extends BaseController
{
	private $userId;
	private $userPassword;
	private $userPasswordHash;

	public function setUserId($id)
	{
		$this->userId = $id;
	}

	public function setUserPassword($password)
	{
		$this->userPassword = $password;
	}

	public function isValidUser()
	{
		$validUserId = $this->container->get('UserController')->getUser($this->userId);

		if (!empty($validUserId)) {
			if ($validUserId['enabled'] > 0) {
				$this->userPasswordHash = $this->container->get('UserController')->getUserPasswordHash($this->userId);
				return true;
			}
		}

		return false;
	}

	public function isValidPassword()
	{
		if (password_verify($this->userPassword, $this->userPasswordHash)) {
			return true;
		}

		return false;
	}

	public function isDefaultPassword()
	{
		$userId = getCurrentUserId();
		$validUserId = $this->container->get('UserController')->getUser($userId);

		if ($validUserId) {
			if ($validUserId['password_is_default'] > 0) {
				return true;
			}
		}

		return false;
	}

	public function isValidSession()
	{
		$userId = getCurrentUserId();

		if (isset($userId)) {
			$sessionTimeout = 15 * 60; // 1hr
			$sessionDateUpdate = isset($_SESSION['ant_date_updated']) ? $_SESSION['ant_date_updated'] : 0;
			$sessionDateCurrent = time();

			if (($sessionDateCurrent - $sessionDateUpdate) < $sessionTimeout) {
				return true;
			}
		}

		return false;
	}

	public function isUserAllowedTask($task)
	{
		$user = $this->container->get('UserController');
		$userAllowedTasks = $user->getUserAllowedTasks($this->userId);

		foreach ($userAllowedTasks as $id => $name) {
			if (array_search($task, $name, $strict = true)) {
				return true;
			}
		}

		return false;
	}

	public function updateSessionActivity()
	{
		if (isset($_SESSION['ant_userid'])) {
			$_SESSION['ant_date_updated'] = time();
		}
	}
}