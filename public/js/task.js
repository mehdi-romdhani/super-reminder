document.addEventListener('DOMContentLoaded', ()=>{

const taskForm = document.querySelector('#task-form');
const messTask = document.querySelector('#messTask');
console.log(taskForm);


taskForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    const dataTask = new FormData(taskForm);
    const fetchTaskForm = await fetch("http://localhost/super-reminder/src/View/home_task.php?task",{
        method: 'POST',
        body: dataTask,
    })

    const response = await fetchTaskForm.json()
    console.log(response);
    
    if(response['emptyTask']){
        messTask.textContent = response.emptyTask;
    }else if(response['validTask']){
        messTask.textContent = response.validTask;
    }
    // console.log(response);
})

function displayTask(){
    
    const task = response[i];
    
    const  containerTask = document.querySelector("#task-container");
    
    const tasks = document.createElement('ul');
    
    containerTask.appendChild(tasks)
    
    for (let i=0; i<task; i++){
        const newTask = document.createElement('li');
        newTask.innerText = task[i];
        tasks.appendChild(newTask);

    }
}

const btnAdd = document.querySelector("#submit-task");



})