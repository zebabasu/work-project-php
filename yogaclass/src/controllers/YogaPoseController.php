<?php


namespace yogaclass\src\controllers;


use Psr\Container\ContainerInterface;
use Slim\Http\Request;

class YogaPoseController {

    // constructor receives container instance
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }
    public function allPoses($request, $response, $args){

    }
}