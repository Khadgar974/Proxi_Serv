<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Boutique;
use App\Entity\User;

class BoutiqueFixtures extends Fixture implements DependentFixtureInterface
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
        $boutique -> setUser($this->getReference('user'));

        $manager->persist($boutique);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
