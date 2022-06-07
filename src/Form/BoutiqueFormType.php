<?php

namespace App\Form;

use App\Entity\Boutique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BoutiqueFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class)
            ->add('description', TextareaType::class) 
            ->add('SIRET', TextType::class)
            ->add('adresse', TextType::class)
            ->add('code_postal', IntegerType::class)
            ->add('ville', TextType::class)
            ->add('tel', TextType::class )
            ->add('image', TextType::class , [
                'mapped' => 'false',
            ]) // Faire l'upload d'image - jpg / png
            ->add('logo', TextType::class, [
                'mapped' => 'false',
            ]) // faire l'upload d'image - jpg / png / svg
            // ->add('is_siret_verified')
            // ->add('is_active')            
            // ->add('user') user setter dans le controller
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Boutique::class,
        ]);
    }
}
