<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Group
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="groups")
 */
class Group
{
    /**
     * @var int|null
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     * @ORM\Id()
     */
    private ?int $id;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="datetime")
     */
    private ?\DateTime $startDate;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="datetime")
     */
    private ?\DateTime $createdAt;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="datetime")
     */
    private ?\DateTime $updatedAt;

    /**
     * @var Course
     * @ORM\ManyToOne(targetEntity="Course", inversedBy="groups")
     */
    private $course;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Lesson", mappedBy="group")
     */
    private Collection $lessons;

    /**
     * @var Collection
     * @ORM\ManyToMany(targetEntity="Student", inversedBy="groups")
     * @ORM\JoinTable(name="groups_students")
     */
    private Collection $students;

    public function __construct()
    {
        $this->lessons = new ArrayCollection();
        $this->students = new ArrayCollection();
    }

    /**
     * @return Collection
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }


    /**
     * @return Collection
     */
    public function getLessons(): Collection
    {
        return $this->lessons;
    }

    /**
     * @return Course
     */
    public function getCourse(): Course
    {
        return $this->course;
    }

    /**
     * @param Course $course
     */
    public function setCourse(Course $course): void
    {
        $this->course = $course;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return \DateTime|null
     */
    public function getStartDate(): ?\DateTime
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime|null $startDate
     */
    public function setStartDate(?\DateTime $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime|null $createdAt
     */
    public function setCreatedAt(?\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime|null $updatedAt
     */
    public function setUpdatedAt(?\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}