class UsuarioDao {
    constructor(formId, routeIndex) {
        this.form = document.getElementById(formId);
        this.routeIndex = routeIndex
    }

    handleCreate() {
        this.form.addEventListener('submit', this.doHandleCreate.bind(this));
    }

    doHandleCreate(event) {
        event.preventDefault();
        let formData = new FormData(this.form);
        this.create(formData);
    }

    create(formData) {
        fetch(this.form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': formData.get('_token'),
                'X-Requested-With': 'XMLHttpRequest',
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => this.handleResponse(data))
        .catch(error => this.handleError(error));
    }

    handleUpdate() {
        this.form.addEventListener('submit', this.doHandleUpdate.bind(this));
    }

    doHandleUpdate(event) {
        event.preventDefault();
        
        const formData = new FormData(this.form);

        this.update(formData);
    }

    update(formData) {
        const jsonData = Object.fromEntries(formData.entries());
        fetch(this.form.action, {
            method: 'PUT',  
            headers: {
                'X-CSRF-TOKEN': formData.get('_token'),
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            },
            body: JSON.stringify(jsonData)
        })
        .then(response => response.json())
        .then(data => this.handleResponse(data))
        .catch(error => this.handleError(error));
    }

    // Trata a resposta da requisição
    handleResponse(data) {
        if (data.success) {
            alert('Usuário salvo com sucesso');
            window.location.href = this.routeIndex;  // Redireciona após sucesso
        } else {
            alert('Erro ao salvar o usuário: ' + data.message);  // Exibe erro se falhar
        }
    }

    // Trata erros na requisição AJAX
    handleError(error) {
        alert('Erro na requisição: ' + error.message);  // Exibe erro de rede ou outro
    }
}

export default UsuarioDao;