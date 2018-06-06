<?php

namespace backend\controllers;

use Yii;
use backend\models\Provinsi;
use backend\models\ProvinsiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProvinsiController implements the CRUD actions for Provinsi model.
 */
class ProvinsiController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Provinsi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProvinsiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Provinsi model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Provinsi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Provinsi();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->created_date = date('Y-m-d H:i:s');
            $model->updated_date = date('Y-m-d H:i:s');
            $model->created_by = Yii::$app->user->getId() ;
            $model->updated_by = Yii::$app->user->getId() ;
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Provinsi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->updated_date = date('Y-m-d H:i:s');
            $model->updated_by = Yii::$app->user->getId() ;
            $model->save(false);

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Provinsi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Provinsi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Provinsi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Provinsi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionLists($id){
        $countProvinsi = Provinsi::find()
            ->where(['kabupaten_id'=>$id])
            ->count();
        $Provinsi = Provinsi::find()
            ->where(['kabupaten_id'=>$id])
            ->all();
        if($countProvinsi > 0)
        {
            foreach ($provinsi as $prov) {
                echo "<option value'" .$prov->id. "'>".$prov->title."</option>";
            }
        }
        else
        {
            echo "<option>-</option>";
        }
    }
}
