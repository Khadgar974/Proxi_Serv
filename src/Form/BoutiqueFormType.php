<?php

namespace App\Form;

use App\Entity\Boutique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class BoutiqueFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class)
            ->add('description', TextareaType::class) 
            ->add('SIRET', TextType::class, [
                'label' => 'Votre SIRET',
            ])
            ->add('adresse', TextType::class)
            ->add('code_postal', IntegerType::class)
            ->add('ville', TextType::class)
            ->add('tel', TextType::class )
            ->add('imageFileBoutique', VichImageType::class, [
                'label' => 'Image de votre boutique (format JPG ou PNG)',
                'required' => true,
                'allow_delete' => false,                
                'download_uri' => false,
                // 'imagine_pattern' => 'squared_thumbnail_medium'               
            ]) // Faire l'upload d'image - jpg / png
            ->add('imageFileLogo', VichImageType::class, [
                'label' => 'Votre logo (format JPG ou PNG)',
                'required' => true,
                'allow_delete' => false,                
                'download_uri' => false,
                // 'imagine_pattern' => 'squared_thumbnail_small'             
            ]) // faire l'upload d'image - jpg / png / svg
                    
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
