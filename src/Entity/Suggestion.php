<?php

namespace App\Entity;

use App\Repository\SuggestionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SuggestionRepository::class)
 */
class Suggestion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Club::class)
     */
    private $club;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $booktitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $author;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $publisher;

    /**
     * Suggestion constructor.
     * @param $club
     * @param $booktitle
     * @param $author
     * @param $publisher
     */
    public function __construct($club, $booktitle, $author, $publisher)
    {
        $this->club = $club;
        $this->booktitle = $booktitle;
        $this->author = $author;
        $this->publisher = $publisher;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClub(): ?Club
    {
        return $this->club;
    }

    public function setClub(?Club $club): self
    {
        $this->club = $club;

        return $this;
    }

    public function getBooktitle(): ?string
    {
        return $this->booktitle;
    }

    public function setBooktitle(string $booktitle): self
    {
        $this->booktitle = $booktitle;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getPublisher(): ?string
    {
        return $this->publisher;
    }

    public function setPublisher(string $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function __toString()
    {
        return $this->booktitle;
    }
}
