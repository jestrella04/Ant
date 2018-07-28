<?php

/* Display screens */
$app->get('/', 'RenderViewController:showHome')->setname('home');
$app->get('/login', 'RenderViewController:showLogin')->setname('login');
$app->get('/forgot-password', 'RenderViewController:showForgotPassword')->setname('forgot-password');
$app->get('/change-password', 'RenderViewController:showChangePassword')->setname('change-password');

/* Data validation */
$app->post('/login', 'DataValidationController:processPostLoginRequest')->setName('post-login');
$app->post('/forgot-password', 'DataValidationController:processPostForgotPasswordRequest')->setname('post-forgot-password');
$app->post('/change-password', 'DataValidationController:processPostChangePasswordRequest')->setname('post-change-password');
$app->any('/logout', 'DataValidationController:processLogoutRequest')->setName('logout');
