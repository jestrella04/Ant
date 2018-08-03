<?php

namespace App\Controllers;

class CategoryController extends BaseController
{
    public function getCategory($id = '', $json = false)
    {
        if (!empty($id)) {
			$sp = $this->db->prepare('CALL sp_issue_category_select(?)');
			$sp->execute(array($id));
			$op = $sp->fetch();
		} else {
			$sp = $this->db->query('CALL sp_issue_category_select(NULL)');
			$op = $sp->fetchAll();
		}

		if ($json) {
			$op = json_encode($op);
		} 

		return $op;
    }
}
