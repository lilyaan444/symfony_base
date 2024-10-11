<?php

namespace App\Entity;

use App\Repository\BurgerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

            /**
     * @ORM\ManyToMany(targetEntity=Oignon::class, inversedBy="burgers")
     */
    private Collection $oignons;

         /**
     * @ORM\ManyToMany(targetEntity=Sauce::class, inversedBy="burgers")

*/
    private Collection $sauces;



        #[ORM\ManyToOne(targetEntity: Image::class)]
        private ?Image $image = null;


    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="burger", orphanRemoval=true, inversedBy="commentaires")
     */
    private $commentaires;

    public function __construct()
    {
        $this->oignons = new ArrayCollection();
        $this->sauces = new ArrayCollection();


    }


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

    /*
    @return Collection<int, Sauce>
     */
    public function getSauces(): Collection
    {
        return $this->sauces;
    }
    public function addSauce(Sauce $sauce): self
    {
        if (!$this->sauces->contains($sauce)) {
            $this->sauces->add($sauce);
        }
        return $this;
    }
    public function removeSauce(Sauce $sauce): self // Add this method
    {
        $this->sauces->removeElement($sauce);
        return $this;
    }

     /**
     * @return Collection<int, Oignon>
     */
    public function getOignons(): Collection
    {
        return $this->oignons;
    }
    public function addOignon(Oignon $oignon): self
    {
        if (!$this->oignons->contains($oignon)) {
            $this->oignons->add($oignon);
        }
        return $this;
    }
    public function removeOignon(Oignon $oignon): self
    {
        $this->oignons->removeElement($oignon);
        return $this;
    }
}
