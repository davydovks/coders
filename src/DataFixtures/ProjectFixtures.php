<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $projectsData = [
            [
                'name' => 'UniSender',
                'customer' => 'Uni',
            ],
            [
                'name' => 'PinkIt',
                'customer' => 'Пинкит',
            ],
            [
                'name' => 'Nutrilogic',
                'customer' => 'Российский союз нутрициологов и диетологов',
            ],
        ];

        foreach ($projectsData as $projectData) {
            $project = new Project();
            $project->setName($projectData['name']);
            $project->setCustomer($projectData['customer']);
            $project->addCoder($this->getReference("coder_" . rand(0, 3)));
            $project->addCoder($this->getReference("coder_" . rand(0, 3)));
            $manager->persist($project);
        }

        $manager->flush();
    }

    /**
     * @return list<class-string<Fixture>>
     */
    public function getDependencies(): array
    {
        return [CoderFixtures::class];
    }
}
