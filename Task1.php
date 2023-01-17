<?php

class SomeObject {
    protected $name;

    public function __construct(string $name) { 
        $this->name = $name;
    }

    public function getObjectName() {
        return $this->name;
    }
}

class Object1 extends SomeObject{
    function add_object(){
        return 'handle_object_1';
    }
}

class Object2 extends SomeObject{
    function add_object(){
        return 'handle_object_2';
    }
}

class SomeObjectsHandler {

    protected $nameSomeObject = array();

    public function __construct(array $nameSomeObject) {
        $this->nameSomeObject = $nameSomeObject;
    }

    public function handleObjects(): array {
        $handlers = [];
        for ($i = 0; $i < count($this -> nameSomeObject); $i++){
            $handlers[] = $this -> nameSomeObject[$i]->add_object();
        }

        return $handlers;
    }
}

$objects = [
    new SomeObject('object_1'),
    new SomeObject('object_2')
];

$soh = new SomeObjectsHandler($objects);
$soh->handleObjects();

?>