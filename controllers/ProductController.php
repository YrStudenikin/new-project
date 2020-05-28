<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Product;

class ProductController extends Controller
{

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

    public function actionUpdate()
    {

    }



    public function actionCreate()
    {
        $productCreateForm = new Product();

        if ($productCreateForm->load(Yii::$app->request->post()) && $productCreateForm->validate())  {
            //print ("<pre>"); print_r($productCreateForm); die();
            $productCreateForm->imageUrl = 'product_1.png';
            $productCreateForm->save();

            Yii::$app->session->setFlash('success', "User created!");
            return $this->redirect('index' );
        }

        return $this->render('create', [
            'model' => $productCreateForm,
        ]);
    }



}