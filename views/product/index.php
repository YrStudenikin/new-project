<?php

/* @var $this yii\web\View */
/* @var $products Product[] */

use app\models\Product;
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;


?>

<main class="catalog">
    <div class="container">
        <div class="createBtn">
            <div class="row">
                <div class="col-md-3">
                    <?= Html::a('Добавить товар', ["product/create"], ['class'=>'btn btn-primary']) ?>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if (count($products) > 0) :?>
                <?php foreach ($products as $key => $product): ?>
                    <div class="col-md-4">
                        <div class="card justify-content-center">
                            <div class="card-header text-center">
                                <?= Html::a($product->title, ["product/details", 'id' => $product->id]) ?>
                            </div>
                            <?= Html::img("@web/images/$product->imageUrl", [
                                'alt' => 'image',
                                'style' => ['width' => '200px', 'height' => 'auto', 'margin' => '0 auto'],
                                'class' => 'card-img-top']) ?>
                            <div class="card-body justify-content-center">
                                <div class="card-text">
                                    <?= substr($product->description, 0, 50). '...' ?>
                                </div>
                                <div>Цена: <?=$product->price?>р.</div>
                            </div>
                            <div class="btn-wrapp">
                                <?= Html::a('Изменить', ["product/update", 'id' => $product->id],
                                    ['class'=>'btn btn-primary customWidth']) ?>

                                <?= Html::a('Удалить', ['remove', 'id' => $product->id], [
                                    'class' => 'btn btn-danger customWidth',
                                    'data' => [
                                        'confirm' => 'Вы действительно хотите удалить данный товар?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div>Список пуст</div>
            <?php endif; ?>
        </div>
    </div>
</main>
