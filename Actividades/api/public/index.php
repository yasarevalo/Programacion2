<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();


$app->get('/persona', function (Request $request, Response $response) {

   $data = array('nombre' => 'Alfonso', 'edad' => 93);
    $payload = json_encode($data);

    $response->getBody()->write($payload);
    return $response
          ->withHeader('Content-Type', 'application/json');
});

$app->post('/persona', function ($request, $response, $args) {
    $body = $request->getBody()->getContents();
    $data = json_decode($body, true); 

    $nombre = $data['nombre'] ?? 'Sin nombre';
    $edad = $data['edad'] ?? 'Sin edad';

    // respuesta
    $respuesta = [
        'mensaje' => 'La persona fue recibida',
        'nombre' => $nombre,
        'edad' => $edad
    ];

    $response->getBody()->write(json_encode($respuesta));
    return $response->withHeader('Content-Type', 'application/json');
});
$app->addErrorMiddleware(true,true,true);
$app->setBasePath('/api/public');
$app->run();
?>