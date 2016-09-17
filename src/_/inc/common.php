<?php
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

function formatApiResponse($result, $message, $params = array())
{
	$data = array();

	if (isset($result) && ! empty($message) && is_array($params))
	{
		$data = array(
			'result' => $result,
			'response' => $message,
			'params' => $params
		);
	}

	else
	{
		$data = array(
			'result' => 0,
			'message' => "The request data is invalid",
			'params' => array()
		);
	}

	return json_encode($data);
}
