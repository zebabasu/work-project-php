<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use yogaclass\src\controllers\YogaClassController;
use yogaclass\src\controllers\YogaTeacherController;
use yogaclass\src\controllers\YogaPoseController;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
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
$container[YogaPoseController::class] = function ($c){
    return new YogaPoseController($c);
};
$app->get('/yogaposes', YogaPoseController::class . ":allPoses");
$app->get('/yogateachers', YogaTeacherController::class . ":allYogaTeachers");
$app->get('/yogateachers/{name}', YogaTeacherController::class . ":allYogaTeacherName");
$app->get('/yogaclasses', YogaClassController::class . ":allYogaClasses");
$app->get('/yogaclasses/{id}', YogaClassController::class . ":yogaClassDetails");
$app->post('/yogaclasses', YogaClassController::class . ":createYogaClass" );
$app->put('/yogaclasses', YogaClassController::class . ":updateYogaClass" );

$app->group('/home/{name}', function () {
    $this->map(['GET'], '', function (Request $request, Response $response, array $args) {
        $name = $args['name'];
        $response->getBody()->write("Hello, $name");

        return $response;
    });
});
$app->run();