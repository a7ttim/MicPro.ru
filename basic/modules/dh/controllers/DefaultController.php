<?php

namespace app\modules\dh\controllers;

use app\models\User;
use app\models\WorkingOn;
use app\models\Employment;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default controller for the `dh` module
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
                            if($role->role == 1)
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
        $res = Employment::find()->joinWith('department', User::find()->joinWith('employment', 'user'))->
        orderBy([
            'parent_department_id' => SORT_ASC,
            'department_id' => SORT_ASC
        ])->all();
        
        return $this->render('index', [
            'res' => $res
        ]);
    }
}
