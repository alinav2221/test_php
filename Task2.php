<?php

class SomeObject {
    private iSomeObject $name;
    public function __construct(string $name) { 
        $this->name = $name;
    }

    public function getObjectName() {
        return $this->name;
    }
}

interface iSomeObject
{
    function add();
}

class Object1 implements iSomeObject{
    function add(){
        return 'handle_object_1';
    }
}

class Object2 implements iSomeObject{
    function add(){
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
            $handlers[] = $this -> nameSomeObject[$i]->add();
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