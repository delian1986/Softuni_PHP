<?php

namespace CarDealerBundle\Controller;

use CarDealerBundle\Entity\Cars;
use CarDealerBundle\Form\CarType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Car controller.
 *
 * @Route("cars")
 */
class CarsController extends Controller
{
    /**
     * Lists all car entities.
     *
     * @Route("/", name="cars_index")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(CarType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Cars $car */
            $car = $form->get('make')->getData();
            $carsByMake = $this->getDoctrine()->getRepository(Cars::class)->getCarsByMake($car->getMake());
            return $this->render('cars/list.html.twig', ['form' => $form->createView(), 'cars' => $carsByMake]);
        }

        return $this->render('cars/index.html.twig', ['form' => $form->createView()]);
    }

}
