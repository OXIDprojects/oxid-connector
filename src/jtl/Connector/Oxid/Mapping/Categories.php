<?php
Namespace jtl\Connector\Oxid\Mapping;

use jtl\Connector\Oxid\Database;
use jtl\Connector\Oxid\Classes\Category;

require_once("../Database/Database.php");
require_once("../Classes/Category/CategoryConf.inc.php");

Class Categories {

    public $Category = array();
    public $CategoryAttr = array();
    public $CategoryAttrI18n = array();
    public $CategoryCustomerGroup = array();
    public $CategoryFunctionAttr = array();
    public $CategoryI18n = array();
    public $CategoryVisibility = array();

    /**
     * Ziehe Kategorien vom Oxid-Shop
     * @return type
     */
    Public Function getCategories() {
        $database = New Database\Database;

        $query = "SELECT Cat.OXID " . "AS categoryId," .
                " Cat.OXPARENTID " . "AS categoryParentId," .
                " Cat.OXSORT " . "AS categorySort," .
                " Cat.OXACTIVE " . "AS categoryAktiv," .
                " Cat.OXHIDDEN " . "AS categoryHidden," .
                " Cat.OXTITLE " . "AS categoryName," .
                " Cat2Att.OXID " . "AS cat2AttId," .
                " Cat2Att.OXSORT " . "AS cat2AttSort" .
                " FROM oxcategories " . "AS Cat," .
                " oxcategory2attribute " . "AS Cat2Att";

        $SQLResult = $database->oxidStatement($query);

        Return $this->fillCategoryClasses($SQLResult);
    }

    /**
     * Füllt die Kategorie-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \Categories
     */
    Function fillCategoryClasses($SQLResult) {
        $Categories = New Categories;

        //For ($i = 0; $i < count($SQLResult); ++$i) {
        For ($i = 0; $i < count($SQLResult); ++$i) {
            /* Category */
            $Category = New Category\Category;
            $Category->setId($SQLResult[$i]['categoryId']);
//            $Category->setLevel($SQLResult[$i]['']); // Nicht Definiert
            $Category->setParentCategoryId($SQLResult[$i]['categoryParentId']);
            $Category->setSort($SQLResult[$i]['categorySort']);

            /* CategoryAttr */
            $CategoryAttr = New Category\CategoryAttr;
            $CategoryAttr->setCategoryId($SQLResult[$i]['categoryId']);
            $CategoryAttr->setId($SQLResult[$i]['cat2AttId']);
            $CategoryAttr->setSort($SQLResult[$i]['cat2AttSort']);
//            $CategoryAttr->setType($SQLResult[$i]['']); // Nicht in Oxid

            /* CategoryAttrI18n */
            $CategoryAttrI18n = New Category\CategoryAttrI18n;
            $CategoryAttrI18n->setCategoryAttrId($SQLResult[$i]['cat2AttId']);
//            $CategoryAttrI18n->setKey($SQLResult[$i]['']);
//            $CategoryAttrI18n->setLocaleName($SQLResult[$i]['']);
//            $CategoryAttrI18n->setValue($SQLResult[$i]['']);

            /* CategoryCustomerGroup */
            $CategoryCustomerGroup = New Category\CategoryCustomerGroup;
            $CategoryCustomerGroup->setCategoryId($SQLResult[$i]['categoryId']);
//            $CategoryCustomerGroup->setCustomerGroupId($SQLResult[$i]['']);
//            $CategoryCustomerGroup->setDiscount($SQLResult[$i]['']);

            /* CategoryFunctionAttr */
            $CategoryFunctionAttr = New Category\CategoryFunctionAttr;
            $CategoryFunctionAttr->setCategoryId($SQLResult[$i]['categoryId']);
//            $CategoryFunctionAttr->setId($SQLResult[$i]['']);
//            $CategoryFunctionAttr->setKey($SQLResult[$i]['']);
//            $CategoryFunctionAttr->setValue($SQLResult[$i]['']);

            /* CategoryI18n */
            $CategoryI18n = New Category\CategoryI18n;
            $CategoryI18n->setCategoryId($SQLResult[$i]['categoryId']);
//            $CategoryI18n->setDescription($SQLResult[$i]['']);
//            $CategoryI18n->setLocaleName($SQLResult[$i]['']);
//            $CategoryI18n->setMetaDescription($SQLResult[$i]['']);
//            $CategoryI18n->setMetaKeywords($SQLResult[$i]['']);
            $CategoryI18n->setName($SQLResult[$i]['categoryName']);
//            $CategoryI18n->setTitleTag($SQLResult[$i]['']);
//            $CategoryI18n->setUrl($SQLResult[$i]['']);

            /* CategoryVisibility */
            $CategoryVisibility = New Category\CategoryVisibility;
            IF ($SQLResult[$i]['categoryHidden'] == 1) {
                $CategoryVisibility->setCategoryId($SQLResult[$i]['categoryId']);
//            $CategoryVisibility->setCustomerGroupId($SQLResult[$i]['']);
            }

            $Categories->Category[$i] = $Category;
            $Categories->CategoryAttr[$i] = $CategoryAttr;
            $Categories->CategoryAttrI18n[$i] = $CategoryAttrI18n;
            $Categories->CategoryCustomerGroup[$i] = $CategoryCustomerGroup;
            $Categories->CategoryFunctionAttr[$i] = $CategoryFunctionAttr;
            $Categories->CategoryI18n[$i] = $CategoryI18n;
            $Categories->CategoryVisibility[$i] = $CategoryVisibility;
        }

        return $Categories;
    }

    /**
     * Schreibe Kategorien in Oxid-Shop
     * @return null
     */
    Public Function setCategories() {
        return Null;
    }

}

//Testausgabe
$Categories = New Categories;
$result = $Categories->getCategories();

echo "<pre>";
print_r($result);
echo "</pre>";

?>
<a href="http://localhost/">Zur&uuml;ck</a>