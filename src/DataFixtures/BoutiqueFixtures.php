<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Boutique;
use App\Entity\Categorie;
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
        $boutique->addCategorie($this->getReference('alimentation'));
        
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
        $boutique2->addCategorie($this->getReference('multimedia'));
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
        $boutique3->addCategorie($this->getReference('multimedia'));
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
        $boutique4->addCategorie($this->getReference('vetements'));
        $manager->persist($boutique4);

        $boutique5 = new Boutique;
        $boutique5->setTitle('Patrice Breal');
        $boutique5->setDescription('Magasin de vetements');
        $boutique5->setSIRET('98765432102366');
        $boutique5->setAdresse('33 rue de la république');
        $boutique5->setCodePostal('27500');
        $boutique5->setVille('Pont Audemer');
        $boutique5->setTel('0232323236');
        $boutique5->setImage('breal_devanture.jpg');
        $boutique5->setImageFileBoutique();
        $boutique5->setLogo('logo_breal.png');
        $boutique5->setImageFileLogo();
        $boutique5->setIsSiretVerified('1');
        $boutique5->setIsActive('1');
        $boutique5->setUser($this->getReference('commercant4'));
        $boutique5->addCategorie($this->getReference('vetements'));
        $manager->persist($boutique5);

        $boutique6 = new Boutique;
        $boutique6->setTitle('Sensei Sushi');
        $boutique6->setDescription('Cuisine japonaise sur place et à emporter');
        $boutique6->setSIRET('9876543210237');
        $boutique6->setAdresse('31 rue de la république');
        $boutique6->setCodePostal('27500');
        $boutique6->setVille('Pont Audemer');
        $boutique6->setTel('0232323237');
        $boutique6->setImage('sushi.jpeg');
        $boutique6->setImageFileBoutique();
        $boutique6->setLogo('logo_sushi.png');
        $boutique6->setImageFileLogo();
        $boutique6->setIsSiretVerified('1');
        $boutique6->setIsActive('1');
        $boutique6->setUser($this->getReference('commercant5'));
        $boutique6->addCategorie($this->getReference('alimentation'));
        $manager->persist($boutique6);

        $boutique7 = new Boutique;
        $boutique7->setTitle('Come Back');
        $boutique7->setDescription('Magasin de vêtements');
        $boutique7->setSIRET('9876543210238');
        $boutique7->setAdresse('39 rue de la république');
        $boutique7->setCodePostal('27500');
        $boutique7->setVille('Pont Audemer');
        $boutique7->setTel('0232323238');
        $boutique7->setImage('comeback.jpg');
        $boutique7->setImageFileBoutique();
        $boutique7->setLogo('comeback_logo.jpg');
        $boutique7->setImageFileLogo();
        $boutique7->setIsSiretVerified('1');
        $boutique7->setIsActive('1');
        $boutique7->setUser($this->getReference('commercant6'));
        $boutique7->addCategorie($this->getReference('vetements'));
        $manager->persist($boutique7);

        $boutique9 = new Boutique;
        $boutique9->setTitle('Camaieu');
        $boutique9->setDescription('Magasin de vêtements');
        $boutique9->setSIRET('9876543210239');
        $boutique9->setAdresse('39 rue Gambetta');
        $boutique9->setCodePostal('27500');
        $boutique9->setVille('Pont Audemer');
        $boutique9->setTel('0232323249');
        $boutique9->setImage('camaieu.jpg');
        $boutique9->setImageFileBoutique();
        $boutique9->setLogo('logo-camaieu.jpg');
        $boutique9->setImageFileLogo();
        $boutique9->setIsSiretVerified('1');
        $boutique9->setIsActive('1');
        $boutique9->setUser($this->getReference('commercant7'));
        $boutique9->addCategorie($this->getReference('vetements'));
        $manager->persist($boutique9);

        $boutique8 = new Boutique;
        $boutique8->setTitle('Au Sha Room');
        $boutique8->setDescription('Magasin de vêtements');
        $boutique8->setSIRET('9876543210241');
        $boutique8->setAdresse('76 rue Gambetta');
        $boutique8->setCodePostal('27500');
        $boutique8->setVille('Pont Audemer');
        $boutique8->setTel('0232323251');
        $boutique8->setImage('devanture_sharoom.jpg');
        $boutique8->setImageFileBoutique();
        $boutique8->setLogo('sharoom.jpg');
        $boutique8->setImageFileLogo();
        $boutique8->setIsSiretVerified('1');
        $boutique8->setIsActive('1');
        $boutique8->setUser($this->getReference('commercant8'));
        $boutique8->addCategorie($this->getReference('vetements'));
        $manager->persist($boutique8);

        
        $manager->flush();

        $this->addReference('boutique', $boutique);
        $this->addReference('boutique2', $boutique2);
        $this->addReference('boutique3', $boutique3);
        $this->addReference('boutique4', $boutique4);
        $this->addReference('boutique5', $boutique5);
        $this->addReference('boutique6', $boutique6);
        $this->addReference('boutique7', $boutique7);
        $this->addReference('boutique8', $boutique8);
        $this->addReference('boutique9', $boutique9);         
    } 

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            CategorieFixtures::class,           
        ];
    }
}
