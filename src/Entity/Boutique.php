<?php

namespace App\Entity;

use App\Entity\Traits\Timestampable;
use App\Repository\BoutiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Serializable;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: BoutiqueRepository::class)]
#[ORM\HasLifecycleCallbacks]
/**
 * @Vich\Uploadable
 */
class Boutique implements Serializable
{ 
    use Timestampable;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 150)]
    #[Assert\NotBlank(message: 'Vous devez remplir ce champ')]
    #[Assert\Length(min: 3, minMessage: "minimum 3 caractères")] 
    private $title;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Assert\Length(min: 10, minMessage: "minimum 3 caractères")] 
    private $description;

    #[ORM\Column(type: 'string', length: 150)]
    #[Assert\NotBlank(message: 'Vous devez remplir ce champ')]
    #[Assert\Length(exactly: 14, exactMessage: "Le SIRET doit faire 14 charactères")] 
    private $SIRET;

    #[ORM\Column(type: 'string', length: 150)]
    #[Assert\NotBlank(message: 'Vous devez remplir ce champ')]
    #[Assert\Length(min: 5, minMessage: "minimum 5 caractères")] 
    private $adresse;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank(message: 'Vous devez remplir ce champ')]
    #[Assert\Length(exactly: 5, exactMessage: 'Le code postal doit avoir 5 chiffres')] 
    private $code_postal;

    #[ORM\Column(type: 'string', length: 150)]
    #[Assert\NotBlank(message: 'Vous devez remplir ce champ')]
    #[Assert\Length(min: 3, minMessage: "minimum 3 caractères")]  
    private $ville;

    #[ORM\Column(type: 'string', length: 150, nullable: true)]
    #[Assert\Length(min: 10, minMessage: "minimum 10 caractères")] 
    private $tel;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="boutique_image", fileNameProperty="image")
     * @Assert\Image(maxSize="2M")
     * @Assert\NotNull(message="il faut choisir une image")
     * 
     * @var File|null
     */
    private  $imageFileBoutique;

    #[ORM\Column(type: 'string', length: 255)]    
    private $image;

     /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="logo_image", fileNameProperty="logo")
     * @Assert\Image(maxSize="2M")
     * @Assert\NotNull(message="il faut choisir une image")
     *
     * @var File|null
     */    
    private $imageFileLogo;

    #[ORM\Column(type: 'string', length: 255)]    
    private $logo;

    #[ORM\Column(type: 'boolean')]
    private $is_siret_verified = true;

    #[ORM\Column(type: 'boolean')]
    private $is_active = false;

    #[ORM\OneToOne(inversedBy: 'boutique', targetEntity: User::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\OneToMany(mappedBy: 'boutique', targetEntity: Produits::class, orphanRemoval: true)]
    private $produits;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }


  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
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

    public function getSIRET(): ?string
    {
        return $this->SIRET;
    }

    public function setSIRET(?string $SIRET): self
    {
        $this->SIRET = $SIRET;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->code_postal;
    }

    public function setCodePostal(?int $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    /**     
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFileBoutique
     */
    public function setImageFileBoutique(?File $imageFileBoutique = null): void
    {
        $this->imageFileBoutique = $imageFileBoutique;

        if (null !== $imageFileBoutique) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->setModifiedAt(new \DateTimeImmutable);
        }
    }

    public function getImageFileBoutique(): ?File
    {
        return $this->imageFileBoutique;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**     
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFileLogo
     */
    public function setImageFileLogo(?File $imageFileLogo = null): void
    {
        $this->imageFileLogo = $imageFileLogo;

        if (null !== $imageFileLogo) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->setModifiedAt(new \DateTimeImmutable);
        }
    }

    public function getImageFileLogo(): ?File
    {
        return $this->imageFileLogo;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function isIsSiretVerified(): ?bool
    {
        return $this->is_siret_verified;
    }

    public function setIsSiretVerified(?bool $is_siret_verified): self
    {
        $this->is_siret_verified = $is_siret_verified;

        return $this;
    }

    public function isIsActive(): ?bool
    {
        return $this->is_active;
    }

    public function setIsActive(?bool $is_active): self
    {
        $this->is_active = $is_active;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }  

    public function serialize()
    {
        $this->image = base64_encode($this->image);
        $this->logo = base64_encode($this->logo);
    }

    public function unserialize($serialized)
    {
        $this->image = base64_decode($this->image);
        $this->logo = base64_decode($this->logo);

    }

    /**
     * @return Collection<int, produits>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(produits $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setBoutique($this);
        }

        return $this;
    }

    public function removeProduit(produits $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getBoutique() === $this) {
                $produit->setBoutique(null);
            }
        }

        return $this;
    } 
}
