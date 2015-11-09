<?php

namespace test\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     * @Method({"GET"})
     * @return Response
     */
    public function indexAction() {
        return $this->render('testTestBundle::index.html.twig');
    }

    /**
     * @Route("/api/upload", name="upload")
     * @Method({"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function uploadAction(Request $request){
        $data = json_decode($request->getContent(), true);
        $now = new \DateTime();
        $ext = $data['name'];
        $path = 'uploads/' . md5($now->getTimestamp()) . "." . $ext;
        $res = $this->get('test.uploader')->upload($data['file'], $path);
        return new JsonResponse($res);
    }
}
