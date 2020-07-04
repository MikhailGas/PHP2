<?php
namespace Shop\controllers;

use Shop\models\Catalog;

class CatalogController extends Controller {

    public function actionIndex(){
        $catalog = Catalog::getAll();
        echo $this->render->render('catalog', ['catalog' => $catalog, 'header' => 'Каталог']);
    }
}

