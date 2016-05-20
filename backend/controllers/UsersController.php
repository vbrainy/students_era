<?php

namespace backend\controllers;

use Yii;
use common\models\Users;
use common\models\UsersSearch;
use common\components\Common;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\mongodb\Query;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query    = new Query();
        $query->from('users')->where(['_id'=>['$ne'=>'1']]);
        $provider = new ActiveDataProvider([
            'query'      => $query,
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);
        $models = $provider->getModels();
        return $this->render('index', [
                    //'searchModel'  => $searchModel,
                    'dataProvider' => $provider,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model      = new Users();
        $collection = Yii::$app->mongodb->getCollection('users');

        //$collection->insert(['name' => 'John Smith', 'status' => 1]);
        if ($model->load(Yii::$app->request->post()))
        {
            $document = Yii::$app->request->post();
            //$document->_id = getNextSequence('userid');
            // p(Yii::$app->mongodb->execute("getNextSequence('userid')"));
            try
            {
                $collection->insert($document['Users'], array("w" => 1));
            } catch (MongoCursorException $e)
            {
                echo "Can't save the same person twice!\n";
            }
            return $this->redirect(['index']);
        }
        else
        {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            return $this->redirect(['index']);
        }
        else
        {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($_id)
    {
        if (($model = Users::findOne($_id)) !== null)
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
