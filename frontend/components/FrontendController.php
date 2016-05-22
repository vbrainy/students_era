<?php

namespace frontend\components;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\UserRules;

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class FrontendController extends Controller
{
     public function beforeAction($action) {
    $this->enableCsrfValidation = false;
    return parent::beforeAction($action);
}
    /**
     * @inheritdoc
     */
    public function behaviors()
    {

        $ssControllerName = Yii::$app->controller->id . "Controller";
        $amAccessRules    = array(
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'signup', 'forgotPassword', 'gii', 'contact'],
                        'allow'   => true,
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                //'logout' => ['post'],
                ],
            ],
        );
        if (!Yii::$app->user->isGuest)
        {
            $snRoleId      = Yii::$app->user->identity->role_id;
            //echo $ssControllerName;
            
            $omAuthActions = UserRules::find()->where(['role_id' => "$snRoleId", 'privileges_controller' => $ssControllerName])->asArray()->one();
//            /print_r($omAuthActions);exit;
            if ($omAuthActions)
            {
                $amAccessRules['access']['rules'][] = array(
                    'actions' => explode(',', $omAuthActions['privileges_action']),
                    'allow'   => true,
                    'roles'   => ['@'],
                );
            }
        }
        return $amAccessRules;
    }

}
