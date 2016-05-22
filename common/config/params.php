<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'admin_email'=> 'salimrahza@gmail.com',
    'user.passwordResetTokenExpire' => 3600,
    'site_url' => stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://'.$_SERVER['HTTP_HOST'] : 'http://'.$_SERVER['HTTP_HOST'],
    //set user roleid
    'userroles'=>['super_admin'=>'1','admin'=>'2'],
    'roles'=>['super_admin'=>'1','admin'=>'2'],

    //get user rolename 
    'userrole_name'=>['1'=>'Super Admin','2'=>'Admin'],
];
