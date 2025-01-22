export default class UsuarioService {
    constructor() {
    }

    getFormCreate() {
        return document.getElementById('createUserForm');
    }
    
    handleCreate() {
        if (this.getFormCreate()) {
            this.getFormCreate().addEventListener('submit', this.doHandleCreate.bind(this));
        }
    }

    doHandleCreate(event) {
        event.preventDefault();
        let formData = new FormData(this.getFormCreate());
        this.create(formData);
    }

    create(formData) {
        fetch(this.getFormCreate().action, {
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

    getFormUpdate() {
        return document.getElementById('updateUserForm');
    }

    handleUpdate() {
        if (this.getFormUpdate()) {
            this.getFormUpdate().addEventListener('submit', this.doHandleUpdate.bind(this));
        }
    }

    doHandleUpdate(event) {
        event.preventDefault();
        
        const formData = new FormData(this.getFormUpdate());

        this.update(formData);
    }

    update(formData) {
        const jsonData = Object.fromEntries(formData.entries());
        fetch(this.getFormUpdate().action, {
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
            alertify.alert('Sucesso', 'Usuário salvo com sucesso!', function(){ window.location.href = '/usuarios'; });

        } else {
            alertify.error('Erro ao salvar o usuário: ' + data.message);  // Exibe erro se falhar
        }
    }

    // Trata erros na requisição AJAX
    handleError(error) {
        alertify.error('Erro na requisição: ' + error.message);  // Exibe erro de rede ou outro
    }
}