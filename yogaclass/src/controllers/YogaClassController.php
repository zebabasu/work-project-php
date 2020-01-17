<?php
namespace yogaclass\src\controllers;
use Psr\Container\ContainerInterface;
use yogaclass\src\services\YogaClassService;
class YogaClassController {
    protected $container;

    // constructor receives container instance
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function allYogaClasses($request, $response, $args){
        $yogaClassService = new YogaClassService();
        $jsonYCL = $yogaClassService->getAllYogaClasses();
        return $response->withJson($jsonYCL);
    }
    public function yogaClassDetails($request, $response, $args){
        $yogaClassService = new YogaClassService();
        $jsonYCL = $yogaClassService->getYogaClassDetails($args['id']);
        return $response->withJson($jsonYCL);
    }
}