<?php

namespace jtl\Connector\Oxid\Utilities;

/**
 * Summary of OxConfunctions
 * Zusätzliche Funktionen zum OXID-Connector
 */
class OxConfunctions
{

    /**
     * Summary of checkIBAN
     * Prüft ob es sich um eine IBAN Nummer handelt
     * @param $IBAN
     * @return Boolean
     */
    public function checkIBAN($IBAN = "")
	{
        $IBAN = preg_replace('/\s*/i', '', $IBAN);
        return preg_match('/[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{4}[0-9]{7}([a-zA-Z0-9]?){0,16}/i', $IBAN);
    }

    /**
     * Summary of checkBIC
     * Prüft ob es sich um eine BIC Nummer handelt
     * @param $BIC
     * @return Boolean
     */
    public function checkBIC($BIC = "")
	{
        $BIC = preg_replace('/\s*/i', '', $BIC);
        return preg_match('/([a-zA-Z]{4}[a-zA-Z]{2}[a-zA-Z0-9]{2}([a-zA-Z0-9]{3})?)/i', $BIC);
    }
}