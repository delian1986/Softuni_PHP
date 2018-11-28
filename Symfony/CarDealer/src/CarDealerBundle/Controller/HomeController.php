<?php

namespace CarDealerBundle\Controller;

use CarDealerBundle\Entity\Customers;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {

        return $this->render('default/index.html.twig');
    }
}
