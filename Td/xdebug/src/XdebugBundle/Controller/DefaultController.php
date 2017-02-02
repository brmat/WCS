<?php

namespace XdebugBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('XdebugBundle:Default:index.html.twig');
    }
}
