<?php

namespace jtl\Connector\Oxid\Models\Specific;

class Specific {

    private $id;
    private $sort;
    private $isGlobal;
    private $type;


    //Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //Sort
    public function setSort($sort) {
        $this->sort = $sort;
    }

    public function getSort() {
        return $this->sort;
    }

    //IsGlobal
    public function setIsGlobal($isGlobal) {
        $this->isGlobal = $isGlobal;
    }

    public function getIsGlobal() {
        return $this->isGlobal;
    }

    //Type
    public function setType($type) {
        $this->type = $type;
    }

    public function getType() {
        return $this->type;
    }   
}


