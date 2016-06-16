<?php
class BranchLabs_Tracking_Model_Placeholder extends Enterprise_PageCache_Model_Container_Abstract {
    /**
     * Force _renderBlock to run.
     */
    public function applyWithoutApp(&$content) {
        return false;
    }

    /**
     * Cache ID of false means the block won't be saved in $this->_saveCache()
     */
    protected function _getCacheId() {
        return false;
    }

    /**
     * Render block content
     */
    protected function _renderBlock() {
        $block = $this->_placeholder->getAttribute('block');
        $template = $this->_placeholder->getAttribute('template');
        $block = new $block;

        if(!empty($template)) {
            $block->setTemplate($template);
            $block->setLayout(Mage::app()->getLayout());
            return $block->toHtml();
        } else {
            return '';
        }
    }
}
