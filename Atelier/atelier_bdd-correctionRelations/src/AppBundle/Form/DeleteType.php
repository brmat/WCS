<?php

namespace AppBundle\Form;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class DeleteType extends AbstractType
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
                $this->manager->remove($event->getForm()->getData());
                $this->manager->flush($event->getForm()->getData());
            }, -128)
        ;
    }

    public function getName()
    {
        return 'rg_form_delete';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
           'label' => false,
           'attr' => array('class' => 'hidden', 'id' => 'form_rg_delete'),
       ));
    }
}
