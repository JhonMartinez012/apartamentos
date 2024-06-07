<?php

namespace app\controllers;

use app\models\ApartamentoModel;
use app\models\Reserva;
use app\models\ReservaSearch;
use app\models\Tarifas;
use app\models\TiposApartamento;
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
            // arreglo de los datos enviado
            $Data = $this->request->post();
            $aData = $Data['Reserva'];

            //Obtengo el listado de variables para insertar
            $idApartamento = $aData['idApartamento'];
            $idCliente = $aData['idCliente'];
            $fecha_inicio = $aData['fecha_inicio'];
            $fecha_fin = $aData['fecha_fin'];
            $codReserva = $aData['codReserva'];
            $idEstadoReserva = 1;

            // obtengo el id de la tarifa para luego obtener el tipo de apartamento 
            $aApartamento = ApartamentoModel::findOne(['idApartamento' => $idApartamento]);
            $idTarifa = $aApartamento['idTarifa'];

            // obtengo el valor de la tarifa y el tipo de apartamento
            $aTarifa = Tarifas::findOne(['idTarifa' => $idTarifa]);
            $valorTarifa = $aTarifa['valorTarifa'];
            $idTipoApartamento = $aTarifa['idTipoApartamento'];

            // si el apartamento es tipo corporativo idTipoApartamento = 1
            // se realiza un recargo porcentual 
            if ($idTipoApartamento == 1) {
                $valorTarifaAdicional = 0.03;
                $valorTotalPagar = $valorTarifa + ($valorTarifa * 0.03);
                $idTasaAdicional = 1;
            } else {
                // Si es turistico obtengo los dias reservados para calcular el valor
                $fecha_inicio = strtotime($fecha_inicio);
                $fecha_fin = strtotime($fecha_fin);
                $diferencia = $fecha_fin - $fecha_inicio;
                $dias = floor($diferencia / (60 * 60 * 24));
                $valorTotalPagar = $valorTarifa * $dias;
                $valorTarifaAdicional = 150;
                $idTasaAdicional = 2;
            }

            // guardo la info
            $model->codReserva = $codReserva;
            $model->fecha_inicio = $fecha_inicio;
            $model->fecha_fin = $fecha_fin;
            $model->valorAdicionalPagar = $valorTarifaAdicional;
            $model->valorTotalPagar = $valorTotalPagar;
            $model->idApartamento = $idApartamento;
            $model->idCliente = $idCliente;
            $model->idEstadoReserva = $idEstadoReserva;
            $idTasaAdicional = $idTasaAdicional;
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
