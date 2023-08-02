<?php

namespace App\Controllers;

use Database\PDO\Connection;

class WithdrawalsController {

    private $connection;

    public function __construct(){
        $this->connection = Connection::getInstance()->get_database_instance();
    }

    //Muestra una lista de este recurso
   public function index() {

    $stmt = $this->connection->prepare("SELECT * FROM withdrawals");
    $stmt->execute();

    //Retorna en forma de array cada fila de la base de datos con fetchAll
    $results = $stmt->fetchAll();

    require("../resources/views/withdrawals/index.php");
   }

    // Esto es usando Fetch Column
    /*$stmt = $this->connection->prepare("SELECT amount, description FROM withdrawals");

    $stmt->execute();

    $results = $stmt->fetchAll(\PDO::FETCH_COLUMN, 0);

    /*foreach ($results as $result)
    echo "Gastaste $result USD \n";*/

   

   // Muestra un formulario para crear un nuevo recurso
   public function create() {}

   // Guarda un nuevo recurso en la base de datos
   public function store($data) {
    
    // preparan una consulta usando la conexion para insertar datos en una tabla llamada "withdrawals"
    $stmt = $this->connection->prepare("INSERT INTO withdrawals (payment_method, type, date, amount, description) 
    VALUES (:payment_method, :type, :date, :amount, :description)");

    $stmt->bindValue(":payment_method", $data["payment_method"]);
    $stmt->bindValue(":type", $data["type"]);
    $stmt->bindValue(":date", $data["date"]);
    $stmt->bindValue(":amount", $data["amount"]);
    $stmt->bindValue(":description", $data["description"]);

    $data["description"] = "Compré cosas para mí";

    #Contienen los el arreglo con placeholders que está en index
    $stmt->execute();

   }

   //Muestra un único recurso especificado
   public function show($id) {
    
    $stmt = $this->connection->prepare("SELECT * FROM withdrawals WHERE id=:id");
    $stmt->execute([
           ":id" => $id 
        ]);

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        echo "El registro con id $id dice que te gastaste {$result['amount']}
        USD en {$result['description']}";
   }

   // Muestra el formulario para editar un solo recurso
   public function edit() {}

   // Actualiza un recurso específico en la base de datos
   public function update($data, $id) {

    $stmt = $this->connection->prepare("UPDATE withdrawals SET 
    payment_method = :payment_method,
    type = :type,
    date = :date,
    amount = :amount,
    description = :description
    WHERE id=:id;");

    $stmt->execute([
        ":id" => $id,
        ":payment_method" => $data["payment_method"],
        ":type" => $data["type"],
        ":date" => $data["date"],
        ":amount" => $data["amount"],
        ":description" => $data["description"],
    ]);
}

   // Elimina un recurso específico de la base de datos
   public function destroy($id) {
    $stmt = $this->connection->prepare("DELETE FROM incomes WHERE id  = :id");

    $stmt->execute([
        ":id" => $id
    ]);

   }
}