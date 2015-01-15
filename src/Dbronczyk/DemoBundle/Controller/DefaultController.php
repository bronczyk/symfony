<?php

namespace Dbronczyk\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Dbronczyk\DemoBundle\Post\Post;

class DefaultController extends Controller
{
 	
    public function indexAction()
    {
        $post = new Post('../src/Dbronczyk/DemoBundle/Post/feed.json');
        
        return $this->render('DbronczykDemoBundle:Default:index.html.twig', array(
            'post' => $post
        ));
    }
    
    
    
    /**
     * @Route("/about", name="about")
     * @Template()
     */
    public function aboutAction()
    {
        return array();
    }
	
	/**
     * @Route("/contact", name="contact")
     * @Template()
     */
    public function contactAction()
    {
        return array();
    }
}
