<?php

namespace app\controllers;

use Yii;

use app\models\ApartamentoModel;
use app\models\ApartamentoModelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\TiposApartamento;
use yii\helpers\ArrayHelper;

/**
 * ApartementoController implements the CRUD actions for ApartamentoModel model.
 */
class ApartamentoController extends Controller
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
     * Lists all ApartamentoModel models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ApartamentoModelSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ApartamentoModel model.
     * @param int $idApartamento Id Apartamento
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idApartamento)
    {
        return $this->render('view', [
            'model' => $this->findModel($idApartamento),
        ]);
    }

    /**
     * Creates a new ApartamentoModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ApartamentoModel();

        // Obtener los datos para el select de tipos de apartamento
        $TiposApartamento = TiposApartamento::find()->all();
        $aTiposList   = ArrayHelper::map($TiposApartamento,'idTipoApartamento','tipoApartamento');
        
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idApartamento' => $model->idApartamento]);
            }
        } else {
            $model->loadDefaultValues();
        }
        
        return $this->render('create', [
            'model' => $model,
            'aTiposList' => $aTiposList,
        ]);
    }

    /**
     * Updates an existing ApartamentoModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idApartamento Id Apartamento
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idApartamento)
    {
        $model = $this->findModel($idApartamento);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idApartamento' => $model->idApartamento]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ApartamentoModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idApartamento Id Apartamento
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idApartamento)
    {
        $this->findModel($idApartamento)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ApartamentoModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idApartamento Id Apartamento
     * @return ApartamentoModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idApartamento)
    {
        if (($model = ApartamentoModel::findOne(['idApartamento' => $idApartamento])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
