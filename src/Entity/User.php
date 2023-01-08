<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Mime\Message;
use Symfony\Component\Security\Core\User\UserInterface;

use Symfony\Component\Validator\Constraints as Assert; //Utilisation des contraintes de validation

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[UniqueEntity(
    fields: ['email'],
    message: 'Ce email est déjà utilisé.',
)]

class User implements UserInterface, PasswordAuthenticatedUserInterface // Doit implémenter ce interface pour l'encodage de ses attributs et méthodes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Email] 
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:8, minMessage:'Votre mot de passe doit avoir au minimum 8 caractères')] 
    private ?string $password = null;

    #[Assert\EqualTo(propertyPath: 'password', message:'Mot de passe non identique')] // // Pour s'assurer que password est identique à confirme password
    public $confirm_password; //Un champs qui n'a rien à avoir avec la BD donc n'y sera pas ajouté

    public function getUsername() 
    {
        return $this->getEmail();
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getSalt()
    {
        
    }
    public function getRoles(): array
    {
        return ['ROLE_USER'];
    }
    public function eraseCredentials()
    {
        
    }
}
