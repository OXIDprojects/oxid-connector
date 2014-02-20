<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Database,
    jtl\Connector\Oxid\Utilities,
    jtl\Connector\Oxid\Models\Category;

require_once("../Database/Database.php");
require_once("../Models/Category/CategoryConf.inc.php");

/**
 * Summary of Categories
 */
class Categories
{

    public $Category = array();
    public $CategoryAttr = array();
    public $CategoryAttrI18n = array();
    public $CategoryCustomerGroup = array();
    public $CategoryfunctionAttr = array();
    public $CategoryI18n = array();
    public $CategoryInvisibility = array();

    /**
     * Ziehe Kategorien vom Oxid-Shop
     * @return type
     */
    public function getCategories()
    {
        $database = new Database\Database;

        $query = " SELECT Cat.*, " .
                " Cat2Att.* " .
                " FROM oxcategories AS Cat, " .
                " oxcategory2attribute AS Cat2Att ";
        
                //" SELECT Cat.OXID " . "AS categoryId," .
                //" Cat.OXPARENTID " . "AS categoryParentId," .
                //" Cat.OXSORT " . "AS categorySort," .
                //" Cat.OXACTIVE " . "AS categoryAktiv," .
                //" Cat.OXHIDDEN " . "AS categoryHidden," .
                //" Cat.OXTITLE " . "AS categoryName," .
                //" Cat2Att.OXID " . "AS cat2AttId," .
                //" Cat2Att.OXSORT " . "AS cat2AttSort" .
                //" FROM oxcategories " . "AS Cat," .
                //" oxcategory2attribute " . "AS Cat2Att";
        
        $SQLResult = $database->oxidStatement($query);
        
        echo $query;
        
        echo "<pre>";
        print_r($SQLResult);
        echo "</pre>";
        
        return $this->fillCategoryclasses($SQLResult);
    }

    /**
     * Füllt die Kategorie-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \Categories
     */
    function fillCategoryclasses($SQLResult)
    {
        $Categories = new Categories;

        //Language-Tabelle ziehen
        $OxConfunctions = new Utilities\OxConfunctions;
        $Langauages = $OxConfunctions->getLanguageIDs();
        
        //for ($i = 0; $i < count($SQLResult); ++$i) {
        for ($i = 0; $i < count($SQLResult); ++$i) {
            /* Category */
            $Category = new Category\Category;
            $Category->setId($SQLResult[$i]['OXCATEGORIES.OXID']);
            //            $Category->setLevel($SQLResult[$i]['']); // Nicht Definiert
            $Category->setParentCategoryId($SQLResult[$i]['categoryParentId']);
            $Category->setSort($SQLResult[$i]['categorySort']);

            /* CategoryAttr */
            $CategoryAttr = new Category\CategoryAttr;
            $CategoryAttr->setCategoryId($SQLResult[$i]['categoryId']);
            $CategoryAttr->setId($SQLResult[$i]['cat2AttId']);
            $CategoryAttr->setSort($SQLResult[$i]['cat2AttSort']);

            /* CategoryAttrI18n */
            $CategoryAttrI18n = new Category\CategoryAttrI18n;
            $CategoryAttrI18n->setCategoryAttrId($SQLResult[$i]['cat2AttId']);
            //            $CategoryAttrI18n->setKey($SQLResult[$i]['']);
            //            $CategoryAttrI18n->setLocaleName($SQLResult[$i]['']);
            //            $CategoryAttrI18n->setValue($SQLResult[$i]['']);

            /* CategoryCustomerGroup */
            $CategoryCustomerGroup = new Category\CategoryCustomerGroup;
            $CategoryCustomerGroup->setCategoryId($SQLResult[$i]['categoryId']);
            //            $CategoryCustomerGroup->setCustomerGroupId($SQLResult[$i]['']);
            //            $CategoryCustomerGroup->setDiscount($SQLResult[$i]['']);

            /* CategoryFunctionAttr */
            $CategoryFunctionAttr = new Category\CategoryFunctionAttr;
            $CategoryFunctionAttr->setCategoryId($SQLResult[$i]['categoryId']);
            //            $CategoryFunctionAttr->setId($SQLResult[$i]['']);
            //            $CategoryFunctionAttr->setKey($SQLResult[$i]['']);
            //            $CategoryFunctionAttr->setValue($SQLResult[$i]['']);

            /* CategoryI18n */
            $CategoryI18n = new Category\CategoryI18n;
            $CategoryI18n = $this->getCategoryI18n($SQLResult[$i], $Langauages);
            
            /* CategoryInvisibility */
            $CategoryInvisibility = new Category\CategoryInvisibility;
            if ($SQLResult[$i]['categoryHidden'] == 1) {
                $CategoryInvisibility->setCategoryId($SQLResult[$i]['categoryId']);
                //            $CategoryInvisibility->setCustomerGroupId($SQLResult[$i]['']);
            }

            $Categories->Category[$i] = $Category;
            $Categories->CategoryAttr[$i] = $CategoryAttr;
            $Categories->CategoryAttrI18n[$i] = $CategoryAttrI18n;
            $Categories->CategoryCustomerGroup[$i] = $CategoryCustomerGroup;
            $Categories->CategoryFunctionAttr[$i] = $CategoryFunctionAttr;
            $Categories->CategoryI18n[$i] = $CategoryI18n;
            $Categories->CategoryInvisibility[$i] = $CategoryInvisibility;
        }

        return $Categories;
    }

    /**
     * Schreibe Kategorien in Oxid-Shop
     * @return null
     */
    public function setCategories()
    {
        return null;
    }
    
    
    /**
     * Summary of getCategoryI18n
     * @param $CategoryId
     * @return CategoryI18n
     */
    public function getCategoryI18n($SQLResult, $Langauages)
    {
        $CategoryI18n = new Category\CategoryI18n;
        
        //echo "<pre>";
        //print_r($Langauages);
        //echo "</pre>";
        
        
        foreach ($Langauages as $key => $value)
        {
            
            $CategoryI18n->setCategoryId($SQLResult['categoryId']);
            //            $CategoryI18n->setDescription($SQLResult['']);
            //            $CategoryI18n->setLocaleName($SQLResult['']);
            //            $CategoryI18n->setMetaDescription($SQLResult['']);
            //            $CategoryI18n->setMetaKeywords($SQLResult['']);
            $CategoryI18n->setName($SQLResult['categoryName']);
            //            $CategoryI18n->setTitleTag($SQLResult['']);
            //            $CategoryI18n->setUrl($SQLResult['']);
        }       

        echo "<pre>";
        print_r($CategoryI18n);
        echo "</pre>";
        
        return $CategoryI18n;
    }

}

//Testausgabe
$Categories = new Categories;

$start = microtime(true);
$result = $Categories->getCategories();
$end = microtime(true);

$laufzeit = $end - $start;
echo "Laufzeit: {$laufzeit} Sekunden! <br/>";

//echo "<pre>";
//print_r($result);
//echo "</pre>";