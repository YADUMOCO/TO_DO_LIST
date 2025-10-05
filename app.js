// app.js
document.addEventListener('DOMContentLoaded', () => {
    const addTaskBtn = document.getElementById('a');
    const taskInput = document.getElementById('new-task');
    const taskList = document.getElementById('task-list');

    // Load tasks from localStorage when page loads
    loadTasks();

    // Event listener for adding a task
    addTaskBtn.addEventListener('click', addTask);
    taskList.addEventListener('click', removeTask);

    function addTask() {
        const taskText = taskInput.value.trim();

        if (taskText !== '') {
            const li = document.createElement('li');
            const taskSpan = document.createElement('span');
            taskSpan.textContent = taskText;
            const removeBtn = document.createElement('button');
            removeBtn.textContent = 'Delete';
            
            li.appendChild(taskSpan);
            li.appendChild(removeBtn);
            taskList.appendChild(li);

            storeTask(taskText);  // Save task in localStorage
            taskInput.value = ''; // Clear input
        }
    }

    // Function to remove task
    function removeTask(e) {
        if (e.target.tagName === 'BUTTON') {
            const li = e.target.parentElement;
            taskList.removeChild(li);
            removeTaskFromStorage(li.firstElementChild.textContent); // Remove from localStorage
        }
    }

    // Function to store task in localStorage
    function storeTask(task) {
        let tasks;
        if (localStorage.getItem('tasks') === null) {
            tasks = [];
        } else {
            tasks = JSON.parse(localStorage.getItem('tasks'));
        }
        tasks.push(task);
        localStorage.setItem('tasks', JSON.stringify(tasks));
    }

    // Function to load tasks from localStorage
    function loadTasks() {
        let tasks;
        if (localStorage.getItem('tasks') === null) {
            tasks = [];
        } else {
            tasks = JSON.parse(localStorage.getItem('tasks'));
        }

        tasks.forEach(task => {
            const li = document.createElement('li');
            const taskSpan = document.createElement('span');
            taskSpan.textContent = task;
            const removeBtn = document.createElement('button');
            removeBtn.textContent = 'Delete';
            
            li.appendChild(taskSpan);
            li.appendChild(removeBtn);
            taskList.appendChild(li);
        });
    }

    // Function to remove task from localStorage
    function removeTaskFromStorage(task) {
        let tasks = JSON.parse(localStorage.getItem('tasks'));
        tasks = tasks.filter(t => t !== task);
        localStorage.setItem('tasks', JSON.stringify(tasks));
    }
});