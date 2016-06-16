<?php
class BranchLabs_Tracking_Block_Default extends Mage_Core_Block_Template {

    protected $_order;

    public function getProductId() {
        $product = Mage::registry('current_product');
        return (is_object($product)) ? $product->getId() : "UNDEFINED";
    }

    public function getProductName() {
        $product = Mage::registry('current_product');
        return (is_object($product)) ? $product->getName() : "UNDEFINED";
    }

    public function getProductPrice() {
        $product = Mage::registry('current_product');
        return (is_object($product)) ? number_format($product->getFinalPrice(), 2) : "UNDEFINED";
    }

    public function getCategoryName() {
        $category = Mage::registry('current_category');
        $product = Mage::registry('current_product');
        if (is_object($category)) {
            return $category->getName();
        } elseif (is_object($product)) {
            return Mage::helper('branchlabs_tracking')->getProductCategoryName($product);
        } else {
            return "UNDEFINED";
        }
    }

    public function getCurrencyCode() {
        return Mage::app()->getStore()->getCurrentCurrencyCode();
    }

    public function getLastOrderData($key) {
        $order = $this->_getLastOrder();
        if($order) {
            return $order->getData($key);
        } else {
            return '';
        }
    }

    // Used to turn product and category names into URL-safe strings
    public function slugify($string) {
        $string = trim($string);
        // Remove all non-alphanumeric or space characters
        $string = preg_replace('/[^\w\s]/', '', $string);

        // Compress   whitespace so we don't end up with Compress---whitespace
        $string = preg_replace('/\s+/', ' ', $string);
        $string = str_replace(' ', '-', $string);
        $string = strtolower($string);
        return $string;
    }

    protected function _getLastOrder() {
        if(!isset($this->_order)) {

            // Default to a failure state
            $this->_order = false;

            // Attempt to load the last order, checking that we're good along the way
            $orderId = Mage::getSingleton('checkout/session')->getLastOrderId();
            if((int)$orderId > 0) {
                $order = Mage::getSingleton('sales/order')->load($orderId);
                if(is_object($order)) {
                    $this->_order = $order;
                }
            }

            // If an order hasn't been loaded:
            // Log an error, complete with a full stacktrace
            if($this->_order === false) {
                Mage::logException(new Exception("ERROR (BranchLabs_Tracking): No last order object could be loaded from the session!"));
            }
        }

        return $this->_order;
    }

}
