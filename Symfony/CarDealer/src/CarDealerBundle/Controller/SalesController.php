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
    CONST DISCOUNT_PERCENT=0;

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/",name="all_sales")
     */
    public function indexAction()
    {
        $sales=$this->getDoctrine()->getRepository(Sales::class)->findAll();

        return $this->render('sales/list.html.twig',['sales'=>$sales]);
    }

    /**
     * @Route("/details/{id}", name="sale_details")
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function saleDetails(int $id){
        $sale=$this->getDoctrine()->getRepository(Sales::class)->find($id);

        return $this->render('sales/details.html.twig',['sale'=>$sale]);
    }

    /**
     * @Route("/discounted", name="sales_discounted")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function allDiscountedSales(){
        $allDiscountedSales=$this->getDoctrine()->getRepository(Sales::class)
            ->findDiscountsGreaterThan(self::DISCOUNT_PERCENT);

        return $this->render('sales/list.html.twig',['sales'=>$allDiscountedSales,'pageLabel'=>'discounted']);
    }


}
