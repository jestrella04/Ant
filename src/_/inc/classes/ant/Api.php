<?php
namespace Ant;

use PDO;

class Api
{
    private $dbo = null;
    private $database = null;
    private $validApiCalls = array();

    public function __construct()
    {
        $this->database = new Database();

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

    private function isValidApiCall( $requestMethod )
    {
        if ( in_array( $requestMethod, $this->validApiCalls ) )
        {
            return true;
        }

        return false;
    }

    private function databaseOpen()
    {
        $this->dbo = $this->database->open();
    }

    private function databaseClose()
    {
        $this->database->close();
        $this->database = null;
        $this->dbo = null;
    }

    public function executeApiCall( $requestMethod, $requestParams )
    {
        if ( $this->isValidApiCall( $requestMethod ) )
        {
            $this->databaseOpen();
            $response = $this->$requestMethod( $requestParams );
            $this->databaseClose();

            return formatApiResponse( '1', 'The request was completed successfully', $response );
        }

        else
        {
            return formatApiResponse( '1', 'The requested method does not exist' );
        }
    }

    public function clientSessionPrepare( $params )
    {
        $clientSessionUser = $params[0];
        $clientSessionDebug = $params[1];

        $query = $this->dbo->query("CALL sp_client_session_prepare( '$clientSessionUser', $clientSessionDebug )");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $data = $query->fetchAll();

        return $data;
    }
}
