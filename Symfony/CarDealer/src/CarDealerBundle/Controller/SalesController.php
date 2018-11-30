<?php

namespace CarDealerBundle\Controller;

use CarDealerBundle\Entity\Sales;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SalesController
 * @package CarDealerBundle\Controller
 * @Route("sales")
 */
class SalesController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/",name="all_sales")
     */
    public function indexAction()
    {
        $sales=$this->getDoctrine()->getRepository(Sales::class)->findAll();

        return $this->render('sales/all.html.twig',['sales'=>$sales]);
    }
}
