<?php

namespace app\controllers;

use app\models\Reserva;
use app\models\ReservaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReservaController implements the CRUD actions for Reserva model.
 */
class ReservaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Reserva models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ReservaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reserva model.
     * @param int $idReserva Id Reserva
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idReserva)
    {
        return $this->render('view', [
            'model' => $this->findModel($idReserva),
        ]);
    }

    /**
     * Creates a new Reserva model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Reserva();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idReserva' => $model->idReserva]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Reserva model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idReserva Id Reserva
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idReserva)
    {
        $model = $this->findModel($idReserva);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idReserva' => $model->idReserva]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Reserva model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idReserva Id Reserva
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idReserva)
    {
        $this->findModel($idReserva)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Reserva model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idReserva Id Reserva
     * @return Reserva the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idReserva)
    {
        if (($model = Reserva::findOne(['idReserva' => $idReserva])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
