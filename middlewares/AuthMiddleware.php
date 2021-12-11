<?php


namespace bwharnsby\phpmvc\middlewares;


use bwharnsby\phpmvc\App;
use bwharnsby\phpmvc\exceptions\ForbiddenException;

class AuthMiddleware extends BaseMiddleware
{
    public array $actions = [];

    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if(App::isGuest()) {
            if(empty($this->actions) || in_array(App::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}