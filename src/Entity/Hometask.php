<?php


namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Hometask
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="hometasks")
 */

class Hometask
{
    /**
     * @var int|null
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     * @ORM\Id()
     */
    private ?int $id;

    /**
     * @var string|null
     * @ORM\Column(type="string")
     */
    private ?string $title;

    /**
     * @var string|null
     * @ORM\Column(type="string")
     */
    private ?string $description;

    /**
     * @var \DateTime|null
     *@ORM\Column(type="date")
     */
    private ?\DateTime $createdAt;

    /**
     * @var \DateTime|null
     *@ORM\Column(type="datetime")
     */
    private ?\DateTime $updatedAt;

    /**
     * @var Lesson
     * @ORM\ManyToOne(targetEntity="Lesson", inversedBy="hometasks")
     */
    private ?Lesson $lesson;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Homework", mappedBy="hometask")
     */
    private Collection $homeworks;


    public function __construct()
    {
        $this->homeworks = new ArrayCollection();
    }

    /**
     * @return Collection
     */
    public function getHomeworks(): Collection
    {
        return $this->homeworks;
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
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
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
     * @return Lesson
     */
    public function getLesson(): ?Lesson
    {
        return $this->lesson;
    }

    /**
     * @param Lesson $lesson
     */
    public function setLesson(Lesson $lesson): void
    {
        $this->lesson = $lesson;
    }

}