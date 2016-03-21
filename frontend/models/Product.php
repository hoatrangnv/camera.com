<?php

namespace frontend\models;

use common\utils\Common;
use common\utils\FileUtils;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\Url;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $slug
 * @property string $old_slugs
 * @property integer $price
 * @property integer $original_price
 * @property string $image
 * @property string $banner
 * @property string $image_path
 * @property string $details
 * @property string $description
 * @property string $long_description
 * @property string $page_title
 * @property string $h1
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $is_hot
 * @property integer $is_active
 * @property integer $status
 * @property integer $position
 * @property integer $view_count
 * @property integer $like_count
 * @property integer $share_count
 * @property integer $comment_count
 * @property integer $published_at
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $created_by
 * @property string $updated_by
 * @property integer $available_quantity
 * @property integer $order_quantity
 * @property integer $sold_quantity
 * @property integer $total_quantity
 * @property integer $total_revenue
 *
 * @property ProductImage[] $productImages
 * @property ProductToProductCategory[] $productToProductCategories
 * @property ProductCategory[] $productCategories
 */
class Product extends \common\models\Product
{
    

    public $a = '';
    public $img = '';

    public function astrong($params = '', $value = '') {
        return $this->a($params, $value, true);
    }

    public function a($params = '', $value = '', $strong = false) {
        $result = "<a href=\"{$this->getLink()}\" title=\"" . str_replace("\"", "'", $this->name) . "\"";
        if (is_array($params)) {
            if (count($params) > 0) {
                foreach ($params as $attr => $val) {
                    if ($attr == 0) {
                        $result .= "class=\"$val\"";
                    } else if ($attr == 1) {
                        $result .= "id=\"$val\"";
                    } else {
                        $result .= $attr . "=\"$val\"";
                    }
                }
            }
        } else if ($params != '') {
            $result .= "class=\"$params\"";
        }
        $ins_opentag = '';
        $ins_closetag = '';
        if ($strong) {
            $ins_opentag = '<strong>';
            $ins_closetag = '</strong>';
        }
        if ($value != '') {
            $result .= ">$ins_opentag{$value}$ins_closetag</a>";
        } else {
            $result .= ">$ins_opentag{$this->name}$ins_closetag</a>";
        }
        return $result;
    }

    public function img($suffix = null, $params = []) {
        $result = "<img title=\"" . str_replace("\"", "'", $this->name) . "\" alt=\"" . str_replace("\"", "'", $this->name) . "\"";
        $has_src = false;
        if (is_array($params)) {
            foreach ($params as $attr => $val) {
                if ($attr == 0) {
                    $result .= "class=\"$val\"";
                } else if ($attr == 1) {
                    $result .= "id=\"$val\"";
                } else {
                    $result .= "$attr=\"$val\"";
                }
                if ($attr == 'src') {
                    $has_src = true;
                }
            }
        } else if ($params != '') {
            $result .= "class=\"$params\"";
        }
        if (!$has_src) {
            $result .= "src=\"{$this->getImage($suffix, true)}\">";
        }
        return $result;
    }
    
    /**
    * function ->getImage ($suffix, $refresh)
    */
    public $_image;
    public function getImage($suffix = null, $refresh = false)
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
    * function ->getBanner ($suffix, $refresh)
    */
    public $_banner;
    public function getBanner ($suffix = null, $refresh = false)
    {
        if ($this->_banner === null || $refresh == true) {
            $this->_banner = FileUtils::getImage([
                'imageName' => $this->banner,
                'imagePath' => $this->image_path,
                'imagesFolder' => Yii::$app->params['images_folder'],
                'imagesUrl' => Yii::$app->params['images_url'],
                'suffix' => $suffix,
                'defaultImage' => Yii::$app->params['default_image']
            ]);
        }
        return $this->_banner;
    }
    
    /**
    * function ->getLink ()
    */
   public $_link;
    public function getLink() {
        if ($this->_link === null) {
            $_link = '';
            if ($cate = $this->getProductCategory()) {
                if ($parent_cate = $cate->getParent()) {
                    $_link = Url::to(['product/index', 'parent_cate_slug' => $parent_cate->slug, 'cate_slug' => $cate->slug, 'slug' => $this->slug], true);
                } else {
                    $_link = Url::to(['product/index', 'cate_slug' => $cate->slug, 'slug' => $this->slug], true);
                }
            } else {
                $_link = Url::to(['product/index', 'slug' => $this->slug], true);
            }
            $this->_link = $_link;
        }
        return $this->_link;
    }
    
    public function currency($column)
    {
        return $this->$column;
    }    
    

    public $_product_category;

    public function getProductCategory() {
        if (empty($this->_product_category)) {
            if ($productToProductCategory = ProductToProductCategory::findOne(['product_id' => $this->id])) {
                $this->_product_category = ProductCategory::findOne(['id' => $productToProductCategory->product_category_id]) or null;
            }
        }
        return $this->_product_category;
    }    
    
    public static function getProducts($params = [])
    {
        $query = Product::find()->where(['is_active' => 1])->andWhere(['<=', 'published_at', strtotime('now')]);
        if (isset($params['id_in']) && is_array($params['id_in'])) {
            $query->andWhere(['in', 'id', $params['id_in']]);
        }
        if (!empty($params['orderBy'])) {
            $query->orderBy($params['orderBy']);
        }
        if (!empty($params['limit'])) {
            $query->limit($params['limit']);
        }
        if (!empty($params['offset'])) {
            $query->offset($params['offset']);
        }
        $result = $query->all();
        if (!is_array($result)) {
            return [];
        }
        return $result;
    }
    
    
    public function getActionCounterUrl()
    {
        return Url::to(['product/counter'], true);
    }    
    
    public function summary($column = 'description', $length = 40)
    {
        return Common::summaryText($this->$column, $length);
    }
    
    public function date($column = 'published_at', $format = 'd-m-Y H:i')
    {
        return date($format, $this->$column);
    }    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code', 'slug', 'published_at', 'created_at', 'created_by'], 'required'],
            [['price', 'original_price', 'is_hot', 'is_active', 'status', 'position', 'view_count', 'like_count', 'share_count', 'comment_count', 'published_at', 'created_at', 'updated_at', 'available_quantity', 'order_quantity', 'sold_quantity', 'total_quantity', 'total_revenue'], 'integer'],
            [['details', 'long_description'], 'string'],
            [['name', 'slug', 'image', 'banner', 'image_path', 'page_title', 'h1', 'meta_title', 'meta_keywords', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 25],
            [['old_slugs'], 'string', 'max' => 2000],
            [['description', 'meta_description'], 'string', 'max' => 511],
            [['code'], 'unique'],
            [['slug'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Code',
            'slug' => 'Slug',
            'old_slugs' => 'Old Slugs',
            'price' => 'Price',
            'original_price' => 'Original Price',
            'image' => 'Image',
            'banner' => 'Banner',
            'image_path' => 'Image Path',
            'details' => 'Details',
            'description' => 'Description',
            'long_description' => 'Long Description',
            'page_title' => 'Page Title',
            'h1' => 'H1',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'is_hot' => 'Is Hot',
            'is_active' => 'Is Active',
            'status' => 'Status',
            'position' => 'Position',
            'view_count' => 'View Count',
            'like_count' => 'Like Count',
            'share_count' => 'Share Count',
            'comment_count' => 'Comment Count',
            'published_at' => 'Published At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'available_quantity' => 'Available Quantity',
            'order_quantity' => 'Order Quantity',
            'sold_quantity' => 'Sold Quantity',
            'total_quantity' => 'Total Quantity',
            'total_revenue' => 'Total Revenue',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImage::className(), ['product_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getProductToProductCategories()
    {
        return $this->hasMany(ProductToProductCategory::className(), ['product_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getProductCategories()
    {
        return $this->hasMany(ProductCategory::className(), ['id' => 'product_category_id'])->viaTable('product_to_product_category', ['product_id' => 'id']);
    }
}
