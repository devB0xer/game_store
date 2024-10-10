<?php

namespace App\Models;

use App\Core\Model;

class GameModel extends Model
{
	protected $tableName = "games";

    private $id;
    private $name;
    private $description;
    private $price;
    private $genre;

	public function __construct(?int $id = null){
		parent::__construct();

		if ($id){
			$this->loadFromDatabase($id);
		}
	}

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): void
    {
        $this->genre = $genre;
    }
}