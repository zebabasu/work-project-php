<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use yogaclass\src\controllers\YogaClassController;
use yogaclass\src\controllers\YogaTeacherController;
require '../vendor/autoload.php';
$config = [
    'settings' => [
        'displayErrorDetails' => true,

        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
        ],
    ],
];
$app = new Slim\App($config);
$container = $app->getContainer();
$container[YogaTeacherController::class] = function ($c){
    return new YogaTeacherController($c);
};
$container[YogaClassController::class] = function ($c){
    return new YogaClassController($c);
};
$app->get('/yogateachers', YogaTeacherController::class . ":allYogaTeachers");
$app->get('/yogateachers/{name}', YogaTeacherController::class . ":allYogaTeacherName");
$app->get('/yogaclasses', YogaClassController::class . ":allYogaClasses");


$app->group('/home/{name}', function () {
    $this->map(['GET'], '', function (Request $request, Response $response, array $args) {
        $name = $args['name'];
        $response->getBody()->write("Hello, $name");

        return $response;
    });
});
$app->run();