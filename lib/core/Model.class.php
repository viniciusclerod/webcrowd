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
            return true;
        } else {
            return false;
        }
    }

    public function find($value=null, $field='id') {
        $query = 'SELECT * FROM '.$this->entity;
        $query .= isset($value) ? ' WHERE '.$field.'=:'.$field.' LIMIT 1' : '';
        $sql = Connection::get()->prepare($query);
        if (isset($value)) {
            $sql->bindValue(':'.$field, $value);
        }
        if ($sql->execute()){
            if (isset($value)) {
                return $sql->fetch(PDO::FETCH_OBJ);
            } else {
                return $sql->fetchAll(PDO::FETCH_OBJ);
            }
        } else {
            return false;
        }
    }

    public function update() {
        $properties = get_object_vars($this);
        unset($properties['entity']);
        unset($properties['id']);
        $query = 'UPDATE '.$this->entity.' SET ';
        $fields='';
        foreach($properties as $field => $value) {
            if($fields=='') {
                $fields .= $field.'=:'.$field;
            } else {
                $fields .= ', '.$field.'=:'.$field;
            }
        }
        $query .= $fields.' WHERE id='.$this->id;
        $sql = Connection::get()->prepare($query);
        foreach($properties as $field => $value) {
            $sql->bindValue(':'.$field , $value);
        }
        if ($sql->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function destroy(){
        $query = 'DELETE FROM '.$this->entity.' WHERE id='.$this->id;
        $sql = Connection::get()->prepare($query);
        if ($sql->execute()) {
            return true;
        } else {
            return false;
        }
    }

}