<?php

namespace CarDealerBundle\Controller;

use CarDealerBundle\Entity\Sales;
use CarDealerBundle\Form\SaleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/",name="all_sales")
     */
    public function indexAction(Request $request)
    {
        $sales=$this->getDoctrine()->getRepository(Sales::class)->findAll();
        $form=$this->createForm(SaleType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()){
            $this->redirectToRoute('sales_discounted_by_percent');
        }


        return $this->render('sales/list.html.twig',['sales'=>$sales,'form'=>$form->createView()]);
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
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function allDiscountedSales(Request $request){
        $allDiscountedSales=$this->getDoctrine()->getRepository(Sales::class)
            ->findDiscountsGreaterThan(self::DISCOUNT_PERCENT);
        $form=$this->createForm(SaleType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()){
            $this->redirectToRoute('sales_discounted_by_percent');
        }

        return $this->render('sales/list.html.twig',['sales'=>$allDiscountedSales,'pageLabel'=>'discounted','form'=>$form->createView()]);
    }

    /**
     * @Route("/discounts/percent",name="sales_discounted_by_percent")
     * @param Request $request
     */
    public function discountsByPercent(Request $request){
        $percent=$request->request;
        var_dump($percent);exit;

//        $salesByPercent=$this->getDoctrine()->getRepository(Sales::class)
    }
}
