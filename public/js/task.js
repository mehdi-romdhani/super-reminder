document.addEventListener("DOMContentLoaded", () => {
  // All Variables
  const taskForm = document.querySelector("#task-form");
  const messTask = document.querySelector("#messTask");
  const containerTaskProgress = document.querySelector("#task-in-progress");
  const nameList = "list_task";
  const listeProgress = document.createElement("ul");
  listeProgress.className = nameList;
  containerTaskProgress.appendChild(listeProgress);

  //All Functions
  const addTask = async () => {
    const dataTask = new FormData(taskForm);
    const fetchTaskForm = await fetch("/super-reminder/users?task", {
      method: "POST",
      body: dataTask,
    });

    const response = await fetchTaskForm.json();
    console.log(response);

    if (response.emptyTask) {
      messTask.textContent = response.emptyTask;
    } else if (response.validTask) {
      messTask.textContent = response.validTask;
      messTask.style.color = "green";
      displayTask(); 
    }
  };

  const displayTask = async () => {
    const fetchData = await fetch("/super-reminder/list_task");
    const getData = await fetchData.json();
    listeProgress.innerHTML = ""; 
    getData.forEach((task, index) => {
      const listTask = document.createElement("li");
      const formCheckbox = document.createElement("form");
      formCheckbox.setAttribute("class", "form_task_checkbox");

      const checkbox = document.createElement("input");
      checkbox.setAttribute("type", "checkbox");
      checkbox.name = "checkboxTask";
      checkbox.setAttribute("class", "checkbox_task");

      listTask.setAttribute("id", `task_${index}`);
      listTask.textContent = task.task_description;
      listeProgress.appendChild(listTask);
      listTask.appendChild(formCheckbox);
      formCheckbox.appendChild(checkbox);
    });
  };

  // All Events

  listeProgress.addEventListener("change", (e) => {
    if (e.target.classList.contains("checkbox_task") && e.target.checked) {
      const taskId = e.target.parentElement.parentElement.id;
      console.log("Supprimer la tâche avec l'ID :", taskId);
    }
  });

  taskForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    await addTask();
    taskForm.reset();
  });

  // All CallFunctions
  displayTask();
});
