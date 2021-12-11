<?php


namespace bwharnsby\phpmvc;


class View
{
    public string $title = 'Home';

    public function renderView($view, $params = [])
    {
        $view_content = $this->renderOnlyView($view, $params);
        $layout_content = $this->layoutContent();
        return str_replace('{{content}}', $view_content, $layout_content);
    }

    public function renderContent($view_content)
    {
        $layout_content = $this->layoutContent();
        return str_replace('{{content}}', $view_content, $layout_content);
    }

    protected function layoutContent()
    {
        $layout = App::$app->layout;
        if(App::$app->controller) {
            $layout = App::$app->controller->layout;
        }
        ob_start();
        include_once App::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params)
    {
        foreach($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once App::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}