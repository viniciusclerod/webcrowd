<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model {

    protected $entity;

    public function __construct($entity) {
        $this->entity = $entity;
    }

    public function create() {
        $properties = get_object_vars($this);
        unset($properties['entity']);
        $fields=$binds='';
        foreach($properties as $field => $value) {
            if($fields=='') {
                $fields .= $field;
                $binds .= ':'.$field;
            } else {
                $fields .= ', '.$field;
                $binds .= ', :'.$field;
            }
        }
        $query = 'INSERT INTO '.$this->entity.' ('.$fields.') VALUES ('.$binds.')';
        $sql = Connection::get()->prepare($query);
        foreach($properties as $field => $value) {
            $sql->bindValue(':'.$field , $value);
        }

        if ($sql->execute()){
            //$result = $sql->fetch();
            //var_dump($result);
            return true;
        } else {
            //exit($sql->errorCode());
            return false;
        }
    }

    public function find($id=null) {
        $query = 'SELECT * FROM '.$this->entity;
        $query .= isset($id) ? ' WHERE id='.$id.' LIMIT 1' : '';
        $sql = Connection::get()->prepare($query);
        if ($sql->execute()){
            if (isset($id)) {
                return $sql->fetch(PDO::FETCH_OBJ);
            } else {
                return $sql->fetchAll(PDO::FETCH_OBJ);
            }
        } else {
            return false;
        }
    }

    public function update() {
    }

    public function destroy(){
        $query = 'DELETE FROM '.$this->entity.' WHERE id='.$this->id;
        //var_dump($query);
        $sql = Connection::get()->prepare($query);
        if ($sql->execute()) {
            return true;
        } else {
            return false;
        }
    }

}