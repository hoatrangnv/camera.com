<?php

namespace frontend\models;

use common\utils\FileUtils;
use Yii;

/**
 * This is the model class for table "seo_info".
 *
 * @property integer $id
 * @property string $url
 * @property integer $type
 * @property integer $is_active
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $h1
 * @property string $page_title
 * @property string $long_description
 * @property string $image
 * @property string $image_path
 * @property integer $created_at
 * @property string $created_by
 * @property integer $updated_at
 * @property string $updated_by
 */
class SeoInfo extends \yii\db\ActiveRecord
{
        
    /**
    * function ->getImage ($suffix, $refresh)
    */
    public $_image;
    public function getImage ($suffix = null, $refresh = false)
    {
        if ($this->_image === null || $refresh == true) {
            $_image = '';
            if ($suffix == null) {
                if (is_file(Yii::$app->params['images_folder'] . $this->image_path . $this->image)) {
                    $_image = Yii::$app->params['images_url'] . $this->image_path . $this->image;
                } else {
                    $_image = null;
                }
            } else {
                $name_map = explode('.', $this->image);
                if (count($name_map) >= 2) {
                    $extension = $name_map[count($name_map) - 1];
                    $basename = substr($this->image, 0, -(1 + strlen($extension)));
                    if (is_file(Yii::$app->params['images_folder'] . $this->image_path . $basename . $suffix . '.' . $extension)) {
                        $_image = Yii::$app->params['images_url'] . $this->image_path . $basename . $suffix . '.' . $extension;
                    } else {
                        $_image = null;
                    }
                } else {
                    $_image = null;
                }
            }
            if ($_image != null) {
                $this->_image = str_replace('%3A//', '://', str_replace('%2F', '/', rawurlencode($_image)));
            }
        }
        return $this->_image;
    }
    
    public static function getCurrent()
    {
        $url = Yii::$app->request->absoluteUrl;
        
        $question_mark_pos = strpos($url, '?');
        if(is_numeric($question_mark_pos)){
            $url = substr($url, 0, $question_mark_pos - strlen($url));
        }
        
        if ($model = static::findOne(['url' => $url, 'is_active' => 1]))
            return $model;
        
        $relative_url = str_replace(\yii\helpers\Url::home(), '', $url);
        
        if ($model = static::findOne(['url' => $relative_url, 'is_active' => 1]))
            return $model;
        
        if ($model = static::find()->where([
            'in', 
            'url', 
            [
                $url . '/',
                $relative_url . '/',
                '/' . $url,
                '/' . $relative_url,
                '/' . $url . '/',
                '/' . $relative_url . '/',
                rtrim($url, '/'),
                rtrim($relative_url, '/'),
                ltrim($url, '/'),
                ltrim($relative_url, '/'),
                trim($url, '/'),
                trim($relative_url, '/'),
            ]
        ])->andWhere(['is_active' => 1])->one())
            return $model;
        
        return false;
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'meta_title', 'meta_keywords', 'meta_description', 'h1', 'page_title', 'created_at', 'created_by'], 'required'],
            [['type', 'is_active'], 'integer'],
            [['long_description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['url', 'meta_title', 'meta_keywords', 'meta_description', 'h1', 'page_title', 'image', 'image_path'], 'string', 'max' => 511],
            [['created_by', 'updated_by'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'type' => 'Type',
            'is_active' => 'Is Active',
            'meta_title' => 'Meta Title',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'h1' => 'H1',
            'page_title' => 'Page Title',
            'long_description' => 'Long Description',
            'image' => 'Image',
            'image_path' => 'Image Path',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
