<?php
namespace Ant;

use PDO;

class Api extends Ant
{
    private $validApiCalls = array();

    public function __construct()
    {
        parent::__construct();

        $this->validApiCalls = array(
            'issueCategoryCreate',
            'issueCategoryDelete',
            'issueCategoryGet',
            'issueCategoryUpdate',
            'issueCommentAdd',
            'issueCommentsGet',
            'issueCreate',
            'issueDelete',
            'issueGet',
            'issueFileGet',
            'issueFileAdd',
            'issueFileDelete',
            'issueTagsGet',
            'issueUpdate',
            'projectCreate',
            'projectDelete',
            'projectGet',
            'projectUpdate',
            'reportIssues',
            'reportProjects',
            'reportActivity',
            'userCreate',
            'userDelete',
            'userGet',
            'userPasswordUpdate',
            'userPermissionGet',
            'userRoleCreate',
            'userRoleDelete',
            'userRoleGet',
            'userRoleUpdate',
            'userUpdate'
        );
    }

    private function isValidApiCall($requestMethod)
    {
        if (in_array($requestMethod, $this->validApiCalls))
        {
            return true;
        }

        return false;
    }

    public function executeApiCall($requestMethod, $requestParams)
    {
        if ($this->isValidApiCall($requestMethod))
        {
            $this->databaseOpen();
            $response = $this->$requestMethod($requestParams);
            $this->databaseClose();

            return $response;
        }

        return false;
    }

    public function issueFileAdd($params)
    {
        $issueId = $params['user_id'];
        $fileName = $params['file_name'];
        $fileDescription = $params['file_description'];

        $query = $this->dbo->query("CALL sp_issue_file_add($issueId, '$fileName', '$fileDescription')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function issueFileDelete($params)
    {
        $fileName = $params['file_name'];

        $query = $this->dbo->query("CALL sp_issue_file_delete('$fileName')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function issueCategoryCreate($params)
    {
        $categoryName = $params['category_name'];
        $categoryDesc = $params['category_desc'];

        $query = $this->dbo->query("CALL sp_issue_category_create('$categoryName', '$categoryDesc')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function issueCategoryDelete($params)
    {
        $categoryId = $params['category_id'];

        $query = $this->dbo->query("CALL sp_issue_category_delete($categoryId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function issueCategoryGet($params)
    {
        $categoryId = $params['category_id'];

        $query = $this->dbo->query("CALL sp_issue_category_get($categoryId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function issueCategoryUpdate($params)
    {
        $categoryId = $params['category_id'];
        $categoryName = $params['category_name'];
        $categoryDesc = $params['category_desc'];

        $query = $this->dbo->query("CALL sp_issue_category_update($categoryId, '$categoryName', '$categoryDesc')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function issueCommentAdd($params)
    {
        $issueId = $params['issue_id'];
        $userId = $params['user_id'];
        $commentText = $params['comment_text'];

        $query = $this->dbo->query("CALL sp_issue_comment_add($issueId, $userId, '$commentText')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function issueCommentGet($params)
    {
        $issueId = $params['issue_id'];

        $query = $this->dbo->query("CALL sp_issue_comment_get($issueId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function issueCreate($params)
    {
        $projectId = $params['project_id'];
        $categoryId = $params['category_id'];
        $issueTitle = $params['issue_title'];
        $issueDesc = $params['issue_desc'];
        $userReporter = $params['user_reporter'];
        $statusId = $params['status_id'];
        $priorityId = $params['priority_id'];

        $query = $this->dbo->query("CALL sp_issue_create($projectId, $categoryId, '$issueTitle', '$issueDesc', $userReporter, $statusId, $priorityId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function issueDelete($params)
    {
        $issueId = $params['issue_id'];

        $query = $this->dbo->query("CALL sp_issue_delete($issueId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function issueGet($params)
    {
        $issueId = $params['issue_id'];

        $query = $this->dbo->query("CALL sp_issue_get($issueId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function issueFileGet($params)
    {
        $issueId = $params['issue_id'];

        $query = $this->dbo->query("CALL sp_issue_file_get($issueId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function issueTagGet($params)
    {
        $issueId = $params['issue_id'];

        $query = $this->dbo->query("CALL sp_issue_tag_get($issueId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function issueUpdate($params)
    {
        $issueId = $params['issue_id'];
        $projectId = $params['project_id'];
        $categoryId = $params['category_id'];
        $issueTitle = $params['issue_title'];
        $issueDesc = $params['issue_desc'];
        $statusId = $params['status_id'];
        $priorityId = $params['priority_id'];
        $resolutionId = $params['resolution_id'];

        $query = $this->dbo->query("CALL sp_issue_update($issueId, $projectId, $categoryId, '$issueTitle', '$issueDesc', $statusId, $priorityId, $resolutionId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function projectCreate($params)
    {
        $projectName = $params['project_name'];
        $projectDesc = $params['project_desc'];

        $query = $this->dbo->query("CALL sp_project_create('$projectName', '$projectDesc')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function projectDelete($params)
    {
        $projectId = $params['project_id'];

        $query = $this->dbo->query("CALL sp_project_delete($projectId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function projectGet($params)
    {
        $projectId = $params['project_id'];

        $query = $this->dbo->query("CALL sp_project_get($projectId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function projectUpdate($params)
    {
        $projectId = $params['project_id'];
        $projectName = $params['project_name'];
        $projectDesc = $params['project_desc'];

        $query = $this->dbo->query("CALL sp_project_update($projectId, '$projectName', '$projectDesc')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function reportIssues($params)
    {
        $projectId = $params['project_id'];
        $offset = $params['report_offset'];
        $count = $params['report_count'];

        $query = $this->dbo->query("CALL sp_report_issues($projectId, $offset, $count)");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $data = $query->fetchAll();

        return $data;
    }

    public function reportProjects()
    {
        $query = $this->dbo->query("CALL sp_report_projects()");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $data = $query->fetchAll();

        return $data;
    }

    public function reportActivity($params)
    {
        $offset = $params['report_offset'];
        $count = $params['report_count'];

        $query = $this->dbo->query("CALL sp_report_activity($offset, $count)");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $data = $query->fetchAll();

        return $data;
    }

    public function userCreate($params)
    {
        $userId = $params['user_id'];
        $userRoleId = $params['role_id'];
        $userName = $params['user_name'];
        $userEmail = $params['user_email'];
        $userPassword = $params['user_password'];

        $query = $this->dbo->query("CALL sp_user_create('$userId', $userRoleId, '$userName', '$userEmail', '$userPassword')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function userDelete($params)
    {
        $userId = $params['user_id'];

        $query = $this->dbo->query("CALL sp_user_delete('$userId')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function userGet($params)
    {
        $userId = $params['user_id'];

        $query = $this->dbo->query("CALL sp_user_get('$userId')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function userPasswordUpdate($params)
    {
        $userId = $params['user_id'];
        $userPassword = $params['user_password'];

        $query = $this->dbo->query("CALL sp_user_password_update('$userId', '$userPassword')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function userPermissionGet($params)
    {
        $userId = $params['user_id'];

        $query = $this->dbo->query("CALL sp_user_permission_get('$userId')");
        $query->setFetchMode(PDO::FETCH_COLUMN, 0);
        $data = $query->fetchAll();

        return $data;
    }

    public function userRoleCreate($params)
    {
        $userRoleName = $params['role_name'];
        $userRoleDesc = $params['role_desc'];

        $query = $this->dbo->query("CALL sp_user_role_create('$userRoleName', '$userRoleDesc')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function userRoleDelete($params)
    {
        $userRoleId = $params['role_id'];

        $query = $this->dbo->query("CALL sp_user_role_delete($userRoleId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function userRoleGet($params)
    {
        $userRoleId = $params['role_id'];

        $query = $this->dbo->query("CALL sp_user_role_get($userRoleId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function userRoleUpdate($params)
    {
        $userRoleId = $params['role_id'];
        $userRoleName = $params['role_name'];
        $userRoleDesc = $params['role_desc'];

        $query = $this->dbo->query("CALL sp_user_role_update($userRoleId, '$userRoleName', '$userRoleDesc')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function userUpdate($params)
    {
        $userId = $params['user_id'];
        $userRoleId = $params['role_id'];
        $userName = $params['user_name'];
        $userEmail = $params['user_email'];
        $userActive = $params['user_active'];

        $query = $this->dbo->query("CALL sp_user_update($projectId, $userRoleId, '$userName', '$userEmail', $userActive)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
}
