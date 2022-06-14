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
        $produit->setImage('pizza_2.jpg');
        $produit->setImageFileProduit();
        $produit->setBonPlan('1');
        $produit->setBoutique($this->getReference('boutique'));
        $manager->persist($produit);

        $produit2 = new Produits();
        $produit2->setTitle('SSD SanDisk');
        $produit2->setDescription('SSD PLUS - Gamer');
        $produit2->setPrix('10');
        $produit2->setQuantite('5');
        $produit2->setReference('Cala');
        $produit2->setImage('disque-dur-ssd.jpg');
        $produit2->setImageFileProduit();
        $produit2->setBonPlan('1');
        $produit2->setBoutique($this->getReference('boutique2'));
        $manager->persist($produit2);

        $produit3 = new Produits();
        $produit3->setTitle('RAM Veangeance RGB');
        $produit3->setDescription('16 Go 3000Mhz Cas 15');
        $produit3->setPrix('50');
        $produit3->setQuantite('5');
        $produit3->setReference('RAM');
        $produit3->setImage('ram.jpg');
        $produit3->setImageFileProduit();
        $produit3->setBonPlan('1');
        $produit3->setBoutique($this->getReference('boutique2'));
        $manager->persist($produit3);

        $produit4 = new Produits();
        $produit4->setTitle('Intel Core I9-12900K');
        $produit4->setDescription('3,2 GHz / 5,2 GHz');
        $produit4->setPrix('700');
        $produit4->setQuantite('5');
        $produit4->setReference('proc');
        $produit4->setImage('proc.jpg');
        $produit4->setImageFileProduit();
        $produit4->setBonPlan('1');
        $produit4->setBoutique($this->getReference('boutique2'));
        $manager->persist($produit4);

        $produit5 = new Produits();
        $produit5->setTitle('Gigabyte 3090RTX');
        $produit5->setDescription('24 Go Carte Graphique');
        $produit5->setPrix('700');
        $produit5->setQuantite('5');
        $produit5->setReference('CG');
        $produit5->setImage('RTX3090.jpg');
        $produit5->setImageFileProduit();
        $produit5->setBonPlan('1');
        $produit5->setBoutique($this->getReference('boutique2'));
        $manager->persist($produit5);

        $produit6 = new Produits();
        $produit6->setTitle('Ventirad Zalman');
        $produit6->setDescription('CNPS7500-AlCu');
        $produit6->setPrix('300');
        $produit6->setQuantite('5');
        $produit6->setReference('Ventirad');
        $produit6->setImage('zalman.jpg');
        $produit6->setImageFileProduit();
        $produit6->setBonPlan('1');
        $produit6->setBoutique($this->getReference('boutique2'));
        $manager->persist($produit6);

        $produit7 = new Produits();
        $produit7->setTitle('MSI B550 Tomahawk');
        $produit7->setDescription('Carte mère MSI MAG B550');
        $produit7->setPrix('300');
        $produit7->setQuantite('5');
        $produit7->setReference('CG');
        $produit7->setImage('B550.jpg');
        $produit7->setImageFileProduit();
        $produit7->setBonPlan('1');
        $produit7->setBoutique($this->getReference('boutique2'));
        $manager->persist($produit7);

        $produit8 = new Produits();
        $produit8->setTitle('Corsair CX750M');
        $produit8->setDescription('Bloc alimentation 750W');
        $produit8->setPrix('150');
        $produit8->setQuantite('5');
        $produit8->setReference('Bloc_Alim');
        $produit8->setImage('cx750.jpg');
        $produit8->setImageFileProduit();
        $produit8->setBonPlan('1');
        $produit8->setBoutique($this->getReference('boutique2'));
        $manager->persist($produit8);

        $manager->flush();

        $this->addReference('produit', $produit);
        $this->addReference('produit2', $produit2);
        $this->addReference('produit3', $produit3);
        $this->addReference('produit4', $produit4);
        $this->addReference('produit5', $produit5);
        $this->addReference('produit6', $produit6);
        $this->addReference('produit7', $produit7);
    }

    public function getDependencies()
    {
        return [
            BoutiqueFixtures::class,

        ];
    }
}
