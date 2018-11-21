<?php

namespace SoftUniBlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use SoftUniBlogBundle\Entity\Role;
use SoftUniBlogBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends Controller
{
    /**
     * @Route("/admin",name="admin_panel")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function adminPanel(){
        /** @var User $currUser */
        $currUser=$this->getUser();

        if (!$currUser->isAdmin()){
            return $this->redirectToRoute('blog_index');
        }

        $roles=$this->getDoctrine()->getRepository(Role::class)->findAll();
        $users=$this->getDoctrine()->getRepository(User::class)->findAll();


        return $this->render('admin/main.html.twig',['roles'=>$roles,'users'=>$users]);

    }
}
