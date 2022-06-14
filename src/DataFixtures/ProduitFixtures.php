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
        $produit->setDescription('Crème moutarde, mozzarella, tomate fraîche, thon, persil');
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

        $produit9 = new Produits();
        $produit9->setTitle('Chicken');
        $produit9->setDescription('Crème, Pomme de terre, mozzarella, poulet tikka, oeuf, sauce barbecue');
        $produit9->setPrix('10');
        $produit9->setQuantite('5');
        $produit9->setReference('Chick');
        $produit9->setImage('pizza_1.jpg');
        $produit9->setImageFileProduit();
        $produit9->setBonPlan('1');
        $produit9->setBoutique($this->getReference('boutique'));
        $manager->persist($produit9);

        $produit10 = new Produits();
        $produit10->setTitle('Tartiflette');
        $produit10->setDescription('Tomate, mozzarella, pomme de terre, lardons, reblochon, oignon crème');
        $produit10->setPrix('10');
        $produit10->setQuantite('5');
        $produit10->setReference('Tarti');
        $produit10->setImage('Tartiflette.jpg');
        $produit10->setImageFileProduit();
        $produit10->setBonPlan('1');
        $produit10->setBoutique($this->getReference('boutique'));
        $manager->persist($produit10);

        $produit11 = new Produits();
        $produit11->setTitle('Plaque Apéro');
        $produit11->setDescription('5 variétés');
        $produit11->setPrix('10');
        $produit11->setQuantite('5');
        $produit11->setReference('Apero');
        $produit11->setImage('apero.jpg');
        $produit11->setImageFileProduit();
        $produit11->setBonPlan('1');
        $produit11->setBoutique($this->getReference('boutique'));
        $manager->persist($produit11);

        $produit12 = new Produits();
        $produit12->setTitle('Escargotine');
        $produit12->setDescription('Tomate, mozzarella, champignons, escargots, beurre d escargot, crème');
        $produit12->setPrix('10');
        $produit12->setQuantite('5');
        $produit12->setReference('Escargotine');
        $produit12->setImage('Escargotine.jpg');
        $produit12->setImageFileProduit();
        $produit12->setBonPlan('1');
        $produit12->setBoutique($this->getReference('boutique'));
        $manager->persist($produit12);

        $produit13 = new Produits();
        $produit13->setTitle('Pizzaiolo');
        $produit13->setDescription('Tomate, mozzarella, champignons, jambon, lardons, oeuf, bacon');
        $produit13->setPrix('10');
        $produit13->setQuantite('5');
        $produit13->setReference('Pizzaiolo');
        $produit13->setImage('pizzaiolo.jpg');
        $produit13->setImageFileProduit();
        $produit13->setBonPlan('1');
        $produit13->setBoutique($this->getReference('boutique'));
        $manager->persist($produit13);

        $produit14 = new Produits();
        $produit14->setTitle('Calzone');
        $produit14->setDescription('Tomate, mozzarella, champignons, jambon, lardons, oeuf, bacon');
        $produit14->setPrix('10');
        $produit14->setQuantite('5');
        $produit14->setReference('Calzone');
        $produit14->setImage('calzone.jpg');
        $produit14->setImageFileProduit();
        $produit14->setBonPlan('1');
        $produit14->setBoutique($this->getReference('boutique'));
        $manager->persist($produit14);

        $produit15 = new Produits();
        $produit15->setTitle('Bigout');
        $produit15->setDescription('Choisissez parmi 2 de nos pizzas pour composer la votre');
        $produit15->setPrix('10');
        $produit15->setQuantite('5');
        $produit15->setReference('Bigout');
        $produit15->setImage('bigout.jpg');
        $produit15->setImageFileProduit();
        $produit15->setBonPlan('1');
        $produit15->setBoutique($this->getReference('boutique'));
        $manager->persist($produit15);

        $produit16 = new Produits();
        $produit16->setTitle('X3 Pro');
        $produit16->setDescription('Snapdragon 860, 256 Go, 8Go Ram');
        $produit16->setPrix('10');
        $produit16->setQuantite('5');
        $produit16->setReference('X3PRO');
        $produit16->setImage('x3pro.jpg');
        $produit16->setImageFileProduit();
        $produit16->setBonPlan('1');
        $produit16->setBoutique($this->getReference('boutique3'));
        $manager->persist($produit16);

        $manager->flush();

        $this->addReference('produit', $produit);
        $this->addReference('produit2', $produit2);
        $this->addReference('produit3', $produit3);
        $this->addReference('produit4', $produit4);
        $this->addReference('produit5', $produit5);
        $this->addReference('produit6', $produit6);
        $this->addReference('produit7', $produit7);
        $this->addReference('produit8', $produit8);
        $this->addReference('produit9', $produit9);
        $this->addReference('produit10', $produit10);
        $this->addReference('produit11', $produit11);
        $this->addReference('produit12', $produit12);
        $this->addReference('produit13', $produit13);
        $this->addReference('produit14', $produit14);
        $this->addReference('produit15', $produit15);
        $this->addReference('produit16', $produit16);
    }

    public function getDependencies()
    {
        return [
            BoutiqueFixtures::class,

        ];
    }
}
