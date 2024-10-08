<?php

namespace App\Entity;

use App\Repository\BurgerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BurgerRepository::class)]
class Burger
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $price = null;

    #[ORM\ManyToOne(targetEntity: Pain::class)]
        private ?Pain $pain = null;

        #[ORM\ManyToMany(targetEntity: Oignon::class)]
        private ?Oignon $oignons;

        #[ORM\ManyToMany(targetEntity: Sauce::class)]
        private ?Sauce $sauces;

        #[ORM\OneToOne(targetEntity: Image::class, cascade: ['persist', 'remove'])]
        private ?Image $image = null;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="burger", orphanRemoval=true, inversedBy="commentaires")
     */
    private $commentaires;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getPain(): ?Pain
    {
        return $this->pain;
    }

    public function setPain(?Pain $pain): static
    {
        $this->pain = $pain;

        return $this;
    }

    public function getOignons(): ?Oignon
    {
        return $this->oignons;
    }


    public function getSauces(): ?Sauce
    {
        return $this->sauces;
    }


    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(?Image $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getCommentaires(): ?Commentaire
    {
        return $this->commentaires;
    }

    public function addOignon(?Oignon $oignon): static
    {
        if (!$this->oignons)
        {
            $this->oignons = array();
        }

        $this->oignons[] = $oignon;

        return $this;
    }

    public function addSauce(?Sauce $sauce): static
    {
        if (!$this->sauces)
        {
            $this->sauces = array();
        }

        $this->sauces[] = $sauce;

        return $this;
    }






}
