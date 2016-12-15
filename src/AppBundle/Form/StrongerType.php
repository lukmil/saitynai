<?php
/**
 * Created by PhpStorm.
 * User: lukmil
 * Date: 11/21/2016
 * Time: 21:04
 */

namespace AppBundle\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class StrongerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('champion1', EntityType::class, [
                'placeholder' => 'champion1',
                'class' => 'AppBundle\Entity\champion',
                'choice_label' => 'name'
            ])
            ->add('champion2', EntityType::class, [
                'placeholder' => 'champion2',
                'class' => 'AppBundle\Entity\champion',
                'choice_label' => 'name'
            ])
            ->add('stronger', EntityType::class, [
                'placeholder' => 'stronger',
                'class' => 'AppBundle\Entity\champion',
                'choice_label' => 'name'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' =>'AppBundle\Entity\matches'
        ]);
    }

    public function getId()
    {
        return 'app_bundle_stronger_type';
    }
}
