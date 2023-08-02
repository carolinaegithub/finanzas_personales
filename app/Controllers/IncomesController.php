<?php

namespace App\Controllers;

use Database\PDO\Connection;

class IncomesController {

    private $connection;

    public function __construct(){
        $this->connection = Connection::getInstance()->get_database_instance();
    }

    //Muestra una lista de este recurso
   public function index() {

    $stmt = $this->connection->prepare("SELECT * FROM incomes");
    $stmt->execute();

    $results = $stmt->fetchAll();
    
    require("../resources/views/incomes/index.php");
   }

   // Muestra un formulario para crear un nuevo recurso
   public function create() {
    require("../resources/views/incomes/create.php");
   }

   // Guarda un nuevo recurso en la base de datos
   public function store($data) {

    $stmt = $this->connection->prepare("INSERT INTO incomes (payment_method, type, date, amount, description) VALUES (:payment_method, :type, :date, :amount, :description)");

    $stmt->bindValue(":payment_method", $data["payment_method"]);
    $stmt->bindValue(":type", $data["type"]);
    $stmt->bindValue(":date", $data["date"]);
    $stmt->bindValue(":amount", $data["amount"]);
    $stmt->bindValue(":description", $data["description"]);

    $stmt->execute();

    header("location: incomes");
   }

   //Muestra un único recurso especificado
   public function show($id) {

    $stmt = $this->connection->prepare("SELECT * FROM incomes WHERE id=:id;");
    $stmt->execute([
        ":id" => $id
    ]);
   # Por el momento no se está utilizando
   }

   // Muestra el formulario para editar un solo recurso
   public function edit() {}

   // Actualiza un recurso específico en la base de datos
   public function update($data, $id) {

    $stmt = $this->connection->prepare("UPDATE incomes SET 
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

    $this->connection->beginTransaction();

    #$this->connection->exec("DROP TABLE incomes_test");

    $stmt = $this->connection->prepare("DELETE FROM incomes WHERE id  = :id");

    $stmt->execute([
        ":id" => $id
    ]);

    $sure = readline("¿Segura que quieres eliminar este registro?");

    if ($sure == "no")
    $this->connection->rollBack();
    else
    $this->connection->commit(); 
   }
}



/* 

index - Display a listing of the resource.
create - Show the form for creating a ner resource.
store - Store a newly created resource in storege.
show - Display the specified resource.
edit - Show the form for editing the specified resource.
update - Update the specified resource in storage.
destroy - Remove the specified resource from storage.

*/