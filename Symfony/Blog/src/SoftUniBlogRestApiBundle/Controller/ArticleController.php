<?php

namespace SoftUniBlogRestApiBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use SoftUniBlogBundle\Entity\User;
use SoftUniBlogBundle\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SoftUniBlogBundle\Entity\Article;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{
    /**
     * @Route("/articles", name="rest_api_articles")
     * @Method({"GET"})
     */
    public function articlesAction()
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();
        $serializer = $this->container->get('jms_serializer');
        $json = $serializer->serialize($articles, 'json');

        return new Response($json, Response::HTTP_OK, array(
            'content-type' => 'application/json'
        ));
    }

    /**
     * @Route("/articles/{id}" , name="rest_api_article")
     * @Method({"GET"})
     * @param $id article id
     * @return Response
     */
    public function articleAction($id)
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);

        if (null === $article) {
            return new Response(json_encode(array('error' => 'resource not found!')),
                Response::HTTP_NOT_FOUND,
                array('content-type' => 'application/json')
            );
        }

        $serializer = $this->container->get('jms_serializer');
        $articleJson = $serializer->serialize($article, 'json');

        return new Response($articleJson, Response::HTTP_OK, array('content-type' => 'application/json'));
    }

    /**
     * @Route("/article/create", name="rest_api_article_create")
     * @Method({"POST"})
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function createAction(Request $request)
    {
        try {
            //process submitted data
            $newArticle = $this->createNewArticle($request);
            return new Response($newArticle, Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return new Response(json_encode(
                ['error' => $e->getMessage()]
            ),
                Response::HTTP_BAD_REQUEST,
                array('content-type' => 'application/json')
            );
        }
    }

    /**
     * Creates new article from request parameters and persists it
     * @param Request $request
     * @return Article - persisted article
     * @throws \Exception
     */

    private function createNewArticle(Request $request)
    {
        $article = new Article();
        $params = $request->request->all();
        return $this->processForm($article, $params, 'POST');
    }

    /**
     * Process form
     * @param Article $article
     * @param array $params
     * @param string $method
     * @return Article
     * @throws \Exception
     */
    private function processForm($article, array $params, $method = 'PUT')
    {
        foreach ($params as $param => $paramValue) {
            if (null === $paramValue || 0 === strlen(trim($paramValue))) {
                throw new \Exception('invalid data: ' . $param);
            }
        }

        if (!array_key_exists('authorId', $params)) {
            throw new \Exception('invalid data: authorId');
        }

        $user = $this->getDoctrine()->getRepository(User::class)->find($params['authorId']);

        if (null === $user) {
            throw new \Exception('invalid user id');
        }

        $form = $this->createForm(ArticleType::class, $article, ['method' => $method]);
        $form->submit($params);

        if ($form->isSubmitted()) {
            $article->setAuthor($user);
            //get entity manager
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();
            return $article;
        }

        throw new \Exception('submitted data is invalid ');
    }

    /**
     * @Route("/articles/{id}" , name="rest_api_article_edit")
     * @Method({"PUT"})
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function editAction(Request $request, $id)
    {
        try {
            $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
            if (null === $article) {
                //create new article
                $this->createNewArticle($request);
                $statusCode = Response::HTTP_CREATED;
            } else {
                //update existing article
                $this->processForm($article, $request->request->all(), 'PUT');
                $statusCode = Response::HTTP_NO_CONTENT;
            }

            return new Response(null, $statusCode);

        } catch (\Exception $e) {
            return new Response(json_encode(['error' => $e->getMessage()]), Response::HTTP_BAD_REQUEST, array('content-type' => 'application/json'));
        }
    }

    /**
     * @Route("/articles/{id}", name="rest_api_article_delete")
     * @Method({"DELETE"})
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function deleteAction(Request $request, $id)
    {
        try {
            $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
            if (null === $article) {
                $statusCode = Response::HTTP_NOT_FOUND;
            } else {
                $em = $this->getDoctrine()->getManager();
                $em->remove($article);
                $em->flush();
                $statusCode = Response::HTTP_NO_CONTENT;
            }
            return new Response(null.$statusCode);
        } catch (\Exception $e) {
            return new Response(json_encode(['error' => $e->getMessage()]), Response::HTTP_BAD_REQUEST, array('content-type' => 'application/json'));

        }
    }
}