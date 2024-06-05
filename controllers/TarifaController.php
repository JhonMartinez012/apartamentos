<?php

namespace app\controllers;

use app\models\Tarifas;
use app\models\TarifaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TarifaController implements the CRUD actions for Tarifas model.
 */
class TarifaController extends Controller
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
     * Lists all Tarifas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TarifaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tarifas model.
     * @param int $idTarifa Id Tarifa
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idTarifa)
    {
        return $this->render('view', [
            'model' => $this->findModel($idTarifa),
        ]);
    }

    /**
     * Creates a new Tarifas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Tarifas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idTarifa' => $model->idTarifa]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tarifas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idTarifa Id Tarifa
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idTarifa)
    {
        $model = $this->findModel($idTarifa);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idTarifa' => $model->idTarifa]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tarifas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idTarifa Id Tarifa
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idTarifa)
    {
        $this->findModel($idTarifa)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tarifas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idTarifa Id Tarifa
     * @return Tarifas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idTarifa)
    {
        if (($model = Tarifas::findOne(['idTarifa' => $idTarifa])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
