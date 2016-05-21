<?php

Yii::setAlias('common_base', '/students_era/common/');
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');

//START: site configuration
Yii::setAlias('site_title', 'Students Era');
Yii::setAlias('site_footer', 'Students Era');
//END: site configuration
//START: BACK-END message
//START: Admin users
Yii::setAlias('admin_user_change_password_msg', 'Your password has been changed successfully !');
Yii::setAlias('admin_user_forget_password_msg', 'E-Mail has been sent with new password successfully !');
//END: Admin user
//START: Email template message
Yii::setAlias('email_template_add_message', 'Template has been added successfully !');
//END: Email template message

//END: BACK-END message