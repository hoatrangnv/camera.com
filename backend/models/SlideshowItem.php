<?php

namespace backend\models;

use common\utils\FileUtils;
use Yii;

/**
 * This is the model class for table "slideshow_item".
 *
 * @property integer $id
 * @property string $image
 * @property string $image_path
 * @property string $link
 * @property string $caption
 * @property integer $position
 * @property integer $is_active
 * @property integer $created_at
 * @property string $created_by
 * @property integer $updated_at
 * @property string $updated_by
 */
class SlideshowItem extends \yii\db\ActiveRecord
{
        
    /**
    * function ->getImage ($suffix, $refresh)
    */
    public $_image;
    public function getImage ($suffix = null, $refresh = false)
    {
        if ($this->_image === null || $refresh == true) {
            $this->_image = FileUtils::getImage([
                'imageName' => $this->image,
                'imagePath' => $this->image_path,
                'imagesFolder' => Yii::$app->params['images_folder'],
                'imagesUrl' => Yii::$app->params['images_url'],
                'suffix' => $suffix,
                'defaultImage' => Yii::$app->params['default_image']
            ]);
        }
        return $this->_image;
    }
    
    /**
    * function ->getLink ()
    */
    public $_link = '';
    public function getLink ()
    {
        if ($this->_link === '') {
            $_link = '';
            if (true) {
                // Put code here
                
            }
            $this->_link = $_link;
        }
        return $this->_link;
    }

    /**
    * function ::create ($data)
    */
    public static function create ($data)
    {
        $now = strtotime('now');
        $username = Yii::$app->user->identity->username;  
        $model = new SlideshowItem();
        if($model->load($data)) {
            if ($log = new UserLog()) {
                $log->username = $username;
                $log->action = 'Create';
                $log->object_class = 'SlideshowItem';
                $log->created_at = $now;
                $log->is_success = 0;
                $log->save();
            }
            
            $model->created_at = $now;
            $model->created_by = $username;
                
            do {
                $path = FileUtils::generatePath($now);
            } while (file_exists(Yii::$app->params['images_folder'] . $path));
            $model->image_path = $path;
            $targetFolder = Yii::$app->params['images_folder'] . $model->image_path;
            $targetUrl = Yii::$app->params['images_url'] . $model->image_path;
            
            if (!empty($data['slideshowitem-image'])) {
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
                $log->object_class = 'SlideshowItem';
                $log->object_pk = $this->id;
                $log->created_at = $now;
                $log->is_success = 0;
                $log->save();
            }
            
            $this->updated_at = $now;
            $this->updated_by = $username;
                  
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
            
            if (!empty($data['slideshowitem-image'])) {
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
            $log->object_class = 'SlideshowItem';
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
        return 'slideshow_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at'], 'required'],
            [['position', 'is_active'], 'integer'],
            [['image', 'image_path', 'created_at', 'updated_at'], 'safe'],
            [['image', 'image_path', 'link', 'caption'], 'string', 'max' => 511],
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
            'image' => 'Image',
            'image_path' => 'Image Path',
            'link' => 'Link',
            'caption' => 'Caption',
            'position' => 'Position',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
