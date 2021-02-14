<?php

namespace EventBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class EventBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/event/js/pimcore/startup.js'
        ];
    }
}