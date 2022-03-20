<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\User;
use App\Entity\Competence;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PossederFictures extends Fixture implements DependentFixtureInterface
{
    private $faker;

    public function __construct(){
        $this->faker=Factory::create("fr_FR");
    }

    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<10;$i++){
            $posseder = new Posseder();
            $posseder->setNiveau($this->faker->word())
            ->setUser($this->getReference('user'.$i))
            ->setCompetence($this->getReference('competence'.$i));
            $this->addReference('posseder'.$i, $posseder);
            $manager->persist($posseder);
        }
        $manager->flush();
    }
    public function getDependencies()    
    {        
        return [            
            UserFixtures::class,  
            CompetenceFixtures::class,                    
        ];    
    }
}