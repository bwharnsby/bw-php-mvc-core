<?php

namespace app\core;

use app\core\database\Database;

/**
 * Class App
 * @package app\core
 */
class App
{
    public static string $ROOT_DIR;
    public static App $app;

    public Router $router;
    public Request $request;
    public Response $response;
    public ?Controller $controller = null;
    public Database $database;
    public Session $session;
    public ?UserModel $user;
    public View $view;
    public string $userClass;
    public string $layout = 'main';

    public function __construct($root_path, array $config)
    {
        self::$ROOT_DIR = $root_path;
        self::$app = $this;
        $this->userClass = $config['userClass'];
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->database = new Database($config['database']);
        $this->view = new View();

        $primary_value = $this->session->get('user');
        if($primary_value) {
            $primary_key = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primary_key => $primary_value]);
        }
        else {
            $this->user = null;
        }
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        }
        catch(\Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderView('_error', [
                'exception' => $e
            ]);
        }
    }

    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @param Controller $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function login(UserModel $user)
    {
        $this->user = $user;
        $primary_key = $user->primaryKey();
        $primary_value = $user->{$primary_key};
        $this->session->set('user', $primary_value);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

    public static function isGuest()
    {
        return !self::$app->user;
    }
}