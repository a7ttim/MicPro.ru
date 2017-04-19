<?php

namespace app\modules\pe\controllers;

use app\models\User;
use app\models\WorkingOn;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Task;
use app\models\Project;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * Default controller for the `pe` module
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
                            if($role->role == 4)
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
        $task_ispoln=Task::find()->where(['status'=>2,'project_id' => 2])->all();
        $task_sogl=Task::find()->where(['status'=>1,'project_id' => 2])->all();


        /*$projects = Project::find()
            ->select('project.*')
            ->leftJoin('task', '`task`.`project_id` = `project`.`project_id`')
            ->where(['task.status' => Task::STATUS_ACTIVE])
            ->with('tasks')
            ->all();*/
        $project_name = Project::find()
            ->joinWith('tasks')
            ->select(['project.name'])
            ->where(['project.project_id' => 2])
            ->all();


        /*$projects = Project::find()
            ->joinWith('tasks')
            ->where(['task.status' => 2])
            ->asArray()->all();*/

        //$projects=Project::find()->all();

        $complete= new Task();
        if($complete->load(Yii::$app->request->post()))
        {
            $complete=$complete->complete;
        }

        $time = date('H:i:s');
        //return $this->render('ispolnitel',['tasks'=>$tasks,'project'=>$project,'description'=>$description,'task_info'=>$task_info]);
        return $this->render('index',['task_ispoln'=>$task_ispoln,'task_sogl'=>$task_sogl,'complete'=>$complete,'project_name'=>$project_name, 'time' => $time]);
    }
}
