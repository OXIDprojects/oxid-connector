<?php

namespace jtl\Connector\Oxid\Models\Specific;

class SpecificI18n {

    private $localeName;
    private $specificId;
    private $name;


    //LocaleName
    public function setLocaleName($localeName) {
        $this->localeName = $localeName;
    }

    public function getLocaleName() {
        return $this->localeName;
    }

    //SpecificId
    public function setSpecificId($specificId) {
        $this->specificId = $specificId;
    }

    public function getSpecificId() {
        return $this->specificId;
    }

    //Name
    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}


