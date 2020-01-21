<?php
namespace yogaclass\src\controllers;
use Psr\Container\ContainerInterface;
use yogaclass\src\services\YogaPoseService;
class YogaPoseController {
    protected $container;

    // constructor receives container instance
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }
    public function allPoses($request, $response, $args){
        $yogaPoseService = new YogaPoseService();
        $jsonYP = $yogaPoseService->getAllYogaPoses();
        return $response->withJson($jsonYP);
    }
}