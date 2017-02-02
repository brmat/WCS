<?php

namespace AppBundle\Form;

use AppBundle\Entity\Interfaces\CopiableInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Antoine Bousquet <antoine.bousquet@sensiolabs.com>
 */
class CopyType extends AbstractType
{
    private $manager;

    public function __construct(EntityManager $manager)
    {
        $this->manager = $manager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
                $entity = $event->getForm()->getData();

                if (!$entity instanceof CopiableInterface) {
                    throw new \Exception('The entity "' . get_class($entity) . '" must implement the Copiable Interface');
                }

                $copy = $entity->getCopy();

                $this->manager->persist($copy);
                $this->manager->flush($copy);
            }, -128)
        ;
    }

    public function getName()
    {
        return 'rg_form_copy';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
           'label' => false,
           'attr' => array('class' => 'hidden', 'id' => 'form_rg_copy'),
       ));
    }
}
