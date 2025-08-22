<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
//Autenticacion basica
//use Tuupola\Middleware\HttpBasicAuthentication;
//Autenticacion toker
use Tuupola\Middleware\JwtAuthentication;
use Firebase\JWT\JWT;

//Autenticacion basica
/*$app->add(new HttpBasicAuthentication([
    "path" => "/api-chipana",
    "users" => [
        "yasmin" => "Yasminarevalo2005"
    ],
    "secure" => false
]));
$app->get('/protected', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Ruta protegida accesible");
    return $response;
});*/

//Autenticacion toker

// Ruta de login para emitir token

// Ruta de login para emitir token
require __DIR__ . '/../vendor/autoload.php';
require 'conexion.php';
require 'autorizacion.php';

$app = AppFactory::create();
$app->addBodyParsingMiddleware();

// Ruta de login para emitir token
$app->post('/login', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $username = $data['username'] ?? '';
    $password = $data['password'] ?? '';
    echo $username;

    if ($username === 'yasmin' && $password === '123') {
        $key = "your_secret_key";
        $payload = [
            "iss" => "example.com",
            "aud" => "example.com",
            "iat" => time(),
            "nbf" => time(),
            "exp" => time() + 3600,
            "data" => [
                "username" => $username
            ]
        ];
        $token = JWT::encode($payload, $key, 'HS256');
        $response->getBody()->write(json_encode(["token" => $token]));
    } else {
        $response->getBody()->write("Credenciales inválidas");
        return $response->withStatus(401);
    }
    return $response->withHeader('Content-Type', 'application/json');
});

// Middleware JWT
$app->add(new JwtAuthentication([
    "secret" => "your_secret_key",
    "attribute" => "token",
    "path" => ["/"],
    "ignore" => ["/api-chipana/public/login"],
    "algorithm" => ["HS256"],
    "secure" => false
    
]));

// Ruta protegida
 $app->get('/protected', function (Request $request, Response $response) {
     $token = $request->getAttribute('token'); 
    $username = $token['data']->username ;
    $response->getBody()->write("Hola, $username");
    return $response;});




// abm de la tabla clientes

//mostrar todos los clietes
$app->get('/clientes', function (Request $request, Response $response) use ($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM clientes");
        $personas = $stmt->fetchAll();

        $response->getBody()->write(json_encode($personas));
        return $response->withHeader('Content-Type', 'application/json');
    } catch (PDOException $e) {
        $error = ['error' => $e->getMessage()];
    }
});

//crear un cliente nuevo
$app->post('/clientes', function (Request $request, Response $response) use ($pdo) {
    $data = json_decode($request->getBody(), true);

    $sql = "INSERT INTO clientes (id_cliente, nombre, apellido, telefono, direccion, email, deuda) VALUES (:id_cliente, :nombre, :apellido, :telefono, :direccion, :email, :deuda)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ':id_cliente' => $data['id_cliente'],
            ':nombre' => $data['nombre'],
            ':apellido' => $data['apellido'],
            ':telefono' => $data['telefono'],
            ':direccion' => $data['direccion'],
            ':email' => $data['email'],
            ':deuda' => $data['deuda']
        ]);

        $response->getBody()->write(json_encode(['message' => 'Cliente creado']));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    } catch (PDOException $e) {
        $error = ['error' => $e->getMessage()];
        $response->getBody()->write(json_encode($error));
        return $response->withStatus(500)->withHeader('Content-Type', 'application/json');
    }
});


//actualizar todos los datos 

$app->put('/clientes/{id_cliente}', function ($request, $response, $args) use ($pdo) {
    $id_cliente = $args['id_cliente'];
    $data = json_decode($request->getBody(), true);

    $sql = "UPDATE clientes SET nombre = :nombre, apellido = :apellido, telefono = :telefono,
            direccion = :direccion, email = :email, deuda = :deuda WHERE id_cliente = :id_cliente";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':id_cliente' => $id_cliente,
        ':nombre' => $data['nombre'],
        ':apellido' => $data['apellido'],
        ':telefono' => $data['telefono'],
        ':direccion' => $data['direccion'],
        ':email' => $data['email'],
        ':deuda' => $data['deuda']
    ]);

    $response->getBody()->write(json_encode(['message' => 'Cliente actualizado']));
    return $response->withHeader('Content-Type', 'application/json');
});


//Eliminar un cliente por ID

$app->delete('/clientes/{id_cliente}', function ($request, $response, $args) use ($pdo) {
    $id_cliente = $args['id_cliente'];

    $sql = "DELETE FROM clientes WHERE id_cliente = :id_cliente";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id_cliente' => $id_cliente]);

    $response->getBody()->write(json_encode(['message' => 'Persona eliminada']));
    return $response->withHeader('Content-Type', 'application/json');
});
$app->addErrorMiddleware (true,true,true);
$app->setBasePath('/api-chipana/public');
$app->run();
?>