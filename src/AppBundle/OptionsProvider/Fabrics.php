<?php

namespace AppBundle\OptionsProvider;

use Pimcore\Model\DataObject\Fabric;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;

class Fabrics implements SelectOptionsProviderInterface
{
    /**
     * @param $context array
     * @param $fieldDefinition Data
     * @return array
     */
    public function getOptions($context, $fieldDefinition)
    {
        $result = array();

        $fab = new Fabric\Listing();
        foreach($fab as $fabric){
            array_push($result, [ "key" =>$fabric->getName(), "value"=>$fabric->getName()]);
        }
        return $result;
    }

    /**
     * Returns the value which is defined in the 'Default value' field  
     * @param array $context 
     * @param Data $fieldDefinition 
     * @return mixed
     */
    public function getDefaultValue($context, $fieldDefinition) {
        return $fieldDefinition->getDefaultValue();
    }

    /**
     * @param array $context 
     * @param Data $fieldDefinition 
     * @return bool
     */
    public function hasStaticOptions($context, $fieldDefinition) {
        return true;
    }
}