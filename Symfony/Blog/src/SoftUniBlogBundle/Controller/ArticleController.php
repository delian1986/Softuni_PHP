<?php

namespace SoftUniBlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use SoftUniBlogBundle\Entity\Article;
use SoftUniBlogBundle\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends Controller
{
    /**
     * @param Request $request
     *
     * @Route("/article/create" , name="article_create")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     *
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request)
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $article->setAuthor($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('blog_index');
        }


        return $this->render('article/create.html.twig',
            array('form' => $form->createView()));
    }

    /**
     * @Route("/article/{id}" , name= "article_view")
     * @param $id
     * @return Response
     */
    public function viewArticle($id)
    {
        $article=$this->getDoctrine()->getRepository(Article::class)->find($id);

        return $this->render('article/details.html.twig',['article'=>$article]);

    }

    /**
     * @Route("/article/edit/{id}", name="article_edit")
     * @Security("is_granted('IIS_AUTHENTICATED_FULLY')")
     *
     * @param $id
     * @param Request $request
     *
     */
    public function editArticle($id, Request $request){
        $article=$this->getDoctrine()->getRepository(Article::class)->find($id);

        if (null===$article){
            $this->redirectToRoute('blog_index');
        }

        $form=$this->createForm(ArticleType::class,$article);
//        $form->handleRequest($request);
        $this->render('article/edit.html.twig', array(
            'article' =>$article,
            'form' =>$form->createView()
        ));
    }

}
