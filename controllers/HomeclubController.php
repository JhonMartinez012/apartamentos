<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessController;
use yii\web\Controller;

class HomeclubController extends Controller
{
    public function actionIndex()  {
        return $this->render('index');
    }
}

?>