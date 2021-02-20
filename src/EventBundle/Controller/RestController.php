<?php

namespace EventBundle\Controller;

use Pimcore;
use Pimcore\Bundle\AdminBundle\Controller\Rest\AbstractRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\component\HttpFoundation\JsonResponse;

/**
 * Class RestController
 * @package EventBundle\Controller
 */
class RestController extends AbstractRestController
{
    /**
     * @Route("/webservice/productlist", methods={"GET"})
     */
    public function getProduct(Request $request)
    {
        $this->checkPermission('objects');
        //Products listing
        $products = new Pimcore\Model\DataObject\Category\Listing();
        foreach ($products as $key => $prod) {
            $data[] = array(
                "name" => $prod->getName(),
                "description" => $prod->getDescription(),
                // "id" => $prod->getID()
            );
        }

        return $this->adminJson(["success" => true, "data" => $data]);
    }
   }
