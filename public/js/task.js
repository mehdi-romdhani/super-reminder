document.addEventListener("DOMContentLoaded", () => {

//All Variables
  const taskForm = document.querySelector("#task-form");
  const messTask = document.querySelector("#messTask");
  const taskList = document.querySelector("#task_list");
  const taskInProgress = document.querySelector("#task-in-progress");
    
  //All Functions
  const addTask = async () => {
    const dataTask = new FormData(taskForm);
    const fetchTaskForm = await fetch("/super-reminder/users?task", {
      method: "POST",
      body: dataTask,
    });

    const response = await fetchTaskForm.json();
    console.log(response);
    
    if (response["emptyTask"]) {
      messTask.textContent = response.emptyTask;
    } else if (response["validTask"]) {
      messTask.textContent = response.validTask;
      messTask.style.color = "green";
    }
  };
  

  const displayTask = async() =>{
      const fetchData = await fetch("/super-reminder/list_task");
      const listTask = await fetchData.json();
      
      // affichage tâches
      
      listTask.forEach((list)=>{
        console.log(list['task_description']);

       // const ul = document.createElement('ul');
        const li = document.createElement('li');
        li.textContent = listTask;
      
      })
      
      
    }
    
//All Event
  taskForm.addEventListener("submit", (e) => {
    e.preventDefault();
    addTask();
    displayTask();

  });



  
});
