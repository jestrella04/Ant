<?php

function IsValidApiCall( $method )
{
  $method = 'sp_' . $method;

  $valid_api_calls = array(
    'sp_client_session_prepare',
    'sp_issue_attachment_add',
    'sp_issue_attachment_delete',
    'sp_issue_category_create',
    'sp_issue_category_delete',
    'sp_issue_category_get',
    'sp_issue_category_update',
    'sp_issue_comment_add',
    'sp_issue_create',
    'sp_issue_delete',
    'sp_issue_get',
    'sp_issue_update',
    'sp_project_create',
    'sp_project_delete',
    'sp_project_get',
    'sp_project_update',
    'sp_report_issue',
    'sp_report_project',
    'sp_report_recent_activity',
    'sp_user_create',
    'sp_user_delete',
    'sp_user_get',
    'sp_user_password_update',
    'sp_user_permission_get',
    'sp_user_role_create',
    'sp_user_role_delete',
    'sp_user_role_get',
    'sp_user_role_update',
    'sp_user_update'
  );

  if ( in_array( $method, $valid_api_calls ) )
  {
    return true;
  }

  return false;
}

function EcexuteApiCall( $request_method, $request_params )
{
  $db = new Database();

  $db->Connect();
  call_user_func_array( $request_method, $request_params );
  $db->Disconnect();
}

function client_session_prepare( $client_session_user, $client_session_show_errors )
{
  $query = $db->query( "CALL sp_client_session_prepare( $client_session_user, $client_session_show_errors )" );
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $data = $query->fetchAll();

  return FormatApiResponse( 1, 'The request was completed successfully', $data );
}
