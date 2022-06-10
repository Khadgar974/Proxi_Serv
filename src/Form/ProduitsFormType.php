<?php

namespace App\Form;

use App\Entity\Produits;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProduitsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => "Titre"
            ])
            ->add('description', TextareaType::class)
            
            ->add('prix', IntegerType::class)
            ->add('quantite', IntegerType::class)
            ->add('reference', TextType::class)
            ->add(
                'bon_plan',
                ChoiceType::class,
                [
                    'label' => 'Souhaitez-vous mettre en avant ce produit ?',
                    'choices' => [
                        'oui' => '1',
                        'non' => '0'
                    ],
                    'expanded' => true,
                    'multiple' => false,
                    'mapped' => true,

                ])
            ->add('imageFileProduit', VichImageType::class, [
                'label' => 'Image de votre produit (format JPG ou PNG)',
                'required' => true,
                'allow_delete' => false,
                'download_uri' => false,
                'imagine_pattern' => '...'                
            ])            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produits::class,
        ]);
    }
}
