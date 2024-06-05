<?php

namespace app\controllers;

use app\models\TiposApartamento;
use app\models\TiposApartamentoModelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TiposApartamentoController implements the CRUD actions for TiposApartamento model.
 */
class TiposApartamentoController extends Controller
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
     * Lists all TiposApartamento models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TiposApartamentoModelSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TiposApartamento model.
     * @param int $idTipoApartamento Id Tipo Apartamento
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idTipoApartamento)
    {
        return $this->render('view', [
            'model' => $this->findModel($idTipoApartamento),
        ]);
    }

    /**
     * Creates a new TiposApartamento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TiposApartamento();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idTipoApartamento' => $model->idTipoApartamento]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TiposApartamento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idTipoApartamento Id Tipo Apartamento
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idTipoApartamento)
    {
        $model = $this->findModel($idTipoApartamento);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idTipoApartamento' => $model->idTipoApartamento]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TiposApartamento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idTipoApartamento Id Tipo Apartamento
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idTipoApartamento)
    {
        $this->findModel($idTipoApartamento)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TiposApartamento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idTipoApartamento Id Tipo Apartamento
     * @return TiposApartamento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idTipoApartamento)
    {
        if (($model = TiposApartamento::findOne(['idTipoApartamento' => $idTipoApartamento])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
