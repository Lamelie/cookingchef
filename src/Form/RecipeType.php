<?php

namespace App\Form;

use App\Entity\Recipe;
use App\Entity\Tag;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label'=>'Titre',
                'attr'=> [
                    'placeholder'=> "Nom de ma recette"
                ]
            ])
            ->add('preparationTime')
            ->add('bakingTime')
            ->add('nbPersons')
            ->add('pictureFile', FileType::class, [
                'mapped'=>false
            ])
            ->add('difficulty')
            ->add('category')
            ->add('tags', EntityType::class, [
                'class'=>Tag::class,
                'multiple'=>true,
                'expanded'=>true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}
