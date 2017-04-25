<?php

namespace EasyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class OffersType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
        ->add('description')
        ->add('beginDate')
        ->add('endDate')
        ->add('picture', FileType::class,array(
                "label" => "Imagen:",
                "attr" =>array("class" => "form-control")
            ))
        ->add('reference')
        ->add('area')->add('location')
        ->add('information')
        ->add('tasks')
        ->add('remuneration')
        ->add('stay')->add('availability')
        ->add('skills')->add('studies')
        ->add('language')->add('documents')
        ->add('clothing')->add('tools')
        ->add('submit', SubmitType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EasyBundle\Entity\Offers'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'easybundle_offers';
    }


}
