<?php

namespace AppBundle\EventListener;

use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject\Product;

class DataObjectUpdateListener{

    /** 
     * @param DataObjectEvent $e
     */
    public function getProductObject(DataObjectEvent $e) {
        if ($e->getObject() instanceof Product) {
            $product = $e->getObject();

            if($product->getPrice() > 2000) {
                throw new \Pimcore\Model\Element\ValidationException("Something Went Wrong");
            }
            // $this->USER_PASSWORD = $product->getPassword();
        }
    }
}