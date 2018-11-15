<?php
namespace Mini\Model;
use Mini\Core\Database;
class Pregunta
{
	public function getAll()
	{
		$conn = Database::getInstance()->getDatabase();
		$ssql = "SELECT * FROM preguntas";
		$query = $conn->prepare($ssql);
		$query->execute();
		return $query->fetchAll();
	}
	public static function insert($datos)
	{
		$conn = Database::getInstance()->getDatabase();
		if (empty($datos['asunto']) || empty($datos['cuerpo'])) {
			return false;
		}
		$params = [
			':asunto' => $datos['asunto'],
			':cuerpo' => $datos['cuerpo']
		];
		$ssql = 'INSERT INTO preguntas (asunto, cuerpo) values(:asunto, :cuerpo)';
		$query = $conn->prepare($ssql);
		$query->execute($params);
		$cuenta = $query->rowCount();
		if ($cuenta == 1) {
			return $conn->lastInsertId();
		}
		return false;
	}

  public static function getId($id)
  {
    $conn = Database::getInstance()->getDatabase();
    $id = (int) $id;

    if($id == 0){
      return false;
    }

    $ssql = "SELECT * FROM preguntas WHERE id=:id";
    $query = $conn->prepare($ssql);
    $query->vindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();

  }


  public static function edit($datos)
  {
    $conn = Database::getInstance()->getDatabase();

    if(empty($datos['asunto']) || empty($datos['cuerpo']) || empty($datos['id'])){
      return false;
    }
      $ssql = "UPDATE preguntas SET asunto=:asunto, cuerpo=:cuerpo WHERE id = :id";
      $query = $conn->prepare($ssql);

      $params = [
        ':asunto' => $datos['asunto'],
        ':cuerpo' => $datos['cuerpo'],
        ':id' => $id['id']
      ];

      $query->execute();
      $count = $query->rowCount();

      if($count == 1){
        return true;
      }else{
        return false;
      }

  }




}
