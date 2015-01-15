<?php

namespace Dbronczyk\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feed
 *
 * @ORM\Entity
 * @ORM\Table()
 */
class Feed
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $title;
    
    /**
     * @ORM\Column(type="text")
     */
    protected $content;
    
    /**
	 * @ORM\OneToOne(targetEntity="Dbronczyk\DemoBundle\Entity\Image")
	 */
    protected $image;
    
   /**
    * @ORM\ManyToMany(targetEntity="Dbronczyk\DemoBundle\Entity\Tag")
    * @ORM\JoinTable()
    */
    protected $tags;
}