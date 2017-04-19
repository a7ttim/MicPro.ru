<?php

namespace app\modules\pa\controllers;

use app\models\User;
use app\models\WorkingOn;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default controller for the `pa` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */

    /**
     * @inheritdoc
     */

    public function behaviors()
    {
        return [
            'access'    =>  [
                'class' =>  AccessControl::className(),
                'denyCallback'  =>  function($rule, $action)
                {
                    throw new \yii\web\NotFoundHttpException('Page not found.');
                },
                'rules' =>  [
                    [
                        'allow' =>  true,
                        'matchCallback' =>  function($rule, $action)
                        {
                            $role = WorkingOn::findOne(['user_id' => (Yii::$app->user->identity->id)]);
                            if($role->role == 2)
                                return true;
                            else
                                return false;
                        }
                    ]
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
