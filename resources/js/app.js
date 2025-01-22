import '../css/app.css';
import './bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import UsuarioService from './services/usuario-service.js';

document.addEventListener('DOMContentLoaded', () => {
    const usuarioCreateSevice = new UsuarioService();
    usuarioCreateSevice.handleCreate();

    const usuarioUpdateSevice = new UsuarioService();
    usuarioUpdateSevice.handleUpdate();
});