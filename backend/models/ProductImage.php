<?php

namespace backend\models;

use common\utils\FileUtils;
use Yii;

/**
 * This is the model class for table "product_image".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $image
 * @property string $image_path
 * @property string $color_code
 *
 * @property Product $product
 */
class ProductImage extends \common\models\ProductImage
{

    /**
    * function ::create ($data)
    */
    public static function create ($data)
    {
        $now = strtotime('now');
        $username = Yii::$app->user->identity->username;  
        $model = new ProductImage();
        if($model->load($data)) {
            if ($log = new UserLog()) {
                $log->username = $username;
                $log->action = 'Create';
                $log->object_class = 'ProductImage';
                $log->created_at = $now;
                $log->is_success = 0;
                $log->save();
            }
            
                
            do {
                $path = FileUtils::generatePath($now);
            } while (file_exists(Yii::$app->params['images_folder'] . $path));
            $model->image_path = $path;
            $targetFolder = Yii::$app->params['images_folder'] . $model->image_path;
            $targetUrl = Yii::$app->params['images_url'] . $model->image_path;
            
            if (!empty($data['productimage-image'])) {
                $copyResult = FileUtils::copyImage([
                    'imageName' => $model->image,
                    'fromFolder' => Yii::$app->params['uploads_folder'],
                    'toFolder' => $targetFolder,
                    'resize' => [[120, 120], [200, 200]],
                    'removeInputImage' => true,
                ]);
                if ($copyResult['success']) {
                    $model->image = $copyResult['imageName'];
                }
            }
            if ($model->save()) {
                if ($log) {
                    $log->object_pk = $model->id;
                    $log->is_success = 1;
                    $log->save();
                }
                return $model;
            }
            $model->getErrors();
            return $model;
        }
        return false;
    }
    
    /**
    * function ->update2 ($data)
    */
    public function update2 ($data)
    {
        $now = strtotime('now');
        $username = Yii::$app->user->identity->username;   
        if ($this->load($data)) {
            if ($log = new UserLog()) {
                $log->username = $username;
                $log->action = 'Update';
                $log->object_class = 'ProductImage';
                $log->object_pk = $this->id;
                $log->created_at = $now;
                $log->is_success = 0;
                $log->save();
            }
            
                  
            if ($this->image_path != null && trim($this->image_path) != '' && is_dir(Yii::$app->params['images_folder'] . $this->image_path)) {
                $path = $this->image_path;
            } else {
                do {
                    $path = FileUtils::generatePath($now);
                } while (file_exists(Yii::$app->params['images_folder'] . $path));
            }
            $this->image_path = $path;
            $targetFolder = Yii::$app->params['images_folder'] . $this->image_path;
            $targetUrl = Yii::$app->params['images_url'] . $this->image_path;
            
            if (!empty($data['productimage-image'])) {
                $copyResult = FileUtils::copyImage([
                    'imageName' => $this->image,
                    'fromFolder' => Yii::$app->params['uploads_folder'],
                    'toFolder' => $targetFolder,
                    'resize' => [[120, 120], [200, 200]],
                    'removeInputImage' => true,
                ]);
                if ($copyResult['success']) {
                    $this->image = $copyResult['imageName'];
                }
            }
            
            if ($this->save()) {
                if ($log) {
                    $log->is_success = 1;
                    $log->save();
                }
                return true;
            }
            return false;
        }
        return false;
    }
    
    /**
    * function ->delete ()
    */
    public function delete ()
    {
        $now = strtotime('now');
        $username = Yii::$app->user->identity->username;    
        $model = $this;
        if ($log = new UserLog()) {
            $log->username = $username;
            $log->action = 'Delete';
            $log->object_class = 'ProductImage';
            $log->object_pk = $model->id;
            $log->created_at = $now;
            $log->is_success = 0;
            $log->save();
        }
        if(parent::delete()) {
            if ($log) {
                $log->is_success = 1;
                $log->save();
            }
            FileUtils::removeFolder(Yii::$app->params['images_folder'] . $model->image_path);
            return true;
        }
        return false;
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'image', 'image_path'], 'required'],
            [['product_id'], 'integer'],
            [['image', 'image_path'], 'string', 'max' => 511],
            [['color_code'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'image' => 'Ảnh',
            'image_path' => 'Image Path',
            'color_code' => 'Màu sắc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
