import './bootstrap';

window.previewImage = function(event) {
    const preview = document.getElementById('preview');
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
    };

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.style.display = 'none';
    }
};

window.togglePasswordVisibility = function(id) {
    const passwordInput = document.getElementById(id);
    const icon = passwordInput.nextElementSibling.querySelector('i');

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = "password";
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
};

window.copyToClipboard = function(url) {
    const textarea = document.createElement('textarea');
    textarea.value = url;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy');
    document.body.removeChild(textarea);

    alert('Ссылка скопирована в буфер обмена!');
};

window.toggleTasksVisibility = function(todoListId) {
    const tasksList = document.getElementById('tasks-list-' + todoListId);
    const toggleButton = document.querySelector(`[data-todolist-id="${todoListId}"]`);
    
    if (tasksList.classList.contains('hidden')) {
        tasksList.classList.remove('hidden');
        toggleButton.textContent = 'Скрыть задачи';
    } else {
        tasksList.classList.add('hidden');
        toggleButton.textContent = 'Показать задачи';
    }
};

window.copyAllLinks = function(url) {
    window.copyToClipboard(url);
};

window.filterTodoList = function(filterValue) {
    var todoItems = document.querySelectorAll('.todo-item'); 

    todoItems.forEach(function(item) {
        if (filterValue === 'all' || item.classList.contains(filterValue)) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
}

window.updateCharCount = function(textareaId, countElementId, maxLength) {
    const textarea = document.getElementById(textareaId);
    const charCountElement = document.getElementById(countElementId);

    if (textarea) {
        textarea.addEventListener('input', function() {
            const charCount = this.value.length;
            charCountElement.textContent = `${charCount} / ${maxLength}`;
        });
    }
};


