<?php

namespace App\Controller;

use App\Entity\Student;
use App\Repository\StudentRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    #[Route('/student', name: 'app_student')]
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }
    #[Route('/show/{name}', name:'student_show')]
    public function show($name): Response{


        $students = [
            ['fname'=>'ahmed',"lname" =>'Mechregui'],
            ['fname'=>'Amir',"lname"=>'ben jmeaa'],
        ];
        return $this->render(
            'student/show.html.twig',
            [
                'List'=> $students,
                'name'=>$name,
            ]
        );
    }
    #[Route('/showStudents', name: 'student_shows')]
    public function showStudent(StudentRepository $em): Response
    {
        //$students = $em->getRepository(Student::class)->findAll();
        $students = $em->findAll();
        return $this->render(
            'student/showStudents.html.twig', [
                'students' => $students
            ]
        );
    }
    #[Route('/student/{id}', name:'detail_Student')]
    public function getSudents(StudentRepository $repo, $id):Response {
        $student = $repo->find($id);
        return $this ->render(
            'student/getStudent.html.twig',
            [
                'student' => $student
            ]
        );
    }
}
