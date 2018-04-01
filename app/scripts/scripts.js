// DOM Elements
newTaskBtn = document.querySelector('.newTaskBtn')
newTask = document.querySelector('.newTask')
closeNewTask = document.querySelector('.closeNewTask')

// Events listeners

// Shows Sign Up popup 
newTaskBtn.addEventListener('click', () =>
{
  newTask.classList.add('show')
})

closeNewTask.addEventListener('click', () =>
{
  newTask.classList.remove('show')
})