<?php
namespace app\controllers;

use Yii;
use yii\base\Model;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use app\models\Product;
use yii\web\UploadedFile;

class ProductController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'remove' => ['POST'],
                ],
            ],
        ];
    }

    public function actionCreate()
    {

        $model = new Product();


        if ($model->load(Yii::$app->request->post()) && $model->validate())  {
            $image = UploadedFile::getInstance($model, 'file');
            $model->file = $image;

            if ($image != null) {
                $imageName = $image->baseName;
                $image->saveAs('images/' . $imageName . '.' . $image->extension);
                $model->imageUrl = $image->name;
            } else {
                $model->imageUrl = 'empty.png';
            }

            $model->save();

            Yii::$app->session->setFlash('success', "User created!");
            return $this->redirect('index' );
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionIndex()
    {
        $products = Product::find()->all();

        return $this->render('index', [
            'products' => $products
        ]);
    }

    public function actionDetails()
    {
        $id = \Yii::$app->request->get('id');
        if ($id == null) {
            Yii::$app->session->setFlash('danger', "Пользователь не найден");
            return $this->render('../site/404');
        }
        $product = Product::findOne(['id' => $id]);

        if ($product == null) {
            Yii::$app->session->setFlash('danger', "Пользователь не найден");
            return  $this->render('../site/404');
        }


        return $this->render('details', [
           'product' => $product
        ]);
    }

    public function actionUpdate($id)
    {
        $product = Product::findOne(['id' => $id]);
        if ($product == null) {
            Yii::$app->session->setFlash('danger', "Пользователь не найден");
            return $this->render('../site/404');
        }

        if ($product->load(Yii::$app->request->post()) && $product->validate())  {
            $product->update();

            Yii::$app->session->setFlash('success', "Товар изменен!");
            return $this->redirect('index' );
        }

        return $this->render('update', [
            'model' => $product,
        ]);
    }

    public function actionRemove($id)
    {
        $product = Product::findOne(['id' => $id]);
        if ($product != null) {
            $product->delete();
        }
        Yii::$app->session->setFlash('success', 'Товар удален');
        return $this->redirect(['index']);
    }
}