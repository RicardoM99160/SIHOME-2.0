<?php

    class apiModel extends Model{

        public function __construct($rm){
            parent::__construct();

        if ($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            //mostrar datos para la grafica
              $query = $this->db->connect()->prepare("SELECT COUNT(CASE WHEN idGenero='MSCLN' THEN 1 END) AS hombres, COUNT(CASE WHEN idGenero='FMNNO ' THEN 1 END) AS mujeres FROM pacientes");
              $query->execute();
              $query->setFetchMode(PDO::FETCH_ASSOC);
              header("HTTP/1.1 200 OK");
              echo json_encode( $query->fetchAll()  );
              exit();
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'VIEW')
        {
            if (isset($_GET['id']))
            {
              //Mostrar una alergia segun id
              $query = $this->db->connect()->prepare("SELECT * FROM alergias where idAlergias=:id");
              $query->bindValue(':id', $_GET['id']);
              $query->execute();
              header("HTTP/1.1 200 OK");
              echo json_encode(  $query->fetch(PDO::FETCH_ASSOC)  );
              exit();
              }
            else {
              //Mostrar lista de alergias
              $query = $this->db->connect()->prepare("SELECT * FROM alergias");
              $query->execute();
              $query->setFetchMode(PDO::FETCH_ASSOC);
              header("HTTP/1.1 200 OK");
              echo json_encode( $query->fetchAll()  );
              exit();
            }
        }
        
        // Insertar nueva alergia
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $input = $_POST;
            $query = "INSERT INTO alergias
                  (nombreAlergias)
                  VALUES
                  (:nombre)";
            $statement = $this->db->connect()->prepare($sql);
            $statement->bindValue(':nombre', $input['nombre']);
            $statement->execute();
            $postId = $this->db->connect()->lastInsertId();
            if($postId)
            {
              $input['id'] = $postId;
              header("HTTP/1.1 200 INSERTADO CON EXITO");
              echo json_encode($input);
              exit();
             }
        }
        
        //Borrar
        if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
        {
            $id = $_GET['id'];
          $statement = $this->db->connect()->prepare("DELETE FROM alergias where idAlergias=:id");
          $statement->bindValue(':id', $id);
          $statement->execute();
            header("HTTP/1.1 200 ELIMINADO CON EXITO");
            exit();
        }
        
        //Actualizar
        if ($_SERVER['REQUEST_METHOD'] == 'PUT')
        {
            $input = $_GET;
            $postId = $input['id'];
        
            $sql = "
                  UPDATE alergias
                  SET nombreAlergia = :nombre
                  WHERE idAlergias='$postId'
                   ";
        
            $statement = $this->db->connect()->prepare($sql);
            $statement->bindValue(':nombre' , $input['nombre']);
        
            $statement->execute();
            header("HTTP/1.1 200 OK");
            exit();
        }
        
        
        //En caso de que ninguna de las opciones anteriores se haya ejecutado
        header("HTTP/1.1 400 Bad Request");
        
        
    }
    }

?>