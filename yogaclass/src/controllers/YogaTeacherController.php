<?php
namespace yogaclass\src\controllers;

use Psr\Container\ContainerInterface;
use yogaclass\src\services\YogaTeacherService;

class YogaTeacherController {
    protected $container;

    // constructor receives container instance
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function allYogaTeachers($request, $response, $args) {
        // your code
        // to access items in the container... $this->container->get('');
        $filter2 = $request->getQueryParam('name');
        $yogaTeacherService = new YogaTeacherService();
        $jsonYTL = $yogaTeacherService->getAllYogaTeachers();
        return $response->withJson($jsonYTL);

    }
    public function allYogaTeacherName($request, $response, $args) {
        // your code
        // to access items in the container... $this->container->get('');
        $name = $args['name'];
        $yogaTeacherService = new YogaTeacherService();
        $jsonYT = $yogaTeacherService->getYogaTeacherByName($name);
        return $response->withJson($jsonYT);

    }
}