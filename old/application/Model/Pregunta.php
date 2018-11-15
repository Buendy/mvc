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


    public static function insert($data)
    {
        $conn = Database::getInstance()->getDatabase();

        if(empty($datos['asunto']) || empty($datos['cuerpo'])){
            return false;
        }

        $params =[
          ':asunto' => $datos['asunto'],
            ':cuerpo' => $datos['cuerpo']
        ];
        $ssql = 'INSERT INTO preguntas (asunto, cuerpo) values(:asunto, :cuerpo)';
        $query = $conn->prepare($ssql);
        $query->execute($params);
        $cuenta = $query->rowCount();

        if($cuenta == 1){
            return $conn->lastInsertId();
        }
        return false;
    }
}



?>