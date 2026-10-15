<?php

$root = __DIR__;
require_once $root . '/../Core/AutoLoader.php';
use Core\View;
use Core\Controller;
use Core\Db;
use actions\Controller\{HomeController,
LoginController,
RegisterController,
ForgottenpasswordController,
ContactController,
MentionsController,
SitemapController};
use actions\Model\UserRepository;

$repository = new UserRepository();
$controllers = [
    HomeController::class     => fn() => new HomeController(),
    LoginController::class      => fn() => new LoginController($repository),
    RegisterController::class => fn() => new RegisterController($repository),
    ForgottenpasswordController::class => fn() => new ForgottenpasswordController($repository),
    ContactController::class => fn() => new ContactController(),
    MentionsController::class => fn() => new MentionsController(),
    SitemapController::class => fn() => new SitemapController()
];

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';   // "/login?x=1" -> "/login"
$path = rtrim($path, '/') ?: '/';

$routes = require $root . '/../Core/config/routes.php';
$method = $_SERVER['REQUEST_METHOD'];
View::openBuffer();
foreach ($routes as [$routeMethod, $routePath, [$class, $action]]) {
    if ($routeMethod === $method && $path === $routePath) {
        $controller = $controllers[$class]();
        $controller->$action();
        $ViewContent = View::getBufferContent();
        echo View::show('Layout',array('body' => $ViewContent));
        exit;
    }

}
View::closeBuffer();
http_response_code(404);
View::show('404', ['path' => $path]);
/*
    $racine = __DIR__;
    require_once $racine . '/../Core/AutoLoader.php';
    use Core\View;
    use Core\Controller;
    use Core\Db;

    session_start();

    $routes = require $racine . '/../Core/config/routes.php';
    $chemin = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';
    $chemin = rtrim($chemin, '/') ?: '/';

    if (!isset($routes[$chemin])) {
        http_response_code(404);
        echo View::show('404', ['chemin' => $chemin]);
        exit;
    }
    echo View::show('Layout', array('body' => $ViewContent));
*/
