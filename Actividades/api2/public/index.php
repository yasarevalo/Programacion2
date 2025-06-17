<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require 'conexion.php'; 

$app = AppFactory::create();


$app->get('/persona', function (Request $request, Response $response) use ($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM persona");
        $personas = $stmt->fetchAll();

        $response->getBody()->write(json_encode($personas));
        return $response->withHeader('Content-Type', 'application/json');
    } catch (PDOException $e) {
        $error = ['error' => $e->getMessage()];
        $response->getBody()->write(json_encode($error));
        return $response->withStatus(500)->withHeader('Content-Type', 'application/json');
    }
});
$app->post('/persona', function (Request $request, Response $response) use ($pdo) {
    $data = json_decode($request->getBody(), true);

    $sql = "INSERT INTO persona (nombre, edad) VALUES (:nombre, :edad)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ':nombre' => $data['nombre'],
            ':edad' => $data['edad']
        ]);

        $response->getBody()->write(json_encode(['message' => 'Persona creada']));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    } catch (PDOException $e) {
        $error = ['error' => $e->getMessage()];
        $response->getBody()->write(json_encode($error));
        return $response->withStatus(500)->withHeader('Content-Type', 'application/json');
    }
});
$app->put('/persona/{nombre}', function ($request, $response, $args) use ($pdo) {
    $nombre = $args['nombre'];
    $data = json_decode($request->getBody(), true);

    $sql = "UPDATE persona SET edad = :edad WHERE nombre = :nombre";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':edad' => $data['edad'],
        ':nombre' => $nombre
    ]);

    $response->getBody()->write(json_encode(['message' => 'Persona actualizada']));
    return $response->withHeader('Content-Type', 'application/json');
});
$app->delete('/persona/{nombre}', function ($request, $response, $args) use ($pdo) {
    $nombre = $args['nombre'];

    $sql = "DELETE FROM persona WHERE nombre = :nombre";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':nombre' => $nombre]);

    $response->getBody()->write(json_encode(['message' => 'Persona eliminada']));
    return $response->withHeader('Content-Type', 'application/json');
});
$app->addErrorMiddleware (true,true,true);
$app->setBasePath('/api2/public');
$app->run();
?>