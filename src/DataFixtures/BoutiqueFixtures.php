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
        $boutique -> setDescription('Présente sur Pont-Audemer depuis 1999, nous proposons nos pizzas en livraison et à emporter');
        $boutique -> setSIRET ('01234567890123');
        $boutique -> setAdresse('92 rue de la république');
        $boutique -> setCodePostal('27500');
        $boutique -> setVille('Pont Audemer');
        $boutique -> setTel('0232323232');
        $boutique -> setImage('devanture-62a0b1bdbb307286323876.jpg');
        $boutique -> setImageFileBoutique();
        $boutique -> setLogo('logo.png');
        $boutique -> setImageFileLogo();
        $boutique -> setIsSiretVerified('1');
        $boutique -> setIsActive('1');
        $boutique -> setUser($this->getReference('admin2'));
        $manager->persist($boutique);

        $boutique2 = new Boutique;
        $boutique2->setTitle('Proxygen');
        $boutique2->setDescription('Magasin de vente de micro informatique et prestations de services informatique');
        $boutique2->setSIRET('98765432109876');
        $boutique2->setAdresse('93 rue de la république');
        $boutique2->setCodePostal('27500');
        $boutique2->setVille('Pont Audemer');
        $boutique2->setTel('0232323233');
        $boutique2->setImage('Proxygen.png');
        $boutique2->setImageFileBoutique();
        $boutique2->setLogo('logo-PROXYGEN-INFORMATIQUE.png');
        $boutique2->setImageFileLogo();
        $boutique2->setIsSiretVerified('1');
        $boutique2->setIsActive('1');
        $boutique2->setUser($this->getReference('admin'));
        $manager->persist($boutique2);

        $boutique3 = new Boutique;
        $boutique3->setTitle('Orange');
        $boutique3->setDescription('Boutique orange internet et téléphonie');
        $boutique3->setSIRET('98765432106589');
        $boutique3->setAdresse('28 rue de la république');
        $boutique3->setCodePostal('27500');
        $boutique3->setVille('Pont Audemer');
        $boutique3->setTel('0232323234');
        $boutique3->setImage('orange_devanture.jpg');
        $boutique3->setImageFileBoutique();
        $boutique3->setLogo('orange.png');
        $boutique3->setImageFileLogo();
        $boutique3->setIsSiretVerified('1');
        $boutique3->setIsActive('1');
        $boutique3->setUser($this->getReference('commercant2'));
        $manager->persist($boutique3);

        $boutique4 = new Boutique;
        $boutique4->setTitle('Maroquinerie Mae');
        $boutique4->setDescription('Vente de petite maroquinerie et bagages');
        $boutique4->setSIRET('98765432102255');
        $boutique4->setAdresse('57 rue de la république');
        $boutique4->setCodePostal('27500');
        $boutique4->setVille('Pont Audemer');
        $boutique4->setTel('0232323235');
        $boutique4->setImage('mae_devanture.jpg');
        $boutique4->setImageFileBoutique();
        $boutique4->setLogo('mae_logo.jpg');
        $boutique4->setImageFileLogo();
        $boutique4->setIsSiretVerified('1');
        $boutique4->setIsActive('1');
        $boutique4->setUser($this->getReference('commercant3'));
        $manager->persist($boutique4);

               

        
        $manager->flush();

        $this->addReference('boutique', $boutique);
        $this->addReference('boutique2', $boutique2);
        $this->addReference('boutique3', $boutique3);
        $this->addReference('boutique4', $boutique4);         
    } 

    public function getDependencies()
    {
        return [
            UserFixtures::class,            
        ];
    }
}
