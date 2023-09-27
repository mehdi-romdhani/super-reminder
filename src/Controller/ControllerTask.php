<?php


namespace App\Controller; // namespace

use App\Model\Task;


class ControllerTask
{


public function controllerAddTask(array $array){

    $task = htmlspecialchars(trim($array['task']));
    $id = $_SESSION['id'];
    $newTask = new Task();

    $mess = [];

    $dataTask = [
        'task' => $task,
    ];

    if(empty($task)){
        $mess['emptyTask'] = "Veuillez remplir le champ";
    }else{
        $newTask->addTask($dataTask, $id);
        $mess['validTask'] = 'Votre tâche a bien été ajoutée';
    }

    echo json_encode($mess);
}



    





}
