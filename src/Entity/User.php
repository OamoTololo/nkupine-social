<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=11)
     */
    private $contactInfo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $contributionTotal = 0.00;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $loanOutstanding = 0.00;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isExecutive = false;

    /**
     * @ORM\OneToMany(targetEntity=Contribution::class, mappedBy="user")
     */
    private $contributionBalance;

    /**
     * @ORM\OneToMany(targetEntity=Loan::class, mappedBy="user")
     */
    private $loanBalance;

    public function __construct()
    {
        $this->contributionBalance = new ArrayCollection();
        $this->loanBalance = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
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

    public function getContactInfo(): ?string
    {
        return $this->contactInfo;
    }

    public function setContactInfo(?string $contactInfo): self
    {
        $this->contactInfo = $contactInfo;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getContributionTotal(): ?float
    {
        return $this->contributionTotal;
    }

    public function setContributionTotal(float $contributionTotal): self
    {
        $this->contributionTotal = $contributionTotal;

        return $this;
    }

    public function getLoanOutstanding(): ?float
    {
        return $this->loanOutstanding;
    }

    public function setLoanOutstanding(float $loanOutstanding): self
    {
        $this->loanOutstanding = $loanOutstanding;

        return $this;
    }

    public function getIsExecutive(): ?bool
    {
        return $this->isExecutive;
    }

    public function setIsExecutive(bool $isExecutive): self
    {
        $this->isExecutive = $isExecutive;

        return $this;
    }

    /**
     * @return Collection|Contribution[]
     */
    public function getContributionBalance(): Collection
    {
        return $this->contributionBalance;
    }

    public function addContribution(Contribution $contributionBalance): self
    {
        if (!$this->contributionsBalance->contains($contributionBalance)) {
            $this->contributionsBalance[] = $contributionBalance;
            $contributionBalance->setMember($this);
        }

        return $this;
    }

    public function removeContribution(Contribution $contributionBalance): self
    {
        if ($this->contributionBalance->removeElement($contributionBalance)) {
            // set the owning side to null (unless already changed)
            if ($contributionBalance->getMember() === $this) {
                $contributionBalance->setMember(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Loan[]
     */
    public function getLoans(): Collection
    {
        return $this->loanBalance;
    }

    public function addLoan(Loan $loanBalance): self
    {
        if (!$this->loanBalance->contains($loanBalance)) {
            $this->loanBalance[] = $loanBalance;
            $loanBalance->setMember($this);
        }

        return $this;
    }

    public function removeLoan(Loan $loanBalance): self
    {
        if ($this->loanBalance->removeElement($loanBalance)) {
            // set the owning side to null (unless already changed)
            if ($loanBalance->getMember() === $this) {
                $loanBalance->setMember(null);
            }
        }

        return $this;
    }
}
