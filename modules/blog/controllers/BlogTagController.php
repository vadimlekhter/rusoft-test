<?php

namespace app\modules\blog\controllers;

use Yii;
use app\models\BlogTag;
use app\models\search\BlogTagSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BlogTagController implements the CRUD actions for BlogTag model.
 */
class BlogTagController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all BlogTag models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BlogTagSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BlogTag model.
     * @param integer $blog_id
     * @param integer $tag_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
//    public function actionView($blog_id, $tag_id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($blog_id, $tag_id),
//        ]);
//    }

    /**
     * Creates a new BlogTag model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BlogTag();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BlogTag model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $blog_id
     * @param integer $tag_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
//    public function actionUpdate($blog_id, $tag_id)
//    {
//        $model = $this->findModel($blog_id, $tag_id);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'blog_id' => $model->blog_id, 'tag_id' => $model->tag_id]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Deletes an existing BlogTag model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $blog_id
     * @param integer $tag_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BlogTag model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $blog_id
     * @param integer $tag_id
     * @return BlogTag the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BlogTag::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
