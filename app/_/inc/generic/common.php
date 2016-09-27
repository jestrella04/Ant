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

function printLink($destination, $text='', $title = '', $icon = '')
{
	if (! empty($icon))
	{
		$text = printIcon($icon) . " $text";
	}

	return '<a href="'.$destination.'" title="'.$title.'">'.$text.'</a>';
}

function printIcon($icon)
{
	return '<i class="fa '.$icon.'" aria-hidden="true"></i>';
}

function printStatus($status, $description)
{
	switch ($status)
	{
		case 'Pending':
			return '<span class="label label-default" title="'.$description.'">'.$status.'</span>';
			break;

		case 'Confirmed':
			return '<span class="label label-warning" title="'.$description.'">'.$status.'</span>';
			break;

		case 'Dismissed':
			return '<span class="label label-danger" title="'.$description.'">'.$status.'</span>';
			break;

		case 'Assigned':
			return '<span class="label label-primary" title="'.$description.'">'.$status.'</span>';
			break;

		case 'Resolved':
			return '<span class="label label-sucess" title="'.$description.'">'.$status.'</span>';
			break;

		case 'Reopened':
			return '<span class="label label-info" title="'.$description.'">'.$status.'</span>';
			break;

		default:
		return '<span class="label label-default" title="'.$description.'">'.$status.'</span>';
		break;
	}
}

function printActivity($user, $action, $issueId)
{
	switch ($action)
	{
		case 'created':
		return "$user created the issue <a href=\"index.php/issue/$issueId\">$issueId</a>.";
		break;

		case 'updated':
		return "$user updated the issue <a href=\"index.php/issue/$issueId\">$issueId</a>.";
		break;

		case 'commented':
		return "$user added a comment on the issue <a href=\"index.php/issue/$issueId\">$issueId</a>.";
		break;

		case 'attached':
		return "$user attached a file to the issue <a href=\"index.php/issue/$issueId\">$issueId</a>.";
		break;

		default:
		return "$user completed an unknown action on issue <a href=\"index.php/issue/$issueId\">$issueId</a>.";
		break;
	}
}
