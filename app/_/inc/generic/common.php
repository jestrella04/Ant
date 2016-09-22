<?php
namespace Ant;

function slugify($text, $makeLowerCase = true)
{
	// replace non letter or digits by -
	$text = preg_replace('~[^\\pL\d]+~u', '-', $text);

	// trim
	$text = trim($text, '-');

	// transliterate
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	// lowercase
	if ($makeLowerCase)
	{
		$text = strtolower($text);
	}

	// remove unwanted characters
	$text = preg_replace('~[^-\w]+~', '', $text);

	if (empty($text))
	{
		return 'n-a';
	}

	return $text;
}

function scrubText($text)
{
	if (! isset($text) || trim($text) === '')
	{
		return '';
	}

	return trim($text);
}

/*function formatApiResponse($result, $response, $params)
{
	$data = array();

	if (isset($result) && ! empty($response) && is_array($params))
	{
		$data = array(
			'result' => $result,
			'response' => $response,
			'params' => $params
		);
	}

	return json_encode($data);
}*/

function userPermissionCheck($permission, $permissionList)
{
	if (is_array($permissionList) && in_array($permission, $permissionList))
	{
		return true;
	}

	return false;
}