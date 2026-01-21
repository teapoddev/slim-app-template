<?php

namespace Teapodsoft\Actions;


use Carbon\Carbon;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * TestAction
 *
 * @package Teapodsoft\Actions
 * @description Обработчик логики Route '/'
 */
class TestAction extends Action
{

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function __invoke(Request $request, Response $response, array $args = []): Response
    {
        $response->getBody()->write(json_encode(['time' => time(), 'carbon' => Carbon::now()->toDateTimeString()]));
        return parent::__invoke($request, $response, $args);
    }

}
