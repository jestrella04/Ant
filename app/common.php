<?php

use PHPMailer\PHPMailer\PHPMailer;

function slugify($text, $makeLowerCase = true)
{
	// replace non letter or digits by -
	$text = preg_replace('~[^\\pL\d]+~u', '-', $text);

	// trim
	$text = trim($text, '-');

	// transliterate
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	// lowercase
	if ($makeLowerCase) {
		$text = strtolower($text);
	}

	// remove unwanted characters
	$text = preg_replace('~[^-\w]+~', '', $text);

	if (empty($text)) {
		return 'n-a';
	}

	return $text;
}

function filterString($string)
{
	return filter_var($string, FILTER_SANITIZE_STRING);
}

function getCurrentUserId()
{
	return $_SESSION['ant_userid'];
}

function safeUrlFormat($url)
{
	$dest = '';
	$dir = dirname($_SERVER['SCRIPT_NAME']);

	if (!empty($dir) && '/' !== $dir) {
		$dest = $dir . '/';
	}

	$dest = $dest . $url;
	$dest = str_replace('//', '/', $dest);
	$dest = str_replace('\/', '/', $dest);

	return $dest;
}

function generateStrongRandomPassword($length, $add_dashes = false, $available_sets = 'luds')
{
	$sets = array();

	if (strpos($available_sets, 'l') !== false) $sets[] = 'abcdefghjkmnpqrstuvwxyz';
	if (strpos($available_sets, 'u') !== false) $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
	if (strpos($available_sets, 'd') !== false) $sets[] = '23456789';
	if (strpos($available_sets, 's') !== false) $sets[] = '!@#$%&*?';

	$all = '';
	$password = '';

	foreach ($sets as $set) {
		$password .= $set[array_rand(str_split($set))];
		$all .= $set;
	}

	$all = str_split($all);

	for ($i = 0; $i < $length - count($sets); $i++) $password .= $all[array_rand($all)];

	$password = str_shuffle($password);

	if (!$add_dashes) return $password;

	$dash_len = floor(sqrt($length));
	$dash_str = '';

	while (strlen($password) > $dash_len) {
		$dash_str .= substr($password, 0, $dash_len) . '-';
		$password = substr($password, $dash_len);
	}

	$dash_str .= $password;

	return $dash_str;
}

function validatePasswordStrenght($password)
{
	return preg_match('/^(?=.*[\d])(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*])[\w!@#$%^&*]{8,}$/', $password);
}

function sendMail($toName, $toEmail, $subject, $message)
{
	$mail = new PHPMailer();
	$mailMethod = null !== getenv('MAIL_METHOD') ? getenv('MAIL_METHOD') : 'Mail';

	if ('smtp' == strtolower($mailMethod)) {
		// SMTP Server settings
		//$mail->SMTPDebug = 2;
		$mail->isSMTP();
		$mail->Host = getenv('SMTP_HOST');
		$mail->SMTPAuth = true;
		$mail->Username = getenv('SMTP_USER');
		$mail->Password = getenv('SMTP_PASS');
		$mail->SMTPSecure = 'tls';
		$mail->Port = getenv('SMTP_PORT');
	} else if ('mail' == strtolower($mailMethod)) {
		$mail->isMail();
	}

    // Recipients
	$mail->setFrom($this->settings['company_email'], 'Ant BT');
	$mail->addAddress($toEmail, $toName);

    // Content
	$mail->isHTML(true);
	$mail->Subject = $subject;
	$mail->Body = $message;
    //$mail->AltBody = '';

    // Send the message, check for errors
	if (!$mail->send()) {
		$this->container->get('logger')->info('Message could not be sent. Mailer Error: ' . $mail->ErrorInfo);
		return false;
	} else {
		return true;
	}
}

function getStatusBadge($status)
{
	$status = strtolower($status);

	if ('pending' == $status) {
		return 'badge-info';
	} else if ('confirmed' == $status) {
		return 'badge-warning';
	} else if ('dismissed' == $status) {
		return 'badge-light';
	} else if ('assigned' == $status) {
		return 'badge-primary';
	} else if ('resolved' == $status) {
		return 'badge-success';
	} else if ('reopened' == $status) {
		return 'badge-danger';
	} else {
		return 'badge-dark';
	}
}

function getActivityString($action)
{
	$action = strtolower($action);

	if ('created_issue' == $action) {
		return 'created the issue';
	} else if ('updated_issue' == $action) {
		return 'updated the issue';
	} else if ('commented_issue' == $action) {
		return 'added a comment on the issue';
	} else if ('uploaded_attachment' == $action) {
		return 'attached a file to the issue';
	} else {
		return 'completed an unknown action on the issue';
	}
}

function printLabels($labels)
{
	if (!empty($labels)) {
		$output = '';

		foreach ($labels as $label) {
			$title = $label['title'];
			$slug = $label['slug'];
			$output = $output . '<a href="label/' . $slug . '" class="badge badge-secondary">' . $title . '</a>' . PHP_EOL;
		}
	} else {
		$output = 'There are currently no labels.' . PHP_EOL;
	}

	return $output;
}

function printAttachments($files)
{
	if (!empty($files)) {
		$output = '<ul>' . PHP_EOL;

		foreach ($files as $file) {
			$output = $output . '	<li>' . $file['title'] . ' [<a href="static/uploads/' . $file['filename'] . '">' . $file['filename'] . '</a>]</li>' . PHP_EOL;
		}

		$output = $output . '</ul>' . PHP_EOL;
	} else {
		$output = '<p>There are currently no attachments.</p>' . PHP_EOL;
	}

	return $output;
}

function errorType2Text($type)
{
	if ('danger' === $type) return 'Oops... Something went wrong!';
	if ('success' === $type) return 'Whoray... Everything looks good!';
}
