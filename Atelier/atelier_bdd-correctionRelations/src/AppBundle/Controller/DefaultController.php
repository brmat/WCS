<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration as Conf;
use AppBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @author Laetitia Serre
 *
 * @Conf\Route("/")
 * @Conf\Template
 */
class DefaultController extends AbstractController
{
    /**
     * @Conf\Route("", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $results = $this->getRepository('Gabarit')->getModeleByCarburant('ESS');

        return $this->container->get('templating')->renderResponse('AppBundle::index.html.twig', array(
            'results'                     => $results,
        ));
    }
}
