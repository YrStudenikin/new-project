<?php
namespace app\models;

use yii\db\ActiveRecord;


/**
 * Class Product
 * @package app\models
 *
 * @property $id int
 * @property $title string
 * @property $price double
 * @property $description string
 * @property $imageUrl string
 * @property $imageFile UploadedFile
 */
class Product extends ActiveRecord
{

    public $file;

    public static function tableName()
    {
        return 'products';
    }

    public static function primaryKey()
    {
        return ['id'];
    }

    public function rules()
    {
        return [
            [['title', 'price' ], 'required', 'message'=> "Заполните поле!"],
            [['title', 'description'], 'string'],
            ['title', 'string', 'length' => [2, 65]],
            ['description', 'string', 'min' => 3],
            ['price' , 'double'],
            ['title', 'unique', 'message' => 'Название не уникально!'],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'message' => 'Загрузите изображение!'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'price' => 'Цена',
            'description' => 'Описание',
        ];
    }



}