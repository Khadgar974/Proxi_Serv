<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;

class CategorieFixtures extends Fixture 
{
    public function load(ObjectManager $manager): void
    {
        $alimentation = new Categorie;
        $alimentation -> setTitle('Alimentation');
        $alimentation -> setDescription('Restauration, Produits Frais');
        $manager->persist($alimentation);

        $multimedia = new Categorie;
        $multimedia -> setTitle('Multimédia');
        $multimedia -> setDescription('Téléphonie, Informatique, Vidéo');
        $manager->persist($multimedia);

        $vetements = new Categorie;
        $vetements -> setTitle('Vetements / Maroquinerie');
        $vetements -> setDescription('Restauration, Produits Frais');
        $manager->persist($vetements);

        $manager->flush();

        $this->addReference('alimentation', $alimentation);
        $this->addReference('multimedia', $multimedia);
        $this->addReference('vetements', $vetements);
    }
}
