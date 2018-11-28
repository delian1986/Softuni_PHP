<?php

namespace CarDealerBundle\Controller;

use CarDealerBundle\Entity\Customers;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Customer controller.
 *
 * @Route("customers/all")
 */
class CustomersController extends Controller
{
    /**
     * @Route("/", name="customers_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $allCustomers=$this->getDoctrine()->getRepository(Customers::class)->findAll();

        return $this->render('customers/index.html.twig',['customers'=>$allCustomers]);
    }

    /**
     * @Route("/{criteria}", name="customers_ordered")
     * @param string $criteria
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showOrderedByCriteria(string $criteria){
        $criteria=$this->normalizeOrderCriteria($criteria);
        $orderedCustomers=$this->getDoctrine()->getRepository(Customers::class)->getAllCustomersByGivingOrder($criteria);
        return $this->render('customers/index.html.twig',['customers'=>$orderedCustomers]);

    }

    /**
     * @param string $criteria
     * @return string
     */
    private function normalizeOrderCriteria(string $criteria){
        switch ($criteria){
            case 'ascending':
                $criteria='ASC';
                break;
            case 'descending':
                $criteria='DESC';
                break;
            default:
                $criteria='ASC';
                break;
        }

        return $criteria;
    }
}
