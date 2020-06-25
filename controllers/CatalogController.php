<?php
namespace Shop\controllers;

use Shop\models\Catalog;
use Shop\services\Render;

class CatalogController extends Controller {
    protected $controllerName = 'catalog';
    protected $header = 'Каталог';

    public function actionIndex(){
        $catalog = Catalog::getAll();
        echo $this->render($catalog);
    }
}

