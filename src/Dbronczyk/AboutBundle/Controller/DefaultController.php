<?php

namespace Dbronczyk\AboutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DbronczykAboutBundle:Default:index.html.twig', array('name' => $name));
    }
}
