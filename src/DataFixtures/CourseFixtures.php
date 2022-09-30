<?php

namespace App\DataFixtures;

use App\Entity\Course;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\ReferenceRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\ErrorHandler\DebugClassLoader;

class CourseFixtures extends Fixture
{
    public function load(ObjectManager $manager,): void
    {
    
        $course1 = new Course();
        $course1->setTitle('Course Infomation Technology');
        $course1->setName('Course Infomation Technology');
        $course1->setImgpath('https://5.imimg.com/data5/JN/BF/GLADMIN-22225191/information-technology-course-500x500.png');
        $course1->addLesson($this->getReference('lesson1'));
        $course1->addLesson($this->getReference('lesson2'));
        $manager->persist($course1);

        $course2 = new Course();
        $course2->setTitle('Course Mechatronics');
        $course2->setName('Course Mechatronics');
        $course2->setImgpath('https://cdn.peri.com/.imaging/mWide/dam/379c7efe-d8fc-4655-a8be-95968d57ddc1/53336/mechatronic-engineer.jpg');
        $course2->addLesson($this->getReference('lesson1'));
        $course2->addLesson($this->getReference('lesson3'));
        $manager->persist($course2);

        $course3 = new Course();
        $course3->setTitle('Course Graphic Design');
        $course3->setName('Course Graphic Design');
        $course3->setImgpath('https://tadtravel.vn/wp-content/uploads/2021/01/Graphic-Designing1.jpg');
        $course3->addLesson($this->getReference('lesson2'));
        $course3->addLesson($this->getReference('lesson3'));
        $manager->persist($course3);

        $manager->flush();

    }
}
