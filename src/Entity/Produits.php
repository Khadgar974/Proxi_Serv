<?php

namespace App\Entity;

use App\Repository\ProduitsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\Timestampable;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Serializable;

#[ORM\Entity(repositoryClass: ProduitsRepository::class)]
#[ORM\HasLifecycleCallbacks]
/**
 * @Vich\Uploadable
 */
class Produits implements Serializable
{
    use Timestampable;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 150)]
    private $title;

    #[ORM\Column(type: 'text', nullable: true)]
    private $description;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="produit_image", fileNameProperty="image")
     * 
     * @var File|null
     */
    private  $imageFileProduit;
    #[ORM\Column(type: 'string', length: 255)]
    private $image;

    #[ORM\Column(type: 'integer')]
    private $prix;

    #[ORM\Column(type: 'integer')]
    private $quantite;

    #[ORM\Column(type: 'string', length: 40, nullable: true)]
    private $reference;

    #[ORM\Column(type: 'boolean')]
    private $bon_plan;

    #[ORM\Column(type: 'datetime_immutable')]
    private $created_at;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $modified_at;

    #[ORM\ManyToMany(targetEntity: Boutique::class, inversedBy: 'produits')]
    private $boutique;

    public function __construct()
    {
        $this->boutique = new ArrayCollection();
    }

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

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**     
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFileBoutique
     */
    public function setImageFileProduit(?File $imageFileProduit = null): void
    {
        $this->imageFileProduit = $imageFileProduit;

        if (null !== $imageFileProduit) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->setModifiedAt(new \DateTimeImmutable);
        }
    }

    public function getImageFileProduit(): ?File
    {
        return $this->imageFileProduit;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function isBonPlan(): ?bool
    {
        return $this->bon_plan;
    }

    public function setBonPlan(bool $bon_plan): self
    {
        $this->bon_plan = $bon_plan;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getModifiedAt(): ?\DateTimeImmutable
    {
        return $this->modified_at;
    }

    public function setModifiedAt(?\DateTimeImmutable $modified_at): self
    {
        $this->modified_at = $modified_at;

        return $this;
    }

    /**
     * @return Collection<int, Boutique>
     */
    public function getBoutique(): Collection
    {
        return $this->boutique;
    }

    public function addBoutique(Boutique $boutique): self
    {
        if (!$this->boutique->contains($boutique)) {
            $this->boutique[] = $boutique;
        }

        return $this;
    }

    public function removeBoutique(Boutique $boutique): self
    {
        $this->boutique->removeElement($boutique);

        return $this;
    }

    public function serialize()
    {
        $this->image = base64_encode($this->image);
        
    }

    public function unserialize($serialized)
    {
        $this->image = base64_decode($this->image);
        
    }
}
