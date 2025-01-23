<?php

namespace App\Entity;

use App\Repository\MemberRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MemberRepository::class)
 * @ORM\Table(name="`member`")
 */
class Member
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
     * @ORM\Column(type="string", length=11, nullable=true)
     */
    private $contactInfo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, options={"default": 0})
     */
    private $contributionTotal = 0.00;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, options={"default": 0})
     */
    private $loanOutstanding = 0.00;

    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private $isExecutive = false;

    /**
     * @ORM\OneToMany(targetEntity=Contribution::class, mappedBy="memmberName")
     */
    private $contributionBalance = 0.00;

    /**
     * @ORM\OneToMany(targetEntity=Loan::class, mappedBy="memberName")
     */
    private $loanBalance = 0.00;

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

    public function setContactInfo(string $contactInfo): self
    {
        $this->contactInfo = $contactInfo;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
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

    public function getLoanBalance(): ?float
    {
        return $this->loanBalance;
    }

    public function setLoanBalance(float $loanBalance): self
    {
        $this->loanBalance = $loanBalance;

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

    public function getContributionBalance(): ?float
    {
        return $this->contributionBalance;
    }

    public function setContributionBalance(float $contributionBalance): self
    {
        $this->contributionBalance = $contributionBalance;

        return $this;
    }


}
