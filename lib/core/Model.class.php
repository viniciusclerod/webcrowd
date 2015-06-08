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
        $sql = Connection::get()->prepare('INSERT INTO '.$this->entity.' ('.$fields.') VALUES ('.$binds.')');
        var_dump($sql);
        foreach($properties as $field => $value) {
            $sql->bindValue(':'.$field , $value);
        }

        if ($sql->execute()){
            //$result = $sql->fetch();
            //var_dump($result);
            return true;
        } else {
            exit($sql->errorCode());
        }
    }

    public function find() {}

    public function update() {}

    public function destroy(){}

}