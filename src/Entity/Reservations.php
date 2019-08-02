<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservations
 *
 * @ORM\Table(name="reservations")
 * @ORM\Entity
 */
class Reservations
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
     * @var string
     *
     * @ORM\Column(name="name", type="text", length=65535, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="text", length=65535, nullable=false)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="text", length=65535, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="reserved_seats", type="text", length=65535, nullable=false)
     */
    private $reservedSeats;

    /**
     * @var string
     *
     * @ORM\Column(name="movie_title_pl", type="text", length=65535, nullable=false)
     */
    private $movieTitlePl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="movie_title_original", type="text", length=65535, nullable=true)
     */
    private $movieTitleOriginal;

    /**
     * @var string
     *
     * @ORM\Column(name="reservation_date", type="text", length=65535, nullable=false)
     */
    private $reservationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="reservation_hour", type="text", length=65535, nullable=false)
     */
    private $reservationHour;

    /**
     * @var int
     *
     * @ORM\Column(name="cinema_hall", type="integer", nullable=false)
     */
    private $cinemaHall;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="add_timestamp", type="datetime", nullable=false)
     */
    private $addTimestamp;

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

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

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

    public function getReservedSeats(): ?string
    {
        return $this->reservedSeats;
    }

    public function setReservedSeats(string $reservedSeats): self
    {
        $this->reservedSeats = $reservedSeats;

        return $this;
    }

    public function getMovieTitlePl(): ?string
    {
        return $this->movieTitlePl;
    }

    public function setMovieTitlePl(string $movieTitlePl): self
    {
        $this->movieTitlePl = $movieTitlePl;

        return $this;
    }

    public function getMovieTitleOriginal(): ?string
    {
        return $this->movieTitleOriginal;
    }

    public function setMovieTitleOriginal(?string $movieTitleOriginal): self
    {
        $this->movieTitleOriginal = $movieTitleOriginal;

        return $this;
    }

    public function getReservationDate(): ?string
    {
        return $this->reservationDate;
    }

    public function setReservationDate(string $reservationDate): self
    {
        $this->reservationDate = $reservationDate;

        return $this;
    }

    public function getReservationHour(): ?string
    {
        return $this->reservationHour;
    }

    public function setReservationHour(string $reservationHour): self
    {
        $this->reservationHour = $reservationHour;

        return $this;
    }

    public function getCinemaHall(): ?int
    {
        return $this->cinemaHall;
    }

    public function setCinemaHall(int $cinemaHall): self
    {
        $this->cinemaHall = $cinemaHall;

        return $this;
    }

    public function getAddTimestamp(): ?\DateTimeInterface
    {
        return $this->addTimestamp;
    }

    public function setAddTimestamp(\DateTimeInterface $addTimestamp): self
    {
        $this->addTimestamp = $addTimestamp;

        return $this;
    }


}
