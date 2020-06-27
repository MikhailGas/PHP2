<?php
namespace Shop\services;

class Render {
    protected $layout = 'main';

    public function render($template, $params = []){
        $content = $this->renderTemplate($template, $params);
        return $this->renderTemplate("layouts/{$this->layout}", ['content' => $content, 'header' => $params['header']]);
    }

    protected function renderTemplate($template, $params = []) {
        ob_start();
        $templatePath = VIEWS_DIR . $template . ".php";
        extract($params);
        include $templatePath;
        return ob_get_clean();
    }
}