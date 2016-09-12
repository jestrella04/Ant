<?php
require( '_/inc/init.php' );

$api_request = htmlentities( $_POST['ant_request_data'] );

if ( ! is_array( $api_request ) )
{
  exit( FormatApiResponse( 0, "The request data is invalid" ) );
}

else
{
  $api_request_method = $api_request['api_request_method'];
  $api_request_params = $api_request['api_request_params'];

  if ( empty( $api_request_method ) || ! is_array( $api_request_params ) )
  {
    exit( FormatApiResponse( 0, "The request data is invalid" ) );
  }

  elseif ( IsValidApiCall( $api_request_method ) && function_exists( $api_request_method ) )
  {
    ExecuteApiCall( $api_request_method, $api_request_params );
  }

  else
  {
    exit( FormatApiResponse( 0, "The requested method does not exist" ) );
  }
}
?>
