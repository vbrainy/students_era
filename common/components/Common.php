<?php

namespace common\components;

use common\models\Questions;
use common\models\ProblemSets;
use common\models\SystemConfig;
use Yii;
use yii\helpers\Html;

class Common {
    
    /**
     * function: sendMail()
     * For send apple push notification.
     * @param string $ssToEmail
     * @param string $asFromEmail
     * @param string $ssSubject
     * @param string $ssBody
     * @param template $attach
     */
    public static function sendMail($ssToEmail, $asFromEmail, $ssSubject, $ssBody, $attach = false) {
        $result = Yii::$app->mail->compose()
                ->setFrom([$asFromEmail => "Admin"])
                ->setTo($ssToEmail)
                ->setSubject($ssSubject)
                ->setHtmlBody($ssBody)
                ->send();
        return true;
    }

    /**
     * function: MailTemplate()
     * For send mail.
     * @param Array $replaceString
     * @param  string $Url
     */
    public static function MailTemplate($replaceString, $body) {

        $logo_front_url = Yii::$app->params['site_url'] . Yii::$app->request->baseUrl;
        $logo_img_url = Yii::$app->params['site_url'] . Yii::$app->request->baseUrl . "/img/logo-big.png";
        $logo_url = (!empty(Yii::$app->urlManagerFrontEnd)) ? Yii::$app->urlManagerFrontEnd->createUrl('site/index') :'';
        /* $url = '';
          $url_logo = ''; */
        if (!empty($replaceString)) {
            foreach ($replaceString as $key => $value) {
                $replacekey[] = $key;
                $replacevalue[] = $value;
            }
        }

        $replacekey[] = '{logo_front_url}';
        $replacekey[] = '{logo_img_url}';
        $replacekey[] = '{logo_url}';
        $replacevalue[] = $logo_front_url;
        $replacevalue[] = $logo_img_url;
        $replacevalue[] = $logo_url;
        /* p($replacekey,0);
          p($replacevalue,0); */
        $result = str_replace(
                $replacekey, $replacevalue, $body
        );
        //  p($result);
        return $result;
    }

    /**
     * Generate randome 7 character password.
     */
    public static function generatePassword() {
        $length = 7;
        $strength = 0;
        $vowels = 'aeuy';
        $consonants = 'bdghjmnpqrstvz';
        if ($strength & 1) {
            $consonants .= 'BDGHJLMNPQRSTVWXZ';
        }
        if ($strength & 2) {
            $vowels .= "AEUY";
        }
        if ($strength & 4) {
            $consonants .= '23456789';
        }
        if ($strength & 8) {
            $consonants .= '@#$%';
        }

        $password = '';
        $alt = time() % 2;
        for ($i = 0; $i < $length; $i++) {
            if ($alt == 1) {
                $password .= $consonants[(rand() % strlen($consonants))];
                $alt = 0;
            } else {
                $password .= $vowels[(rand() % strlen($vowels))];
                $alt = 1;
            }
        }
        return $password;
    }

    public static function array_pluck($arr, $toPlucked) {
        return array_map(function($arr) use($toPlucked) {
                    return $arr["$toPlucked"];
                }, $arr);
    }

    /**
     * Convert Html to pdf 
     * @param html $html
     * @return pdf
     */
    public static function ConvertArrayExcel($results, $rolename) {
        //$pdf = Yii::$app->pdf->PDF('/usr/bin/wkhtmltopdf');

        $fileName = $rolename . 'info.xls';
        header("Content-type: application/vnd.ms-excel; name='excel'");
        header('Content-Description: File Transfer');
        header("Content-Disposition: attachment; filename={$fileName}");
        header("Pragma: no-cache");
        header("Expires: 0");
        header("Pragma: public");
        $fh = fopen('php://output', 'w');

        $headerDisplayed = false;

        foreach ($results as $data) {

            // Add a header row if it hasn't been added yet
            if (!$headerDisplayed) {
                // Use the keys from $data as the titles
                fputcsv($fh, array_keys($data));
                $headerDisplayed = true;
            }
            // Put the data into the stream
            fputcsv($fh, $data);
        }
        // Close the file
        fclose($fh);

        // Make sure nothing else is sent, our file is done
        return true;
    }

    /**
     * Array To CSV - Download CSV File
     * @param  array $results
     * @return CSV File
     */
    public static function ConvertArrayCsv($results, $rolename) {
        $fileName = $rolename . 'info.csv';
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header('Content-Description: File Transfer');
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; charset=ISO-8859-2;filename={$fileName}");
        header("Expires: 0");
        header("Pragma: public");
        $fh = fopen('php://output', 'w');

        $headerDisplayed = false;

        foreach ($results as $data) {

            // Add a header row if it hasn't been added yet
            if (!$headerDisplayed) {
                // Use the keys from $data as the titles
                fputcsv($fh, array_keys($data));
                $headerDisplayed = true;
            }
            // Put the data into the stream
            fputcsv($fh, $data);
        }
        // Close the file
        fclose($fh);

        // Make sure nothing else is sent, our file is done
        return true;
    }

    /*
     * Set designing for Grideview update button
     */

    public static function template_update_button($url, $model) {
        return Html::a('<i class="icon-pencil icon-white"></i> Edit', $url, [
                    'title' => Yii::t('yii', 'Edit'),
                    'class' => 'btn btn-primary'
        ]);
    }

    /*
     * Set designing for Grideview delete button
     */

    public static function template_delete_button($url, $model, $confirmmessage = false) {
        $confirmmessage = $confirmmessage ? : "Are you sure you want to delete it?";
        return Html::a('<i class="icon-remove icon-white"></i> Delete', $url, [
                    'title' => Yii::t('yii', 'Delete'),
                    'class' => 'btn btn-danger deleteGlobalButton',
                    'data-confirm' => $confirmmessage,
                    "data-method" => "post",
                    "data-pjax" => "0"
        ]);
    }

    /*
     * Set designing for Grideview view button
     */

    public static function template_view_button($url, $model) {
        return Html::a('<i class="fa fa-external-link"></i> View', $url, [
                    'title' => Yii::t('yii', 'View'),
                    'class' => 'btn yellow margin-bottom-5',
                    'target' => '_blanck'
        ]);
    }

    //Change Status.
    public static function template_user_status_change_button($model, $labelname, $status, $message, $sendMail = false) {
        // set classname for decline user status
        if ($status == '2') {
            $labelicon = 'fa-times';
            $className = 'grey-cascade';
        }
        // set classname for Approved user status
        if ($status == '1') {
            $labelicon = 'fa-check';
            $className = 'green';
        }
        // set redirect url 
        $url = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;
        // set confirmation message
        $confirmmessage = 'Are you sure you want to make it ' . $labelname . '?';

        return Html::a('<i class="fa ' . $labelicon . '"></i> ' . $labelname, Yii::$app->urlManager->createUrl(['users/change-user-status', 'id' => $model->id, 'url' => $url, 'message' => $message, 'status' => $status, 'sendmail' => '1']), [
                    'title' => Yii::t('yii', $labelname),
                   // 'class' => 'btn yellow margin-bottom-5 confirmOkButton',
                    'data-confirm' => $confirmmessage,
                    "data-method" => "post",
                    "data-pjax" => "0",
                    'class' => 'btn margin-bottom-5 confirmOkButton ' . $className
        ]);
    }

    /*
     * Change teacher status for Active or Inactive.
     */

    public static function template_status_button($model, $message) {
        $id = $model->id;
        $modelname = $model->className();
        $url = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;
        if ($model->status == '1') {
            $confirmmessage = "Are you sure you want to make it In-Active ?";
            return Html::a('<i class="fa fa-times"></i> In-Active', Yii::$app->urlManager->createUrl(['site/change-status', 'id' => $id, 'modelname' => $modelname, 'url' => $url, 'message' => $message, 'sendmail' => '1']), [
                        'title' => Yii::t('yii', 'In-Active'),
                        'data-confirm' => $confirmmessage,
                        "data-method" => "post",
                        "data-pjax" => "0",
                        'class' => 'btn grey-cascade margin-bottom-5 confirmOkButton'
            ]);
        } else {
            $confirmmessage = "Are you sure you want to make it Active ?";
            return Html::a('<i class="fa fa-check"></i> Active', Yii::$app->urlManager->createUrl(['site/change-status', 'id' => $id, 'modelname' => $modelname, 'url' => $url, 'message' => $message]), [
                        'title' => Yii::t('yii', 'Active'),
                        'data-confirm' => $confirmmessage,
                        "data-method" => "post",
                        "data-pjax" => "0",
                        'class' => 'btn green margin-bottom-5 confirmOkButton'
            ]);
        }
    }

    /*
     * Change teacher status for Approved or declined.
     */

    public static function template_acceptance_status_button($model, $message, $sendmail = false) {
        $id = $model->id;
        $modelname = $model->className();
        $url = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;
        if ($model->status == '1') {
            $confirmmessage = "Are you sure you want to make it Decline ?";
            return Html::a('<i class="fa fa-times"></i> Decline', Yii::$app->urlManager->createUrl(['users/change-user-status', 'id' => $model->id, 'url' => $url, 'message' => $message, 'status' => '2', 'sendmail' => $sendmail]), [ 'title' => Yii::t('yii', 'Decline'),
                        'data-confirm' => $confirmmessage,
                        "data-method" => "post",
                        "data-pjax" => "0",
                        'class' => 'btn grey-cascade margin-bottom-5 confirmOkButton'
            ]);
        } else {
            $confirmmessage = "Are you sure you want to make it Approve ?";
            return Html::a('<i class="fa fa-check"></i> Approve', Yii::$app->urlManager->createUrl(['users/change-user-status', 'id' => $id, 'modelname' => $modelname, 'url' => $url, 'message' => $message, 'status' => '1', 'sendmail' => $sendmail]), [
                        'title' => Yii::t('yii', 'Approve'),
                        'data-confirm' => $confirmmessage,
                        "data-method" => "post",
                        "data-pjax" => "0",
                        'class' => 'btn green margin-bottom-5 confirmOkButton'
            ]);
        }
    }

    /**
     * This function give system config by name
     */
    public static function getSystemConfig($name) {
        $systemConfigModel = new SystemConfig();
        $systemConfigData = $systemConfigModel->findOne(['name' => $name]);
        return $systemConfigData->value;
    }

    public static function createUrl($url, $param = false) {

        return ($url != "#") ? Yii::$app->urlManager->createUrl([$url]) : 'javascript:void(0);';
    }

    /**
     * function: closeColorBox()
     * For close color box popup window.
     * @param string $ssCloseScript
     */
    public static function closeColorBox() {
        /* $ssCloseScript = "<script src='" . Yii::$app->request->baseUrl . "/js/jquery.js'></script>";
          $ssCloseScript .= "<script src='" . Yii::$app->request->baseUrl . "/js/colorbox/jquery.colorbox.js'></script>";
         */
        $ssCloseScript = "<script type='text/javascript'>parent.jQuery.colorbox.close(); parent.window.location.reload(true);</script>";
        return $ssCloseScript;
    }

    public static function generateUniqueNumber($ssType) {
        switch ($ssType) {
            case 'QUESTION':
                $lastQuestionsId = Questions::find()->max('id');
                //Following generates duplicate unique numbers thats why commented
                    //$snTotalQuestion = Questions::find()->count();                
                    //return $snTotalQuestion + 1;
                return $lastQuestionsId + 1;
                break;
            case 'PROBLEM_SET':
                $lastProblemSetsId = ProblemSets::find()->max('id');              
                //Following generates duplicate unique numbers thats why commented
                    //$totalProblemSets = ProblemSets::find()->count();                
                    //return $totalProblemSets + 1;
                return $lastProblemSetsId + 1;
                break;
        }
    }

    /*
    * $keyname =  compare key name
    */
    public static function FilterMultidimensionalArray($array,$Keyname , $value){
        return array_filter($array, function($arrayValue) use($value , $Keyname) { return $arrayValue[$Keyname] == $value; } );
    }
    /*
    * find items in multidimetional array based of the compare key and value passed.
    * $array : Multidimetional array.
    * findWhat : find key name in array.
    * value : compare value with provided key name.
    */
    public static function FindItems($array,$findwhat,$value,$found=array()){
        foreach($array as $k=>$v){
                if(is_array($v)){
                    $result = find_items($v,$findwhat,$value,$found);
                    if($result === true){
                        $found[] = $v;  
                    }else{
                        $found = $result;
                    }
                }else{
                    if($k==$findwhat && $v==$value){
                        return TRUE;
                    }
                }
        }
        return $found;
        
    }
     public static function dateDiff($d1,$d2){

            $date1=strtotime($d1);
            $date2=strtotime($d2);
            $seconds = $date2 - $date1;
            $weeks = floor($seconds/604800);
            $seconds -= $weeks * 604800;
            $days = floor($seconds/86400);

            $seconds -= $days * 86400;
            $hours = floor($seconds/3600);
            $seconds -= $hours * 3600;
            $minutes = floor($seconds/60);
            $seconds -= $minutes * 60;
           /* $months=round(($date1-$date2) / 60 / 60 / 24 / 30);
            $years=round(($date1-$date2) /(60*60*24*365));
           */
            if(!empty($days)){
                return $days .' Days';
            }elseif (!empty($hours)) {
                return $hours .' Hours';
            }elseif (!empty($minutes)) {
                return $minutes .' Minutes';
            }else{
                return $seconds .' Seconds';
            }

/*            $diffArr=array("Seconds"=>$seconds,
                          "minutes"=>$minutes,
                          "Hours"=>$hours,
                          "Days"=>$days,
                          "Weeks"=>$weeks,
                          "Months"=>$months,
                          "Years"=>$years
                         ) ;
           return $diffArr;*/
    }

    /*
    * Return the number of days between the two dates:
    */
   /* public static function dateDiff ($date1, $date2) {
        return round(abs(strtotime($date1)-strtotime($date2))/86400);
    } */
    
    public static function buildTree(array $elements, $parentId = 0) {
        $branch = array();

        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = self::buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }

     public static function SetMongoObject($_id){
        try {
           return new MongoId($_id);
        } catch (MongoException $_id) {
           return new MongoId();
        }
    }

}
