<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StudentAssignment
 *
 * @ORM\Table(name="student_assignment", indexes={@ORM\Index(name="user_idx", columns={"user"}), @ORM\Index(name="assignment_idx", columns={"assignment"}), @ORM\Index(name="status_idx", columns={"status"})})
 * @ORM\Entity
 */
class StudentAssignment
{
    /**
     * @var string
     *
     * @ORM\Column(name="observation", type="string", length=255, nullable=true)
     */
    private $observation;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user", referencedColumnName="id")
     */
    private $user;

    /**
     * @var Assignment
     *
     * @ORM\ManyToOne(targetEntity="Assignment")
     * @ORM\JoinColumn(name="assignment", referencedColumnName="id")
     */
    private $assignment;

    /**
     * @var Status
     *
     * @ORM\ManyToOne(targetEntity="Status")
     * @ORM\JoinColumn(name="status", referencedColumnName="id")
     */
    private $status;


    /**
     * Set user
     *
     * @param User $user
     * @return StudentAssignment
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set assignment
     *
     * @param Assignment $assignment
     * @return StudentAssignment
     */
    public function setAssignment(Assignment $assignment = null)
    {
        $this->assignment = $assignment;

        return $this;
    }

    /**
     * Get recipe
     *
     * @return Assignment
     */
    public function getAssignment()
    {
        return $this->assignment;
    }

    /**
     * @return string
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * @param string $observation
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param Status $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

}

