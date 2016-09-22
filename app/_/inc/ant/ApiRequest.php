<?php
namespace Ant;

class ApiRequest
{
    private $api_request_data = array();

    public function __construct($request_data)
    {
        $this->api_request_data = $request_data;
    }

    public function getResponse()
    {
        if (! is_array($this->api_request_data) || empty($this->api_request_data) )
        {
            return formatApiResponse( "0", "The request data is invalid" );
        }

        else
        {
            $api_request_method = $this->api_request_data['api_request_method'];
            $api_request_params = $this->api_request_data['api_request_params'];

            if (empty($api_request_method) || ! is_array($api_request_params))
            {
                return formatApiResponse( "0", "The request data is invalid" );
            }

            else
            {
                return executeApiCall($api_request_method, $api_request_params);
            }
        }
    }
}
