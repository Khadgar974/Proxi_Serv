<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Produits;

class ProduitFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $produit = new Produits();
        $produit->setTitle('Calabraise');
        $produit->setDescription('Une bien bonne pizza au Saumon');
        $produit->setPrix('10');
        $produit->setQuantite('5');
        $produit->setReference('Cala');
        $produit->setImage('pouet.jpg');
        $produit->setBonPlan('1');        
        $produit->setBoutique($this->getReference('boutique'));        
        $manager->persist($produit);
        $manager->flush();

        $this->addReference('produit', $produit);
    }

    public function getDependencies()
    {
        return [
            BoutiqueFixtures::class,
            
        ];
    }
    
}
