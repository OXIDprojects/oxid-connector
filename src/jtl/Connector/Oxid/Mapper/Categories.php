<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Database;
use jtl\Connector\Oxid\Models\Category;

require_once("../Database/Database.php");
require_once("../Models/Category/CategoryConf.inc.php");

class Categories {

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
    public function getCategories() {
        $database = new Database\Database;

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

        return $this->fillCategoryclasses($SQLResult);
    }

    /**
     * Füllt die Kategorie-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \Categories
     */
    function fillCategoryclasses($SQLResult) {
        $Categories = new Categories;

        //for ($i = 0; $i < count($SQLResult); ++$i) {
        for ($i = 0; $i < count($SQLResult); ++$i) {
            /* Category */
            $Category = new Category\Category;
            $Category->setId($SQLResult[$i]['categoryId']);
//            $Category->setLevel($SQLResult[$i]['']); // Nicht Definiert
            $Category->setParentCategoryId($SQLResult[$i]['categoryParentId']);
            $Category->setSort($SQLResult[$i]['categorySort']);

            /* CategoryAttr */
            $CategoryAttr = new Category\CategoryAttr;
            $CategoryAttr->setCategoryId($SQLResult[$i]['categoryId']);
            $CategoryAttr->setId($SQLResult[$i]['cat2AttId']);
            $CategoryAttr->setSort($SQLResult[$i]['cat2AttSort']);
//            $CategoryAttr->setType($SQLResult[$i]['']); // Nicht in Oxid

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

            /* CategoryfunctionAttr */
            $CategoryfunctionAttr = new Category\CategoryfunctionAttr;
            $CategoryfunctionAttr->setCategoryId($SQLResult[$i]['categoryId']);
//            $CategoryfunctionAttr->setId($SQLResult[$i]['']);
//            $CategoryfunctionAttr->setKey($SQLResult[$i]['']);
//            $CategoryfunctionAttr->setValue($SQLResult[$i]['']);

            /* CategoryI18n */
            $CategoryI18n = new Category\CategoryI18n;
            $CategoryI18n->setCategoryId($SQLResult[$i]['categoryId']);
//            $CategoryI18n->setDescription($SQLResult[$i]['']);
//            $CategoryI18n->setLocaleName($SQLResult[$i]['']);
//            $CategoryI18n->setMetaDescription($SQLResult[$i]['']);
//            $CategoryI18n->setMetaKeywords($SQLResult[$i]['']);
            $CategoryI18n->setName($SQLResult[$i]['categoryName']);
//            $CategoryI18n->setTitleTag($SQLResult[$i]['']);
//            $CategoryI18n->setUrl($SQLResult[$i]['']);

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
            $Categories->CategoryfunctionAttr[$i] = $CategoryfunctionAttr;
            $Categories->CategoryI18n[$i] = $CategoryI18n;
            $Categories->CategoryInvisibility[$i] = $CategoryInvisibility;
        }

        return $Categories;
    }

    /**
     * Schreibe Kategorien in Oxid-Shop
     * @return null
     */
    public function setCategories() {
        return Null;
    }

}

//Testausgabe
$Categories = new Categories;
$result = $Categories->getCategories();

echo "<pre>";
print_r($result);
echo "</pre>";


<a href="http://localhost/">Zur&uuml;ck</a>