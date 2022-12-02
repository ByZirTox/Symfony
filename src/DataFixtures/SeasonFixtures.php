<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use App\Entity\Season;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use phpDocumentor\Reflection\Types\Self_;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{

    public const SEASONS = [
        'Saison1',
        'Saison2',
        'Saison3',
        'Saison4',
        'Saison5',
    ];

    public function load(ObjectManager $manager): void
    {

        foreach (Self::SEASONS as $key) {
            $saisons = new Season();

            $saisons->setNumber(5);

            $saisons->setYear(2002);

            $saisons->setDescription($key);

            $program =  $this->getReference('program_walking');

            $this->addReference('program_walking_' . $key , $saisons);
           
            $saisons->setProgram($program);

            $manager->persist($saisons);
        }
        
        
        foreach (Self::SEASONS as $key) {
            $saisons = new Season();

            $saisons->setNumber(5);

            $saisons->setYear(2002);

            $saisons->setDescription($key);

            $program =  $this->getReference('program_avengers');

            $this->addReference('program_avengers_' . $key , $saisons);
           
            $saisons->setProgram($program);

            $manager->persist($saisons);
        }

        foreach (Self::SEASONS as $key) {
            $saisons = new Season();

            $saisons->setNumber(5);

            $saisons->setYear(2002);

            $saisons->setDescription($key);

            $program =  $this->getReference('program_howToSellDrugs');

            $this->addReference('program_howToSellDrugs_' . $key , $saisons);

            $saisons->setProgram($program);

            $manager->persist($saisons);
        }

        foreach (Self::SEASONS as $key) {
            $saisons = new Season();

            $saisons->setNumber(5);

            $saisons->setYear(2002);

            $saisons->setDescription($key);

            $program =  $this->getReference('program_breaking');

            $this->addReference('program_breaking_' . $key , $saisons);

            $saisons->setProgram($program);

            $manager->persist($saisons);
        }

        foreach (Self::SEASONS as $key) {
            $saisons = new Season();

            $saisons->setNumber(5);

            $saisons->setYear(2002);

            $saisons->setDescription($key);

            $program =  $this->getReference('program_rickEtMorty');

            $this->addReference('program_rickEtMorty_' . $key , $saisons);

            $saisons->setProgram($program);

            $manager->persist($saisons);
        }

        $manager->flush();
    }
    public function getDependencies()

    {

        return [

            ProgramFixtures::class,

        ];
    }
}
