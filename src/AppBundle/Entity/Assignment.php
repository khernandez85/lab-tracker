<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Assignment
 *
 * @ORM\Table(name="assignment")
 * @ORM\Entity
 */
class Assignment
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="StudentAssignment", mappedBy="assignment")
     */
    private $students;

    /**
     * Assignment constructor.
     */
    public function __construct()
    {
        $this->students = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Collection
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * Add user_recipe_associations
     *
     * @param StudentAssignment $student
     * @return Assignment
     */
    public function addStudent(StudentAssignment $student)
    {
        $this->students[] = $student;

        return $this;
    }
}

