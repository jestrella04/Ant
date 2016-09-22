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
            'clientSessionPrepare',
            'issueAttachmentAdd',
            'issueAttachmentDelete',
            'issueCategoryCreate',
            'issueCategoryDelete',
            'issueCategoryGet',
            'issueCategoryUpdate',
            'issueCommentAdd',
            'issueCreate',
            'issueDelete',
            'issueGet',
            'issueUpdate',
            'projectCreate',
            'projectDelete',
            'projectGet',
            'projectUpdate',
            'reportIssue',
            'reportProject',
            'reportRecentActivity',
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

    public function issueAttachmentAdd($params)
    {
        $issueId = $params[0];
        $fileName = $params[1];
        $fileDescription = $params[2];

        $query = $this->dbo->query("CALL sp_issue_attachment_add($issueId, '$fileName', '$fileDescription')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function issueAttachmentDelete($params)
    {
        $fileName = $params[0];

        $query = $this->dbo->query("CALL sp_issue_attachment_delete('$fileName')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function issueCategoryCreate($params)
    {
        $categoryName = $params[0];
        $categoryDesc = $params[1];

        $query = $this->dbo->query("CALL sp_issue_category_create('$categoryName', '$categoryDesc')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function issueCategoryDelete($params)
    {
        $categoryId = $params[0];

        $query = $this->dbo->query("CALL sp_issue_category_delete($categoryId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function issueCategoryGet($params)
    {
        $categoryId = $params[0];

        $query = $this->dbo->query("CALL sp_issue_category_get($categoryId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function issueCategoryUpdate($params)
    {
        $categoryId = $params[0];
        $categoryName = $params[1];
        $categoryDesc = $params[2];

        $query = $this->dbo->query("CALL sp_issue_category_update($categoryId, '$categoryName', '$categoryDesc')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function issueCommentAdd($params)
    {
        $issueId = $params[0];
        $userId = $params[1];
        $commentText = $params[2];

        $query = $this->dbo->query("CALL sp_issue_comment_add($issueId, $userId, '$commentText')");
        $data = $query->fetch(PDO::FETCH_ASSOC);
    }

    public function issueCreate($params)
    {
        $projectId = $params[0];
        $categoryId = $params[1];
        $issueTitle = $params[2];
        $issueDesc = $params[3];
        $userReporter = $params[4];
        $statusId = $params[5];
        $priorityId = $params[6];

        $query = $this->dbo->query("CALL sp_issue_create($projectId, $categoryId, '$issueTitle', '$issueDesc', $userReporter, $statusId, $priorityId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function issueDelete($params)
    {
        $issueId = $params[0];

        $query = $this->dbo->query("CALL sp_issue_delete($issueId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function issueGet($params)
    {
        $issueId = $params[0];

        $query = $this->dbo->query("CALL sp_issue_get($issueId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function issueUpdate($params)
    {
        $issueId = $params[0];
        $projectId = $params[1];
        $categoryId = $params[2];
        $issueTitle = $params[3];
        $issueDesc = $params[4];
        $statusId = $params[5];
        $priorityId = $params[6];
        $resolutionId = $params[7];
        $duplicateId = $params[8];

        $query = $this->dbo->query("CALL sp_issue_update($issueId, $projectId, $categoryId, '$issueTitle', '$issueDesc', $statusId, $priorityId, $resolutionId, $duplicateId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function projectCreate($params)
    {
        $projectName = $params[0];
        $projectDesc = $params[1];

        $query = $this->dbo->query("CALL sp_project_create('$projectName', '$projectDesc')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function projectDelete($params)
    {
        $projectId = $params[0];

        $query = $this->dbo->query("CALL sp_project_delete($projectId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function projectGet($params)
    {
        $projectId = $params[0];

        $query = $this->dbo->query("CALL sp_project_get($projectId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function projectUpdate($params)
    {
        $projectId = $params[0];
        $projectName = $params[1];
        $projectDesc = $params[2];

        $query = $this->dbo->query("CALL sp_project_update($projectId, '$projectName', '$projectDesc')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function reportIssue($params)
    {
        $counterStart = $params[0];
        $counterEnd = $params[1];

        $query = $this->dbo->query("CALL sp_report_issue($counterStart, $counterEnd)");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $data = $query->fetchAll();

        return $data;
    }

    public function reportProject($params)
    {
        $projectId[0];
        $counterStart = $params[1];
        $counterEnd = $params[2];

        $query = $this->dbo->query("CALL sp_report_project($projectId, $counterStart, $counterEnd)");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $data = $query->fetchAll();

        return $data;
    }

    public function reportRecentActivity($params)
    {
        $counterStart = $params[0];
        $counterEnd = $params[1];

        $query = $this->dbo->query("CALL sp_report_recent_activity($counterStart, $counterEnd)");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $data = $query->fetchAll();

        return $data;
    }

    public function userCreate($params)
    {
        $userId = $params[0];
        $userRoleId = $params[1];
        $userName = $params[2];
        $userEmail = $params[3];
        $userPassword = $params[4];

        $query = $this->dbo->query("CALL sp_user_create('$userId', $userRoleId, '$userName', '$userEmail', '$userPassword')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function userDelete($params)
    {
        $userId = $params[0];

        $query = $this->dbo->query("CALL sp_user_delete('$userId')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function userGet($params)
    {
        $userId = $params[0];

        $query = $this->dbo->query("CALL sp_user_get('$userId')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function userPasswordUpdate($params)
    {
        $userId = $params[0];
        $userPassword = $params[1];

        $query = $this->dbo->query("CALL sp_user_password_update('$userId', '$userPassword')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function userPermissionGet($params)
    {
        $userId = $params[0];

        $query = $this->dbo->query("CALL sp_user_permission_get('$userId')");
        $query->setFetchMode(PDO::FETCH_COLUMN, 0);
        $data = $query->fetchAll();

        return $data;
    }

    public function userRoleCreate($params)
    {
        $userRoleName = $params[0];
        $userRoleDesc = $params[1];

        $query = $this->dbo->query("CALL sp_user_role_create('$userRoleName', '$userRoleDesc')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function userRoleDelete($params)
    {
        $userRoleId = $params[0];

        $query = $this->dbo->query("CALL sp_user_role_delete($userRoleId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function userRoleGet($params)
    {
        $userRoleId = $params[0];

        $query = $this->dbo->query("CALL sp_user_role_get($userRoleId)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function userRoleUpdate($params)
    {
        $userRoleId = $params[0];
        $userRoleName = $params[1];
        $userRoleDesc = $params[2];

        $query = $this->dbo->query("CALL sp_user_role_update($userRoleId, '$userRoleName', '$userRoleDesc')");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    public function userUpdate($params)
    {
        $userId = $params[0];
        $userRoleId = $params[1];
        $userName = $params[2];
        $userEmail = $params[3];
        $userActive = $params[4];

        $query = $this->dbo->query("CALL sp_user_update($projectId, $userRoleId, '$userName', '$userEmail', $userActive)");
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
}
