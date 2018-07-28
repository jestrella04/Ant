<?php

namespace App\Controllers;

class RoleController extends BaseController
{
	public function getRole($id = '')
	{
		if (!empty($id)) {
			$sp = $this->db->prepare('CALL sp_role_select(?)');
			$sp->execute(array($id));
			$op = $sp->fetch();
		} else {
			$sp = $this->db->query('CALL sp_role_select(NULL)');
			$op = $sp->fetchAll();
		}

		return $op;
	}

	public function getRoleTask($id)
	{
		$sp = $this->db->prepare('CALL sp_role_task_select(?)');
		$sp->execute(array($id));
		$op = $sp->fetchAll();

		return $op;
	}
}
