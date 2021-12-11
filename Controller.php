<?php


namespace bwharnsby\phpmvc;


use bwharnsby\phpmvc\middlewares\BaseMiddleware;

class Controller
{
    public string $layout = 'main';
    public string $action = '';

    /**
     * @var \bwharnsby\phpmvc\middlewares\BaseMiddleware[]
     */
    protected array $middlewares = [];

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function render($view, $params = [])
    {
        return App::$app->view->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $baseMiddleware)
    {
        $this->middlewares[] = $baseMiddleware;
    }

    /**
     * @return BaseMiddleware[]
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}