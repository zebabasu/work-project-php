<?php
namespace yogaclass\src\controllers;
use Psr\Container\ContainerInterface;
use yogaclass\src\dataaccess\YogaClassDbGateway;
use yogaclass\src\dataaccess\YogaPoseDbGateway;
use yogaclass\src\services\YogaPoseService;
class YogaPoseController {
    protected $container;
    private $dbGateway;
    // constructor receives container instance
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->dbGateway = new YogaPoseDbGateway();
    }
    public function allPoses($request, $response, $args){
        $yogaPoseService = new YogaPoseService($this->dbGateway);
        $jsonYP = $yogaPoseService->getAllYogaPoses();
        return $response->withJson($jsonYP);
    }
}