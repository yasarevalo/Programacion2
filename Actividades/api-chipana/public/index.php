<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
//Autenticacion toker
use Tuupola\Middleware\JwtAuthentication;
use Firebase\JWT\JWT;


//---------------------
//RUTAS
//---------------------
require __DIR__ . '/../vendor/autoload.php';
require 'conexion.php';
require 'roles.php';

$app = AppFactory::create();
$app->addBodyParsingMiddleware();
 

//-------------------------------------------------------
// RUTA DE LOGIN PARA GENERAR TOKEN (PARA USER O ADMIN)
//-------------------------------------------------------

$app->post('/login', function (Request $request, Response $response) {
$header = $request->getHeaderLine('Authorization');

    //validar qu el ancabezado empiece con Basic, sino entra al if y tira error 
    if (strpos($header, 'Basic ') !== 0) {
        $response->getBody()->write(json_encode(["error" => "Falta encabezado Authorization"]));
        return $response->withStatus(400)->withHeader('Content-Type', 'application/json');
    }

    // Decodificar credenciales  (quitar Basic) y comvertir a texto
    $solocredenciales = substr($header, 6);     //6: para empezar en la posicion 6 (Basic)
    $textocredenciales = base64_decode($solocredenciales);

    // Separar usuario y contraseña
    $partes = explode(':', $textocredenciales, 2);
    $username = $partes[0];
    $password = $partes[1];
    
    if ($username == 'yasmin' && $password == '123') {
        $role = 'admin';
    } elseif ($username == 'Usuario1' && $password == '1234') {
        $role = 'user';
    } else {
        $response->getBody()->write(json_encode(["error" => "Credenciales inválidas"]));
        return $response->withStatus(401)->withHeader('Content-Type', 'application/json');
    }

    // Generar token JWT

    $key = "Yasminarevalo2005";      
    $payload = [
        "iss" => "example.com",
        "aud" => "example.com",
        "iat" => time(),
        "nbf" => time(),
        "exp" => time() + 3600,
        "data" => [
            "username" => $username,
            "role" => $role
        ]
    ];

    $token = JWT::encode($payload, $key, 'HS256');
    $response->getBody()->write(json_encode(["token" => $token]));
    return $response->withHeader('Content-Type', 'application/json');
});


// Middleware JWT
$app->add(new JwtAuthentication([
    "secret" => "Yasminarevalo2005",
    "attribute" => "token",
    "path" => ["/"],
    "ignore" => ["/api-chipana/public/login"],
    "algorithm" => ["HS256"],
    "secure" => false
    
]));

// RUTA DE PRUEBA PARA VER SI ANDA EL TOKEN
 $app->get('/protected', function (Request $request, Response $response) {
     $token = $request->getAttribute('token'); 
    $username = $token['data']->username ;
    $response->getBody()->write("Hola, $username");
    return $response;});



//----------------------
// CRUD DE CLIENTES 
//----------------------

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
    $stmt = $pdo->prepare("DELETE FROM clientes WHERE id_cliente = :id_cliente");
    $stmt->execute([':id_cliente' => $id_cliente]);
    $response->getBody()->write(json_encode(['message' => 'Cliente eliminado']));
    return $response->withHeader('Content-Type', 'application/json');
})->add(new RoleMiddleware(['admin'])); // solo admin puede borrar SI SOS USER DA ACCESO DENEGADO (mensaje desde roles)




$app->addErrorMiddleware (true,true,true);
$app->setBasePath('/api-chipana/public');
$app->run();
?>