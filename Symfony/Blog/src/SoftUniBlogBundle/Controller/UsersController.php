<?php

namespace SoftUniBlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use SoftUniBlogBundle\Entity\Role;
use SoftUniBlogBundle\Entity\User;
use SoftUniBlogBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends Controller
{
    /**
     * @Route("/register",name="user_register")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function register(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPassword());

            $roleRepository=$this->getDoctrine()->getRepository(Role::class);
            $userRole=$roleRepository->findOneBy(['name'=>'ROLE_USER']);

            $user->setPassword($password);
            $user->addRole($userRole);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('security_login');
        }

        return $this->render('user/register.html.twig');
    }

    /**
     * @Route("/profile",name="user_profile")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function userProfile()
    {
        /** @var User $currentUser */
        $currentUser = $this->getUser();
        return $this->render('user/profile.html.twig', ['user' => $currentUser]);
    }

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
        var_dump($roles);

    }
}
