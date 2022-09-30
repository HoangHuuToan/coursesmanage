<?php

namespace App\Controller;

use App\Entity\Course;
use App\Entity\Lesson;
use App\Repository\CourseRepository;
use App\Repository\LessonRepository;
use Doctrine\DBAL\Query;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Doctrine\ORM\Mapping\Index;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;



 

class CourseController extends AbstractController
{

    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;
    }

    #[Route('/course/api', name: 'api_course')]
    public function REST_API(ManagerRegistry $doctrine): Response
    {   
   
        $courses = $doctrine
            ->getRepository(Course::class)
            ->findAll();
        
        
        $data = [];
        
        foreach ($courses as $course) {

            $lessons = $course->getLessons();
            $arrLesson = [];
            foreach($lessons as $lesson)
            {
                $arrLesson[] =[
                    'id' => $lesson->getId(),
                    'title' => $lesson->getTitle(),
                    'name' => $lesson->getName(),
                    'link_lesson' => $lesson->getLinklesson(),
                ];
            }
            

           $data[] = [
               'id' => $course->getId(),
               'title' => $course->getTitle(),
               'name' => $course->getName(),
               'imgPath' => $course->getImgpath(),
               'lessons' => $arrLesson
           ];
        }

        return $this->json($data);
    }

    #[Route('/course/all', name: 'all_course')]
    public function index(ManagerRegistry $doctrine): Response
    {   
   
        $courses = $doctrine
            ->getRepository(Course::class)
            ->findAll();


        return $this->render('course/index.html.twig',['courses'=>$courses]);
    }

    #[Route('/course/{id}', name: 'detail_course')]
    public function detail(ManagerRegistry $doctrine, $id): Response
    {   
   
        $course = $doctrine
            ->getRepository(Course::class)
            ->find($id);
        
        $Lessons= $course->getLessons();

        $listLessons=[];
        
        foreach($Lessons as $lesson)
        {
            
            $listLessons[]=[
                'id'=>$lesson->getId(),
                'name'=>$lesson->getName(),
                'link_lesson'=>$lesson->getLinklesson()
            ];
        }


        return    $this->render('course/detail.html.twig',['course'=>$course,'lessons'=>$listLessons]);
    }

}
