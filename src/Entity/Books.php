<?php

namespace App\Entity;

use App\Repository\BooksRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: BooksRepository::class)]
class Books
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["getBooks", "getAuthor"])]

    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getBooks", "getAuthor"])]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getBooks", "getAuthor"])]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getBooks", "getAuthor"])]
    private ?string $color = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(["getBooks", "getAuthor"])]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    #[Groups(["getBooks", "getAuthor"])]
    private ?int $quantity = null;

    #[ORM\ManyToOne(inversedBy: 'Books')]
    #[Groups(["getBooks"])]
    private ?Author $author = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(?Author $author): self
    {
        $this->author = $author;

        return $this;
    }
}
