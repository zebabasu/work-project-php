<?php
namespace yogaclass\src\controllers;
use Psr\Container\ContainerInterface;
use yogaclass\src\dataaccess\YogaClassDbGateway;
use yogaclass\src\services\YogaClassService;
class YogaClassController {
    protected $container;
    private $dbGateway;
    // constructor receives container instance
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->dbGateway = new YogaClassDbGateway();
    }

    public function allYogaClasses($request, $response, $args){
        $yogaClassService = new YogaClassService($this->dbGateway);
        $jsonYCL = $yogaClassService->getAllYogaClasses();
        return $response->withJson($jsonYCL);
    }
    public function yogaClassDetails($request, $response, $args){
        $yogaClassService = new YogaClassService($this->dbGateway);
        $jsonYCL = $yogaClassService->getYogaClassDetails($args['id']);
        return $response->withJson($jsonYCL);
    }
    public function createYogaClass($request, $response, $args){

        $yogaClassData = $request->getParsedBody();
        $yogaClassService = new YogaClassService($this->dbGateway);
        $status = $yogaClassService->createYogaClass($yogaClassData);
        $response->write($status);
        $response->withStatus(200);
    }

    public function updateYogaClass($request, $response, $args){

        $yogaClassData = $request->getParsedBody();
        $yogaClassService = new YogaClassService($this->dbGateway);
        $status = $yogaClassService->updateYogaClass($yogaClassData);
        $response->write($status);
        $response->withStatus(200);
    }

}