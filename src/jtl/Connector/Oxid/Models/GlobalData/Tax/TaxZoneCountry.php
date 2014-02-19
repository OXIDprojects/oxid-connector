<?php
namespace jtl\Connector\Oxid\Models\GlobalData\Tax;

class TaxZoneCountry {
	
    private $id;
    private $taxZoneId;
    private $countryIso;

	//Id
    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    //TaxZoneId
    public function setTaxZoneId($taxZoneId) {
        $this->taxZoneId = $taxZoneId;
    }
    
    public function getTaxZoneId() {
        return $this->taxZoneId;
    }

    //CountryIso
    public function setCountryIso($countryIso) {
        $this->countryIso = $countryIso;
    }
    
    public function getCountryIso() {
        return $this->countryIso;
    }
}
