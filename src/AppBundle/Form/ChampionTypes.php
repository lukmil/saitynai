<?php
/**
 * Created by PhpStorm.
 * User: lukmil
 * Date: 11/21/2016
 * Time: 21:04
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ChampionTypes extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name', TextType::class,array('disabled' => true))
            ->add('place', TextType::class,array('disabled' => true))
            ->add('img', TextType::class,array('disabled' => true));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\champion'
        ]);
    }

    public function getName()
    {
        return 'app_bundle_champion_type';
    }
}
