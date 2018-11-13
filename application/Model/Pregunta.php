<?php

namespace Mini\Model;

Use Mini\Core\Database;

class Pregunta
{
    public function getAll()
    {
        $conn = Database::getInstance()->getDatabase();

        $ssql = "SELECT * FROm preguntas";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchall();
    }


    public function insert($data)
    {

    }
}



?>