<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpKernel\Exception\NotFoundHttpException,
    Symfony\Component\HttpFoundation\Response,
    Symfony\Component\HttpKernel\Exception\HttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use FOS\RestBundle\View\View,
    FOS\RestBundle\Controller\Annotations as Rest,
    FOS\RestBundle\Request\ParamFetcher,
    FOS\RestBundle\Controller\Annotations\RequestParam,
    FOS\RestBundle\Controller\Annotations\QueryParam;
use AppBundle\Entity\Token;

class DefaultController extends Controller
{
    /**
     * @Route("/token/{token}")
     * @Method("GET")
     * @Rest\View(serializerEnableMaxDepthChecks=true)
     */
    public function oneAction($token)
    {
        return ["token" => $this->getRepository()->findOneByToken($token)];
    }
    
    protected function getRepository()
    {
        return $this->getDoctrine()->getRepository("AppBundle:Token");
    }
}
