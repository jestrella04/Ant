<?php
namespace Ant\Ant;

use Database;

class Api
{
    private $dbo = null;
    private $database = null;
    private $valid_api_calls = array();

    public function __construct()
    {
        $this->database = new Database();

        $this->valid_api_calls = array(
            'ClientSessionPrepare',
            'IssueAttachmentAdd',
            'IssueAttachmentDelete',
            'IssueCategoryCreate',
            'IssueCategoryDelete',
            'IssueCategoryGet',
            'IssueCategoryUpdate',
            'IssueCommentAdd',
            'IssueCreate',
            'IssueDelete',
            'IssueGet',
            'IssueUpdate',
            'ProjectCreate',
            'ProjectDelete',
            'ProjectGet',
            'ProjectUpdate',
            'ReportIssue',
            'ReportProject',
            'ReportRecentActivity',
            'UserCreate',
            'UserDelete',
            'UserGet',
            'UserPasswordUpdate',
            'UserPermissionGet',
            'UserRoleCreate',
            'UserRoleDelete',
            'UserRoleGet',
            'UserRoleUpdate',
            'UserUpdate'
        );
    }

    private function isValidApiCall( $request_method )
    {
        if ( in_array( $request_method, $this->valid_api_calls ) )
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

    public function executeApiCall( $request_method, $request_params )
    {
        if ( $this->isValidApiCall( $request_method ) )
        {
            $this->databaseOpen();
            $response = $this->$request_method( $request_params );
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
        $client_session_user = $params[0];
        $client_session_show_errors = $params[1];

        $query = $this->dbo->query( "CALL sp_client_session_prepare( '$client_session_user', $client_session_show_errors )" );
        $query->setFetchMode( PDO::FETCH_ASSOC );
        $data = $query->fetchAll();

        return $data;
    }
}
