<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $updated_at = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Team $firstTeam = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Team $secondTeam = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Team $winner = null;

    #[ORM\Column(length: 5, nullable: true)]
    private ?string $score = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $winningReason = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getFirstTeam(): ?Team
    {
        return $this->firstTeam;
    }

    public function setFirstTeam(Team $firstTeam): static
    {
        $this->firstTeam = $firstTeam;

        return $this;
    }

    public function getSecondTeam(): ?Team
    {
        return $this->secondTeam;
    }

    public function setSecondTeam(Team $secondTeam): static
    {
        $this->secondTeam = $secondTeam;

        return $this;
    }

    public function getWinner(): ?Team
    {
        return $this->winner;
    }

    public function setWinner(?Team $winner): static
    {
        $this->winner = $winner;

        return $this;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(?string $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function getWinningReason(): ?string
    {
        return $this->winningReason;
    }

    public function setWinningReason(?string $winningReason): static
    {
        $this->winningReason = $winningReason;

        return $this;
    }
}
