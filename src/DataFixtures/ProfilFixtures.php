<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\User;
use App\Entity\Profil;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProfilFixtures extends Fixture implements DependentFixtureInterface
{
    private $faker;

    public function __construct(){
        $this->faker=Factory::create("fr_FR");
    }

    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<10;$i++){
            $profil = new Profil();
            $profil->setBiographieProfil($this->faker->sentence())
            ->setPhotoProfil($this->faker->word())
            ->setBanniereProfil($this->faker->word())
            ->setUser($this->getReference('user'.$i));
            $this->addReference('profil'.$i, $profil);
            $manager->persist($profil);
        }
        $manager->flush();
    }
    public function getDependencies()    
    {        
        return [            
            UserFixtures::class,                    
        ];    
    }
}