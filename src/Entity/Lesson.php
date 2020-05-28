<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * Class Lesson
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="lessons")
 */
class Lesson
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
     * @ORM\Column(type="datetime")
     */
    private ?\DateTime $createdAt;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="datetime")
     */
    private ?\DateTime $updatedAt;

    /**
     * @var Group
     * @ORM\ManyToOne(targetEntity="Group", inversedBy="lessons")
     */
    private ?Group $group;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Hometask", mappedBy="lesson" )
     */
    private Collection $hometasks;


    public function __construct()
    {
        $this->hometasks = new ArrayCollection();
    }

    /**
     * @return Collection
     */
    public function getHometasks(): Collection
    {
        return $this->hometasks;
    }



    /**
     * @return Group
     */
    public function getGroup(): ?Group
    {
        return $this->group;
    }

    /**
     * @param Group $group
     */
    public function setGroup(?Group $group): void
    {
        $this->group = $group;
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


}