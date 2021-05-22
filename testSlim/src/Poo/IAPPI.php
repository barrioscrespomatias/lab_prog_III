<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

interface  IAPI
{
    static function TraerTodos(Request $request, Response $response, array $args): Response;

    static function TraerUno(Request $request, Response $response, array $args): Response;

    static function AgregarUno(Request $request, Response $response, array $args): Response;

    static function ModificarUno(Request $request, Response $response, array $args): Response;

    static function BorrarUno(Request $request, Response $response, array $args): Response;
}