<?php

namespace Mykees\TagBundle\Form;

use Mykees\TagBundle\Manager\TagManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TagType extends AbstractType
{
    public $manager;

    public function __construct(TagManager $manager)
    {
        $this->manager = $manager;
    }
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new TagTransformer($this->manager);
        $builder->addModelTransformer($transformer);
    }
    
    public function getParent()
    {
        return TextType::class;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mk_tag';
    }
}
