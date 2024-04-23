<?php

namespace App\Entity;

use App\Repository\PlayerTeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerTeamRepository::class)]
class PlayerTeam
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Player>
     */
    #[ORM\OneToMany(targetEntity: Player::class, mappedBy: 'playerTeam')]
    private Collection $id_player;

    #[ORM\ManyToOne(inversedBy: 'playerTeams')]
    private ?Team $id_team = null;

    public function __construct()
    {
        $this->id_player = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Player>
     */
    public function getIdPlayer(): Collection
    {
        return $this->id_player;
    }

    public function addIdPlayer(Player $idPlayer): static
    {
        if (!$this->id_player->contains($idPlayer)) {
            $this->id_player->add($idPlayer);
            $idPlayer->setPlayerTeam($this);
        }

        return $this;
    }

    public function removeIdPlayer(Player $idPlayer): static
    {
        if ($this->id_player->removeElement($idPlayer)) {
            // set the owning side to null (unless already changed)
            if ($idPlayer->getPlayerTeam() === $this) {
                $idPlayer->setPlayerTeam(null);
            }
        }

        return $this;
    }

    public function getIdTeam(): ?Team
    {
        return $this->id_team;
    }

    public function setIdTeam(?Team $id_team): static
    {
        $this->id_team = $id_team;

        return $this;
    }
}
