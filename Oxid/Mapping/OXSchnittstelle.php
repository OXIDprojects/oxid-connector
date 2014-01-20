<?php
class myClass{ 
    public function showArticlesInBasket(){ 
        require_once "../../../oxid-shop/bootstrap.php";
        $oBasket = oxRegistry::getSession()->getBasket(); 
        $aArticles = $oBasket->getBasketArticles(); 
        foreach ($aArticles as $oArticle){
            echo $oArticle->oxarticles__oxtitle->value."<br>";
        }
    }
}

$myClass = new myClass; 
$myClass->showArticlesInBasket();
?>