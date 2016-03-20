<?php

use yii\db\TableSchema;
use yii\gii\generators\model\Generator;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\web\View;
/**
 * This is the template for generating the model class of a specified table.
 */

/* @var $this View */
/* @var $generator Generator */
/* @var $tableName string full table name */
/* @var $className string class name */
/* @var $queryClassName string query class name */
/* @var $tableSchema TableSchema */
/* @var $labels string[] list of attribute labels (name => label) */
/* @var $rules string[] list of validation rules */
/* @var $relations array list of relations (name => relation declaration) */

echo "<?php\n";
?>

namespace <?= $generator->ns ?>;

use common\utils\FileUtils;
use Yii;

/**
 * This is the model class for table "<?= $generator->generateTableName($tableName) ?>".
 *
<?php $modelClass = StringHelper::basename($generator->modelClass); ?>
<?php foreach ($tableSchema->columns as $column): ?>
 * @property <?= "{$column->phpType} \${$column->name}\n" ?>
<?php endforeach; ?>
<?php if (!empty($relations)): ?>
 *
<?php foreach ($relations as $name => $relation): ?>
 * @property <?= $relation[1] . ($relation[2] ? '[]' : '') . ' $' . lcfirst($name) . "\n" ?>
<?php endforeach; ?>
<?php endif; ?>
 */
class <?= $className ?> extends <?= '\\' . ltrim($generator->baseClass, '\\') . "\n" ?>
{
<?php foreach($tableSchema->columns as $column) { ?>
<?php if(preg_match('/^(image|avatar|banner|banner1|banner2|banner3|banner4|banner5|top_banner|bottom_banner|middle_banner|left_banner|right_banner)$/i', $column->name)) { ?>        
    /**
    * function ->get<?= Inflector::id2camel($column->name, '_') ?> ($suffix, $refresh)
    */
    public $_<?= $column->name ?>;
    public function get<?= Inflector::id2camel($column->name, '_') ?> ($suffix = null, $refresh = false)
    {
        if ($this->_<?= $column->name ?> === null || $refresh == true) {
            $this->_<?= $column->name ?> = FileUtils::getImage([
                'imageName' => $this-><?= $column->name ?>,
                'imagePath' => $this->image_path,
                'imagesFolder' => Yii::$app->params['images_folder'],
                'imagesUrl' => Yii::$app->params['images_url'],
                'suffix' => $suffix,
                'defaultImage' => Yii::$app->params['default_image']
            ]);
        }
        return $this->_<?= $column->name ?>;
    }
<?php }}
if(isset($tableSchema->columns['slug']) || isset($tableSchema->columns['link']) || isset($tableSchema->columns['url'])) { ?>
    
    /**
    * function ->getLink ()
    */
    public $_link;
    public function getLink ()
    {
        if ($this->_link === null) {
            $_link = '';
            if (true) {
                // Put code here
                
            }
            $this->_link = $_link;
        }
        return $this->_link;
    }
<?php } ?>

    /**
    * function ::create ($data)
    */
    public static function create ($data)
    {
        $now = strtotime('now');
        $username = Yii::$app->user->identity->username;  
        $model = new <?= $modelClass ?>();
        if($model->load($data)) {
            if ($log = new UserLog()) {
                $log->username = $username;
                $log->action = 'Create';
                $log->object_class = '<?= $modelClass ?>';
                $log->created_at = $now;
                $log->is_success = 0;
                $log->save();
            }
            
<?php foreach ($tableSchema->columns as $column) {
    if (strpos(strrev($column->name), 'ta_') === 0) {
        if ($column->name === 'created_at') {
            echo "            \$model->$column->name = \$now;\n";
        }elseif ($column->name !== 'updated_at') {
            echo "            \$model->$column->name = strtotime(\$model->$column->name);\n";
        }
    } elseif ($column->name === 'created_by') {
        echo "            \$model->$column->name = \$username;\n";
    }
} ?>
<?php 
if (isset($tableSchema->columns['image_path'])) { ?>                
            do {
                $path = FileUtils::generatePath($now);
            } while (file_exists(Yii::$app->params['images_folder'] . $path));
            $model->image_path = $path;
            $targetFolder = Yii::$app->params['images_folder'] . $model->image_path;
            $targetUrl = Yii::$app->params['images_url'] . $model->image_path;
            
<?php foreach($tableSchema->columns as $column) { ?>
<?php if(preg_match('/^(image|avatar|banner|banner1|banner2|banner3|banner4|banner5|top_banner|bottom_banner|middle_banner|left_banner|right_banner)$/i', $column->name)) { ?>
            if (!empty($data['<?= strtolower($modelClass) . '-' . $column->name ?>'])) {
                $copyResult = FileUtils::copyImage([
                    'imageName' => $model-><?= $column->name ?>,
                    'fromFolder' => Yii::$app->params['uploads_folder'],
                    'toFolder' => $targetFolder,
                    'resize' => [[120, 120], [200, 200]],
                    'removeInputImage' => true,
                ]);
                if ($copyResult['success']) {
                    $model-><?= $column->name ?> = $copyResult['imageName'];
                }
            }
<?php }} ?>
<?php foreach ($tableSchema->columns as $column) {
if ($column->type === 'text') { ?>                    
            $model-><?= $column->name ?> = FileUtils::copyContentImages([
                'content' => $model-><?= $column->name ?>,
                'defaultFromFolder' => Yii::$app->params['uploads_folder'],
                'toFolder' => $targetFolder,
                'toUrl' => $targetUrl,
                'removeInputImage' => true,
            ]);
<?php } ?>
<?php } ?>
<?php } ?>
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
                $log->object_class = '<?= $modelClass ?>';
                $log->object_pk = $this->id;
                $log->created_at = $now;
                $log->is_success = 0;
                $log->save();
            }
            
<?php foreach ($tableSchema->columns as $column) {
    if (strpos(strrev($column->name), 'ta_') === 0) {
        if ($column->name === 'updated_at') {
            echo "            \$this->$column->name = \$now;\n";
        }elseif ($column->name !== 'created_at') {
            echo "            \$this->$column->name = strtotime(\$this->$column->name);\n";
        }
    } elseif ($column->name === 'updated_by') {
        echo "            \$this->$column->name = \$username;\n";
    }
} ?>
<?php
if (!empty($tableSchema->columns['slug']) && isset($tableSchema->columns['old_slugs'])) { ?>
            if ($this->slug != $this->getOldAttribute('slug')) {
                $old_slugs_arr = json_decode($this->old_slugs, true);
                is_array($old_slugs_arr) or $old_slugs_arr = array();
                $old_slugs_arr[$now] = $this->getOldAttribute('slug');
                $this->old_slugs = json_encode($old_slugs_arr);
            }
<?php } ?>
<?php 
if (isset($tableSchema->columns['image_path'])) { ?>                  
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
            
<?php foreach($tableSchema->columns as $column) { ?>
<?php if(preg_match('/^(image|avatar|banner|banner1|banner2|banner3|banner4|banner5|top_banner|bottom_banner|middle_banner|left_banner|right_banner)$/i', $column->name)) { ?>
            if (!empty($data['<?= strtolower($modelClass) . '-' . $column->name ?>'])) {
                $copyResult = FileUtils::copyImage([
                    'imageName' => $this-><?= $column->name ?>,
                    'fromFolder' => Yii::$app->params['uploads_folder'],
                    'toFolder' => $targetFolder,
                    'resize' => [[120, 120], [200, 200]],
                    'removeInputImage' => true,
                ]);
                if ($copyResult['success']) {
                    $this-><?= $column->name ?> = $copyResult['imageName'];
                }
            }
<?php }} ?>
<?php foreach ($tableSchema->columns as $column) { 
if ($column->type === 'text') { ?>
            $this-><?= $column->name ?> = FileUtils::copyContentImages([
                'content' => $this-><?= $column->name ?>,
                'defaultFromFolder' => Yii::$app->params['uploads_folder'],
                'toFolder' => $targetFolder,
                'toUrl' => $targetUrl,
                'removeInputImage' => true,
            ]);
<?php }} ?>
<?php } ?>            
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
            $log->object_class = '<?= $modelClass ?>';
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
<?php if(isset($tableSchema->columns['image_path'])) { ?>
            FileUtils::removeFolder(Yii::$app->params['images_folder'] . $model->image_path);
<?php } ?>
            return true;
        }
        return false;
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '<?= $generator->generateTableName($tableName) ?>';
    }
<?php if ($generator->db !== 'db'): ?>

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('<?= $generator->db ?>');
    }
<?php endif; ?>

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [<?= "\n            " . implode(",\n            ", $rules) . "\n        " ?>];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
<?php foreach ($labels as $name => $label): ?>
            <?= "'$name' => " . $generator->generateString($label) . ",\n" ?>
<?php endforeach; ?>
        ];
    }
<?php foreach ($relations as $name => $relation): ?>

    /**
     * @return \yii\db\ActiveQuery
     */
    public function get<?= $name ?>()
    {
        <?= $relation[0] . "\n" ?>
    }
<?php endforeach; ?>
<?php if ($queryClassName): ?>
<?php
    $queryClassFullName = ($generator->ns === $generator->queryNs) ? $queryClassName : '\\' . $generator->queryNs . '\\' . $queryClassName;
    echo "\n";
?>
    /**
     * @inheritdoc
     * @return <?= $queryClassFullName ?> the active query used by this AR class.
     */
    public static function find()
    {
        return new <?= $queryClassFullName ?>(get_called_class());
    }
<?php endif; ?>
}
