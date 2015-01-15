<?php

namespace Dbronczyk\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class QuestionnarieType extends AbstractType
{

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dbronczyk\DemoBundle\Entity\Questionnarie'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dbronczyk_demobundle_questionnarie';
    }
}
