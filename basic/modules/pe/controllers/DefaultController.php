<?php

namespace app\modules\pe\controllers;

use yii\web\Controller;

/**
 * Default controller for the `pe` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
