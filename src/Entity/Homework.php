<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Homework
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="homeworks")
 */
class Homework
{
    /**
     * @var int|null
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @ORM\Id()
     */
    private ?int $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private ?string $mark;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private ?string $answerLink;

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
     * @var Hometask
     * @ORM\ManyToOne(targetEntity="Hometask", inversedBy="homeworks")
     */
    private ?Hometask $hometask;

    /**
     * @var Student
     * @ORM\ManyToOne(targetEntity="Student", inversedBy="homeworks")
     */
    private ?Student $student;



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
     * @return string
     */
    public function getMark(): string
    {
        return $this->mark;
    }

    /**
     * @param string $mark
     */
    public function setMark(string $mark): void
    {
        $this->mark = $mark;
    }

    /**
     * @return string
     */
    public function getAnswerLink(): string
    {
        return $this->answerLink;
    }

    /**
     * @param string $answerLink
     */
    public function setAnswerLink(string $answerLink): void
    {
        $this->answerLink = $answerLink;
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

    /**
     * @return Hometask
     */
    public function getHometask(): ?Hometask
    {
        return $this->hometask;
    }

    /**
     * @param Hometask $hometask
     */
    public function setHometask(?Hometask $hometask): void
    {
        $this->hometask = $hometask;
    }

    /**
     * @return Student
     */
    public function getStudent(): ?Student
    {
        return $this->student;
    }

    /**
     * @param Student $student
     */
    public function setStudent(?Student $student): void
    {
        $this->student = $student;
    }

}