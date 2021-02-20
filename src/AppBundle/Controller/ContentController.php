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
    }
}