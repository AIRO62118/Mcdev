<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Domaine;
use App\Entity\Competence;
class DomaineFixtures extends Fixture
{
    private $faker;

    public function __construct(){
        $this->faker=Factory::create("fr_FR");
    }

    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<10;$i++){
            $domaine = new Domaine();
            $domaine->setLibelle($this->faker->lastName());
            $domaine->setCompetence($this->getReference('competence'.(mt_rand(0,9))));
            $this->addReference('domaine'.$i, $domaine);
            $manager->persist($domaine);
        }
        $manager->flush();
    }
    public function getDependencies()    {
        return [ 
            CompetenceFixtures::class,       
            ];    
        }
}

//php bin/console doctrine:fixtures:load