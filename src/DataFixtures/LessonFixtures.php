<?php

namespace App\DataFixtures;

use App\Entity\Lesson;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\Reference;
use Faker\Factory;
use Faker\Generator;

class LessonFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $lesson1 = new Lesson();
        $lesson1->setTitle('Lesson Language C++');
        $lesson1->setName('Lesson Language C++');
        $lesson1->setLinklesson('https://www.freecodecamp.org/news/content/images/size/w2000/2022/03/How-to-Learn-the-C---Programming-Language.png');
        
        $manager->persist($lesson1);

        $lesson2 = new Lesson();
        $lesson2->setTitle('Lesson Banner Photo Design');
        $lesson2->setName('Lesson Banner Photo Design');
        $lesson2->setLinklesson('https://taynamsolution.vn/wp-content/uploads/2021/01/banner-design.jpg');
        
        $manager->persist($lesson2);

        $lesson3 = new Lesson();
        $lesson3->setTitle('Lesson Circuit Design');
        $lesson3->setName('Lesson Circuit Design');
        $lesson3->setLinklesson('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSc0gft2UGcztOakuIrw9S4960by_sGiWQLkw&usqp=CAU');
        
        $manager->persist($lesson3);

        $manager->flush();

        $this->addReference('lesson1',$lesson1);
        $this->addReference('lesson2',$lesson2);
        $this->addReference('lesson3',$lesson3);

    }
}
