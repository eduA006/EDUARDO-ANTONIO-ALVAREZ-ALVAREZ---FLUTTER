<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require "conexion.php"; // conexión a la base de datos

// Permitir leer tanto GET como POST o JSON
$inputData = json_decode(file_get_contents("php://input"), true);
$action = $_POST['action'] ?? $_GET['action'] ?? $inputData['action'] ?? '';

switch ($action) {

    // Crear producto
    case 'create':
        $nombre = $_POST['nombre'] ?? $inputData['nombre'] ?? '';
        $descripcion = $_POST['descripcion'] ?? $inputData['descripcion'] ?? '';
        $codigo_barras = $_POST['codigo_barras'] ?? $inputData['codigo_barras'] ?? '';
        $categoria = $_POST['categoria'] ?? $inputData['categoria'] ?? '';
        $precio = $_POST['precio'] ?? $inputData['precio'] ?? 0;
        $stock = $_POST['stock'] ?? $inputData['stock'] ?? 0;
        $proveedor = $_POST['proveedor'] ?? $inputData['proveedor'] ?? '';
        $activo = $_POST['activo'] ?? $inputData['activo'] ?? 1;

        $stmt = $pdo->prepare("
            INSERT INTO productos (nombre, descripcion, codigo_barras, categoria, precio, stock, proveedor, activo)
            VALUES (:nombre, :descripcion, :codigo_barras, :categoria, :precio, :stock, :proveedor, :activo)
        ");
        $stmt->execute([
            ':nombre' => $nombre,
            ':descripcion' => $descripcion,
            ':codigo_barras' => $codigo_barras,
            ':categoria' => $categoria,
            ':precio' => $precio,
            ':stock' => $stock,
            ':proveedor' => $proveedor,
            ':activo' => $activo
        ]);

        echo json_encode(["status" => "ok", "message" => "Producto agregado correctamente"]);
        break;

    // Leer productos
    case 'read':
        $stmt = $pdo->query("SELECT * FROM productos ORDER BY id DESC");
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($productos);
        break;

    // Actualizar producto
    case 'update':
        $id = $_POST['id'] ?? $inputData['id'] ?? 0;
        $nombre = $_POST['nombre'] ?? $inputData['nombre'] ?? '';
        $descripcion = $_POST['descripcion'] ?? $inputData['descripcion'] ?? '';
        $codigo_barras = $_POST['codigo_barras'] ?? $inputData['codigo_barras'] ?? '';
        $categoria = $_POST['categoria'] ?? $inputData['categoria'] ?? '';
        $precio = $_POST['precio'] ?? $inputData['precio'] ?? 0;
        $stock = $_POST['stock'] ?? $inputData['stock'] ?? 0;
        $proveedor = $_POST['proveedor'] ?? $inputData['proveedor'] ?? '';
        $activo = $_POST['activo'] ?? $inputData['activo'] ?? 1;

        $stmt = $pdo->prepare("
            UPDATE productos 
            SET nombre = :nombre, descripcion = :descripcion, codigo_barras = :codigo_barras,
                categoria = :categoria, precio = :precio, stock = :stock, 
                proveedor = :proveedor, activo = :activo
            WHERE id = :id
        ");
        $stmt->execute([
            ':nombre' => $nombre,
            ':descripcion' => $descripcion,
            ':codigo_barras' => $codigo_barras,
            ':categoria' => $categoria,
            ':precio' => $precio,
            ':stock' => $stock,
            ':proveedor' => $proveedor,
            ':activo' => $activo,
            ':id' => $id
        ]);

        echo json_encode(["status" => "ok", "message" => "Producto actualizado correctamente"]);
        break;

    // Eliminar producto
    case 'delete':
        $id = $_POST['id'] ?? $inputData['id'] ?? 0;
        $stmt = $pdo->prepare("DELETE FROM productos WHERE id = :id");
        $stmt->execute([':id' => $id]);
        echo json_encode(["status" => "ok", "message" => "Producto eliminado correctamente"]);
        break;

    default:
        echo json_encode(["status" => "error", "message" => "Acción no válida"]);
        break;
}
?>
