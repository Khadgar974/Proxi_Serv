<?php
namespace App\Entity\Traits;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;

trait Timestampable
{
#[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private $created_at;

    #[ORM\Column(type: 'datetime_immutable',  nullable: true)]
    private $modified_at;

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

    public function setModifiedAt(\DateTimeImmutable $modified_at): self
    {
        $this->modified_at = $modified_at;

        return $this;
    }

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function updateTimestamps() 
    {
        if ($this->getCreatedAt() !== null){
            $this->setModifiedAt(new DateTimeImmutable);
        } else {
            $this->setCreatedAt(new DateTimeImmutable);
        }
    }
    
}