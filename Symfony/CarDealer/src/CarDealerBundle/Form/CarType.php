<?php

namespace CarDealerBundle\Form;

use CarDealerBundle\Entity\Cars;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('make', EntityType::class,[
           'class'=>Cars::class,
           'choice_label'=>'make',
            'query_builder'=>function (EntityRepository $er){
                return $er->createQueryBuilder('cars')
                    ->groupBy('cars.make');
            },
            'placeholder'=>'Choose a make'
        ])
        ->add('search', SubmitType::class,['label'=>'Search']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'carDealerBundle_make';
    }


}
