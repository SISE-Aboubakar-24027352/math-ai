<?php
$repository = new UserRepository($pdo);

$routes = require $racine . '/../Core/config/routes.php';
$method = $_SERVER['REQUEST_METHOD'];
foreach ($route as [$routeMethod, $routePath, [$class, $action]]) {
    if ($routeMethod === $method && $routePath === $routePath) {

    }
}
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
