<?php

namespace App\Form;

use App\Entity\Ingredient;
use App\Entity\Pizza;
use App\Entity\PizzaBase;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PizzaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('base', EntityType::class, [
                'label' => 'Base',
                'class' => PizzaBase::class,
                'choice_label' => 'name'
            ])
            ->add('ingredients', EntityType::class, [
                'label' => 'Ingrédients',
                'class' => Ingredient::class,
                'multiple' => true,
                'choice_label' => 'name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pizza::class,
        ]);
    }
}
