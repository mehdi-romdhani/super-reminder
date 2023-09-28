<?php

namespace App\Model;

use DateTime;

class Task extends ConnectDb

{

    protected ?string $table = "task";

    public ?int $id;
    public ?string $taskDescription;
    public ?DateTime $dateBegin;
    public ?DateTime $dateEnd;
    public ?int $taskDone;
    public ?int $idList;
    public ?int $idUsers;


    // Getter pour $id
    public function getId(): ?int
    {
        return $this->id;
    }

    // Setter pour $id
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    // Ajoutez des getters et des setters similaires pour les autres propriétés
    // Getter et Setter pour $taskDescription
    public function getTaskDescription(): ?string
    {
        return $this->taskDescription;
    }

    public function setTaskDescription(?string $taskDescription): void
    {
        $this->taskDescription = $taskDescription;
    }

    // Getter et Setter pour $dateBegin
    public function getDateBegin(): ?DateTime
    {
        return $this->dateBegin;
    }

    public function setDateBegin(?DateTime $dateBegin): void
    {
        $this->dateBegin = $dateBegin;
    }

    // Getter et Setter pour $dateEnd
    public function getDateEnd(): ?DateTime
    {
        return $this->dateEnd;
    }

    public function setDateEnd(?DateTime $dateEnd): void
    {
        $this->dateEnd = $dateEnd;
    }

    // Getter et Setter pour $taskDone
    public function getTaskDone(): ?int
    {
        return $this->taskDone;
    }

    public function setTaskDone(?int $taskDone): void
    {
        $this->taskDone = $taskDone;
    }

    // Getter et Setter pour $idList
    public function getIdList(): ?int
    {
        return $this->idList;
    }

    public function setIdList(?int $idList): void
    {
        $this->idList = $idList;
    }

    // Getter et Setter pour $idUsers
    public function getIdUsers(): ?int
    {
        return $this->idList;
    }

    public function setIdUsers(?int $idList): void
    {
        $this->idList = $idList;
    }


    public function addTask(?array $task, string $id)
    {


        $req = "INSERT INTO $this->table(task_description, date_begin, date_end, task_done, id_list, id_users) VALUES (:task, NOW(), NULL, :taskdone, NULL, :id_users )";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindParam(':task', $task['task']);
        $stmt->bindParam(':id_users', $id);
        $stmt->bindValue(':taskdone', 0);
        $stmt->execute();
    }


    public function displayTask(int $id)
    {

        if ($id === null) {
            return null;
        }

        $req = "SELECT * FROM task INNER JOIN users ON task.id_users = users.id WHERE id_users = :id";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll($this->pdo::FETCH_ASSOC);

        echo json_encode($result);
    }
}
