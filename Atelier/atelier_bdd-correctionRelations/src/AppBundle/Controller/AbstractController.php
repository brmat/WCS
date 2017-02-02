<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Laetitia Serre
 */
class AbstractController extends Controller
{
    protected function getManager()
    {
        return $this->getDoctrine()->getManager();
    }

    protected function getRepository($name)
    {
        if (false === strpos($name, 'AppBundle')) {
            $name = 'AppBundle:' . $name;
        }

        return $this->getDoctrine()->getRepository($name);
    }

    protected function persistAndFlush($entity)
    {
        $manager = $this->getManager();
        $manager->persist($entity);
        $manager->flush($entity);
    }

    protected function onlyAjax(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            throw $this->createNotFoundException();
        }
    }

    protected function delete($entity)
    {
        $this->getManager()->remove($entity);
        $this->getManager()->flush($entity);

        $this->get('session')->getFlashBag()->add(
            'notice',
            'The selected element has been deleted'
        );
    }
}
