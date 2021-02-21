<?php

namespace AppBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentController extends FrontendController
{
    public function defaultAction(Request $request)
    {

    }
    public function productAction(Request $request)
    {
       
        // $prod = new \Pimcore\Model\DataObject\Product\Listing();

        // $this->view->product = $prod;
        // return new Response('hello pimcore!!!');

        // $slug = $request->get('slug');
        $entries = new \Pimcore\Model\DataObject\Product\Listing();

        // $entries->setCondition("slug LIKE ?", [$slug]);
        $entries->load();

    
        foreach($entries as $entry) {
            $this->view->article =$entry;
    }
    }
    public function categoryAction(Request $request)
    {
       
        $entries = new \Pimcore\Model\DataObject\Category\Listing();

        $entries->load();
        foreach($entries as $entrynew) 
        {
            $this->view->article =$entrynew;
        }
    }
}