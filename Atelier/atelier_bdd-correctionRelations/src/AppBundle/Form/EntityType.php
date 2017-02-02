<?php

namespace AppBundle\Form;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class EntityType extends AbstractType
{
    private $manager;

    private $requestStack;

    public function __construct(EntityManager $manager, RequestStack $requestStack)
    {
        $this->manager = $manager;
        $this->requestStack = $requestStack;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('submit', 'submit', array('label' => 'Save'))

            ->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
                if ($event->getForm()->isValid()) {
                    $data = $event->getForm()->getData();
                    $this->manager->persist($data);
                    $this->manager->flush();
                }
            }, -128)
        ;
    }

    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        // this pushes the submit button at the bottom of the form
        $submit = $view['submit'];
        unset($view['submit']);
        $view->children['submit'] = $submit;

        $view->vars['attr']['novalidate'] = 'novalidate';
    }

    public function getName()
    {
        return 'rg_form_entity';
    }
}
