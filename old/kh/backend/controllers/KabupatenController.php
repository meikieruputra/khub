<?php

namespace backend\controllers;

use Yii;
use backend\models\Kabupaten;
use backend\models\KabupatenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KabupatenController implements the CRUD actions for Kabupaten model.
 */
class KabupatenController extends Controller
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
     * Lists all Kabupaten models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KabupatenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kabupaten model.
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
     * Creates a new Kabupaten model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kabupaten();

        if ($model->load(Yii::$app->request->post())) {
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
     * Updates an existing Kabupaten model.
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
     * Deletes an existing Kabupaten model.
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
     * Finds the Kabupaten model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kabupaten the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kabupaten::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionLists($id){
        $countKabupaten = Kabupaten::find()
            ->where(['provinsi_id'=>$id])
            ->count();
        $kabupaten = Kabupaten::find()
            ->where(['provinsi_id'=>$id])
            ->all();
        if($countKabupaten > 0)
        {
            foreach ($kabupaten as $kab) {
                echo "<option value'" .$kab->id. "'>".$kab->title."</option>";
            }
        }
        else
        {
            echo "<option>-</option>";
        }
    }
}
