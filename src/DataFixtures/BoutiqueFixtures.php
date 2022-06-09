<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Boutique;

class BoutiqueFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $boutique = new Boutique;
        $boutique -> setTitle('Risle Pizza');
        $boutique -> setDescription('Une bien belle Pizzeria');
        $boutique -> setSIRET ('123456789');
        $boutique -> setAdresse('93 rue de la république');
        $boutique -> setCodePostal('27500');
        $boutique -> setVille('Pont Audemer');
        $boutique -> setTel('0232323232');
        $boutique -> setImage('Oh la belle image');
        $boutique -> setLogo('Oh le beau logo');
        $boutique -> setIsSiretVerified('1');
        $boutique -> setIsActive('1');

        $manager->persist($boutique);
        $manager->flush();
    }
}
