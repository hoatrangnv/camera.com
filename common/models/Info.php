<?php

namespace common\models;

class Info extends Html {
    //put your code here
    
    const TYPE_PRICING = 1;
    const TYPE_FAQ = 2;
    const TYPE_WARRANTY = 3;
    const TYPE_ABOUT_US = 4;
    const TYPE_CONTACT = 5;
    
    public static $types = [
        Info::TYPE_PRICING => 'Báo giá thi công',
        Info::TYPE_FAQ => 'Hỏi đáp',
        Info::TYPE_WARRANTY => 'Chính sách bảo hành',
        Info::TYPE_ABOUT_US => 'Giới thiệu',
        Info::TYPE_CONTACT => 'Liên hệ',
    ];
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'info';
    }

    /**
     * @inheritdoc
     */
    public function rules() 
    { 
       return [ 
           [['name', 'type', 'slug', 'content', 'created_at', 'created_by'], 'required'], 
           [['type', 'is_active'], 'integer'], 
           [['long_description', 'content'], 'string'], 
           [['created_at', 'updated_at'], 'safe'], 
           [['name', 'slug', 'page_title', 'h1', 'meta_title', 'meta_description', 'meta_keywords', 'image', 'image_path', 'created_by', 'updated_by'], 'string', 'max' => 255], 
           [['description'], 'string', 'max' => 511], 
           [['old_slugs'], 'string', 'max' => 2000], 
           [['image_path'], 'unique'], 
           [['slug', 'is_active'], 'unique', 'targetAttribute' => ['slug', 'is_active'], 'message' => 'The combination of Slug and Is Active has already been taken.'] 
       ]; 
    }
}
