<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \yogaclass\src\services\YogaClassService;

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
/*$app->get('/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});*/
$app->group('/yogaclasses', function () {

    $this->map(['GET'], '', function (Request $request, Response $response) {
        $yogaClassService = new YogaClassService();
        $jsonYCL = $yogaClassService->getAllYogaClasses();
        return $response->withJson($jsonYCL);
    });
    /*$this->get('/{id}', function (Request $request, Response $response, $args) {
        if(todoIdValid($args['id'])) {
            return $response->withJson(['message' => "Todo ".$args['id']]);
        }
        return $response->withJson(['message' => 'Todo Not Found'], 404);
    });
    $this->map(['POST', 'PUT', 'PATCH'], '/{id}', function (Request $request, Response $response, $args) {
        if(todoIdValid($args['id'])) {
            return $response->withJson(['message' => "Todo ".$args['id']." updated successfully"]);
        }
        return $response->withJson(['message' => 'Todo Not Found'], 404);
    });
    $this->delete('/{id}', function (Request $request, Response $response, $args) {
        if(todoIdValid($args['id'])) {
            return $response->withJson(['message' => "Todo ".$args['id']." deleted successfully"]);
        }
        return $response->withJson(['message' => 'Todo Not Found'], 404);
    });*/
});
$app->run();