<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{


    public const PROGRAM = [
        'Walking dead' => 'Des zombies envahissent la terre',
        'Avengers' => 'Des supers heros',
        'How to Sell Drugs Online (Fast)' => 'De la drogue sur le darkNet',
        'Breaking Bad' => 'Le best seller sur la drogue',
        'Rick et Morty' => 'Un humour dérivée',
    ];


    public function load(ObjectManager $manager)

    {

        
            $program = new Program();

            $program->setTitle('Walking dead');

            $program->setSynopsis('Des zombies envahissent la terre');

            $this->addReference('program_walking', $program);

            $program->setCategory($this->getReference('category_Horreur'));

            $manager->persist($program);

            
            $program = new Program();

            $program->setTitle('Avengers');

            $program->setSynopsis('Des supers heros');

            $this->addReference('program_avengers', $program);

            $program->setCategory($this->getReference('category_Action'));

            $manager->persist($program);

           
            $program = new Program();

            $program->setTitle('How to Sell Drugs Online (Fast)');

            $program->setSynopsis('De la drogue sur le darkNe');

            $this->addReference('program_howToSellDrugs', $program);

            $program->setCategory($this->getReference('category_Aventure'));

            $manager->persist($program);

            
            $program = new Program();

            $program->setTitle('Breaking Bad');

            $program->setSynopsis('Le best seller sur la drogue');

            $this->addReference('program_breaking', $program);

            $program->setCategory($this->getReference('category_Aventure'));

            $manager->persist($program);

           
            $program = new Program();

            $program->setTitle('Rick et Morty');

            $program->setSynopsis('Un humour dérivée');

            $this->addReference('program_rickEtMorty', $program);

            $program->setCategory($this->getReference('category_Animation'));

            $manager->persist($program);

        
        $manager->flush();
    }


    public function getDependencies()

    {

        return [

            CategoryFixtures::class,

        ];
    }
}
