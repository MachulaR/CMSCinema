<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movies
 *
 * @ORM\Table(name="movies")
 * @ORM\Entity
 */
class Movies
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title_original", type="text", length=65535, nullable=true)
     */
    private $titleOriginal;

    /**
     * @var string
     *
     * @ORM\Column(name="title_pl", type="text", length=65535, nullable=false)
     */
    private $titlePl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="trailer", type="text", length=65535, nullable=true)
     */
    private $trailer;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="text", length=65535, nullable=false)
     */
    private $img;

    /**
     * @var string
     *
     * @ORM\Column(name="info", type="text", length=65535, nullable=false)
     */
    private $info;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="screen_time", type="text", length=65535, nullable=false)
     */
    private $screenTime;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cinema_halls", type="text", length=65535, nullable=true)
     */
    private $cinemaHalls;

    /**
     * @ORM\Column(name="add_timestamp", nullable=false)
     */
    private $addTimestamp;

    /**
     * @ORM\Column(name="edit_timestamp", nullable=true)
     */
    private $editTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitleOriginal(): ?string
    {
        return $this->titleOriginal;
    }

    public function setTitleOriginal(?string $titleOriginal): self
    {
        $this->titleOriginal = $titleOriginal;

        return $this;
    }

    public function getTitlePl(): ?string
    {
        return $this->titlePl;
    }

    public function setTitlePl(string $titlePl): self
    {
        $this->titlePl = $titlePl;

        return $this;
    }

    public function getTrailer(): ?string
    {
        return $this->trailer;
    }

    public function setTrailer(?string $trailer): self
    {
        $this->trailer = $trailer;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(string $info): self
    {
        $this->info = $info;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getScreenTime(): ?string
    {
        return $this->screenTime;
    }

    public function setScreenTime(string $screenTime): self
    {
        $this->screenTime = $screenTime;

        return $this;
    }

    public function getCinemaHalls(): ?string
    {
        return $this->cinemaHalls;
    }

    public function setCinemaHalls(?string $cinemaHalls): self
    {
        $this->cinemaHalls = $cinemaHalls;

        return $this;
    }

    public function getAddTimestamp()
    {
        return $this->addTimestamp;
    }

    public function setAddTimestamp( $addTimestamp): self
    {
        $this->addTimestamp = $addTimestamp;

        return $this;
    }

    public function getEditTimestamp()
    {
        return $this->editTimestamp;
    }

    public function setEditTimestamp( $editTimestamp): self
    {
        $this->editTimestamp = $editTimestamp;

        return $this;
    }


}
