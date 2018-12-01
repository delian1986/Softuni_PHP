<?php

namespace CarDealerBundle\Form;

use CarDealerBundle\Entity\Sales;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SaleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('sales', EntityType::class,[
            'class'=>Sales::class,
            'choice_label'=>'discount',
            'query_builder'=>function (EntityRepository $er){
                return $er->createQueryBuilder('s')
                    ->groupBy('s.discount');
            },
            'placeholder'=>'Choose a discount'
        ])
            ->add('search', SubmitType::class,['label'=>'Search']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'discount';
    }
}
