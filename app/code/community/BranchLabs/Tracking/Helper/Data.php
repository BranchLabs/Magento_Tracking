<?php
class BranchLabs_Tracking_Helper_Data extends Mage_Core_Helper_Abstract {

    public function getProductCategoryName($product) {
        $categoryName = "UNDEFINED";
        try {
            $cats = $product->getCategoryIds();
            if(isset($cats[0])) {
                $category = Mage::getModel('catalog/category')->load($cats[0]);
                return $categoryName = $category->getName();
            }
        } catch (Exception $e) {
            Mage::log("ERROR (BranchLabs_Tracking): No category found for product ID ". $product->getId());
            Mage::logException($e);
        }
        return $categoryName;
    }

}
