<?php

namespace EasyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
        ->add('city')
        ->add('beginDate')
        ->add('endDate')
        ->add('picture', FileType::class,array(
                "label" => "Imagen:",
                "attr" =>array("class" => "form-control")
            ))
        ->add('reference')
        ->add('area', ChoiceType::class,array(
          "label" => "Area",
          'choices' => array(
            'Reception & Booking'=>1,
        		'Bar & Restaurant'=>2,
        		'Kitchen'=>3,
        		'Housekeeping'=>4,
        		'Events'=>5,
        		'Human Resources'=>6,
        		'Maintenance'=>7,
        		'Gardening'=>8,
        		'Entertainers'=>9,
        		'Hairdresser'=>10,
        		'Beautician'=>11,
        		'Physiotherapist'=>12,
        		'Information Technician'=>13,
        		'Web Design & Development'=>14,
        		'Graphic Design'=>15,
        		'Automotive'=>16,
        		'Agriculture & Food'=>17,
        		'Industry & Materials'=>18,
        		'Electrical & Electronics'=>19,
        		'Metallurgical'=>20,
        		'Arquitecture & Construction'=>21,
        		'Administration'=>22,
        		'Finances & Accounting'=>23,
        		'Marketing & Commercial'=>24,
        		'Social Networks & Communication'=>25,
        		'Customer Service'=>26,
        		'Logistics'=>27,
        ),
          "attr" =>array("class" => "form-control")
        ))
        ->add('location', ChoiceType::class,array(
                "label" => "Location",
                'choices' => array(
                'Spain' => 1,
                'Italy' => 2,
                'France' => 3,
              ),
                "attr" =>array("class" => "form-control")
            ))
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
