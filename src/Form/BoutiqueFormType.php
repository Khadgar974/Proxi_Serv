<?php

namespace App\Form;

use App\Entity\Boutique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

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
            ->add('image', FileType::class , [
                'label' => 'La photo de votre boutique',
                'mapped' => false,
                'required' => true,
                'constraints' => [
                    new File([
                        'maxSize' => '2048k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid jpeg or png document',
                    ])
                ],
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
