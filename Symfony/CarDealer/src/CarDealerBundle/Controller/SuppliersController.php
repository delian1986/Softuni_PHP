<?php

namespace CarDealerBundle\Controller;

use CarDealerBundle\Entity\Parts;
use CarDealerBundle\Entity\Suppliers;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class SuppliersController
 * @package CarDealerBundle\Controller
 * @Route("suppliers")
 */
class SuppliersController extends Controller
{
    /**
     * @Route("/",name="suppliers_index")
     */
    public function indexAction()
    {
        /** @var Suppliers $suppliers */
        $suppliers = $this->getDoctrine()->getRepository(Suppliers::class)->findAll();
        return $this->render('suppliers/index.html.twig', ['suppliers' => $suppliers]);
    }

    /**
     * @param string
     * @Route("/{param}", name="suppliers_by_type")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function suppliersByType(string $param)
    {
        $type = $this->normalizeParameter($param);
        $suppliersByType = $this->getDoctrine()->getRepository(Suppliers::class)->getAllSuppliersByType($type);
        return $this->render('suppliers/index.html.twig', ['suppliers' => $suppliersByType,'page'=>$param]);

    }

    /**
     * @param string $param
     * @return bool
     */
    private function normalizeParameter(string $param)
    {
        if ($param==='local'){
            return false;
        }
        return true;
    }
}
