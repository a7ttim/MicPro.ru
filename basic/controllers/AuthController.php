<?php
/**
 * Created by PhpStorm.
 * User: A7ttim
 * Date: 19.04.2017
 * Time: 21:29
 */

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\User;
use app\models\WorkingOn;

class AuthController extends Controller
{
    /**
     * Login action.
     *
     * @return string
     */
    public function actionPanel(){
        $role = WorkingOn::findOne(['user_id' => (Yii::$app->user->identity->id)])->role;
        $roles = array ('dh', 'pa', 'pm', 'pe');
        return $this->redirect('../'.$roles[--$role]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->actionPanel();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}