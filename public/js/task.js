document.addEventListener("DOMContentLoaded", () => {

//All Variables
  const taskForm = document.querySelector("#task-form");
  const messTask = document.querySelector("#messTask");
  const taskList = document.querySelector("#task_list");

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

//All Event
  taskForm.addEventListener("submit", (e) => {
    e.preventDefault();
    addTask();
  });

  
});
