<?php

namespace App\DataFixtures;

use App\Entity\Coder;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CoderFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $codersData = [
            [
                'name' => 'Фёдоров Андрей Валерьевич',
                'position' => 'CEO',
                'email' => 'fedorov@brotherhood.software',
                'phone' => '+7 (933) 888-66-66',
                'birthdate' => '12.04.1980',
            ],
            [
                'name' => 'Казанцев Николай Юрьевич',
                'position' => 'Senior Backend Developer',
                'email' => 'kazantsev@brotherhood.software',
                'phone' => '+7 (933) 866-66-77',
                'birthdate' => '08.06.1984',
            ],
            [
                'name' => 'Казеичев Никита Евгеньевич',
                'position' => 'Senior Frontend Developer',
                'email' => 'kazeichev@brotherhood.software',
                'phone' => '+7 (933) 855-55-77',
                'birthdate' => '06.08.1995',
            ],
            [
                'name' => 'Давыдов Константин Сергеевич',
                'position' => 'Junior PHP Developer',
                'email' => 'davydov@brotherhood.software',
                'phone' => '+7 (906) 844-44-88',
                'birthdate' => '04.12.1985',
            ],
        ];

        foreach ($codersData as $coderData) {
            $coder = new Coder();
            $coder->setName($coderData['name']);
            $coder->setPosition($coderData['position']);
            $coder->setEmail($coderData['email']);
            $coder->setPhone($coderData['phone']);
            $coder->setBirthdate(new \DateTime($coderData['birthdate']));
            $manager->persist($coder);
        }

        $manager->flush();
    }
}
