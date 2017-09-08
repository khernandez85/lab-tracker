<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Assignment;
use AppBundle\Entity\StudentAssignment;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AssignmentController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function showAction()
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository(Assignment::class);

        $allAssignments = $repository->findAll();

        return $this->render('assignment/home.html.twig', array(
            'title'=> 'Opdrachten',
            'opdrachten' => $allAssignments
        ));
    }

    /**
     * @Route("/assignment/{id}", name="show_assignment")
     */
    public function showAssignmentAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $assignment = $em->getRepository(Assignment::class)->find($id);
        $students = $em->getRepository(StudentAssignment::class)
            ->findBy(array('assignment' => $id));

        return $this->render('assignment/showAssignment.html.twig', array(
            'assignment'=> $assignment,
            'students' => $students
        ));
    }
}