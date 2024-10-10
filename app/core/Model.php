<?php

namespace App\Core;

use App\DB\Database;
use ReflectionClass;
use ReflectionProperty;

abstract class Model
{
    protected $db;
    protected $tableName = null;

    public function __construct()
    {
        $this->db = new Database($this->tableName);
    }

    public function loadFromDatabase(int $id): void
    {
        $data = $this->db->find($id);
        if ($data) {
            $reflection = new ReflectionClass($this);

            foreach ($data as $propertyName => $value) {
                $setterName = 'set' . ucfirst($propertyName);
                $setter = $reflection->getMethod($setterName);

                if ($setter->isPublic()) {
                    $setter->invoke($this, $value);
                } else {
                    echo "Ошибка: У свойства $propertyName нет публичного метода-сеттера.\n";
                }
            }
        }
    }

    public function getAll(): ?array
    {
        $data = $this->db->findAll();
        if ($data) {
            $objects = [];
            foreach ($data as $item) {
                $object = new static();

                $reflection = new ReflectionClass($this);

                foreach ($item as $propertyName => $value) {
                    $setterName = 'set' . ucfirst($propertyName);
                    try {
                        $setter = $reflection->getMethod($setterName);
                    } catch (\ReflectionException $exception) {
                        echo $exception->getMessage();
                        http_response_code(500);
                        die;
                    }
                    

                    if ($setter->isPublic()) {
                        $setter->invoke($object, $value);
                    } else {
                        echo "Ошибка: У свойства $propertyName нет публичного метода-сеттера.\n";
                    }
                }

                $objects[] = $object->toArray();
            }
            return $objects;
        }
        return null;
    }

    public function toArray(): array
    {
        $reflection = new ReflectionClass($this);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PRIVATE);

        $array = [];
        foreach ($properties as $property) {
            $propertyName = $property->getName();
            $getterName = 'get' . ucfirst($propertyName);
            $getter = $reflection->getMethod($getterName);

            if ($getter->isPublic()) {
                $array[$propertyName] = $getter->invoke($this);
            }
        }

        return $array;
    }

}