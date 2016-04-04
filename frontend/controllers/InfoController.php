<?php

namespace frontend\controllers;

use frontend\models\Info;
use frontend\models\Redirect;

class InfoController extends BaseController
{
    public function actionIndex($slug)
    {
        if ($model = Info::find()->where(['is_active' => 1])->andWhere(['slug' => $slug])->one()) {
            $this->link_canonical = $model->getLink();
            return $this->render('index', ['model' => $model]);
        } else {
            Redirect::go();
        }
    }

}
