<?php
class BranchLabs_Tracking_Block_Cachebuster extends BranchLabs_Tracking_Block_Default {

    // Used to set the cache placeholder attribute definitions, required in
    // the placeholder's "_renderBlock" function.
    public function getCacheKeyInfo() {
        return array(
            'template' => $this->getTemplate()
        );
    }

}
