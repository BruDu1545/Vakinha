async function fetchAjax(path, formData) {
    try {
        const resp = await fetch(path, {
            method: "POST",
            body: formData
        });
        const data = await resp.json();

        if (data.success) {
            console.log(data.message);
            return true;
        } else {
            console.log(data.message);
            return false;
        }
    } catch (e) {
        alert(e);
        return false;
    }
}

let btn_login = document.querySelector('#btn_login');

if (btn_login) {
    btn_login.addEventListener('click', async (e) => {
        e.preventDefault();

        let formData = new FormData();
        formData.append('action', 'get');
        formData.append('login', document.querySelector('#user').value);
        formData.append('password', document.querySelector('#password').value);

        const success = await fetchAjax("config/login.php", formData);
        if (success) {
            window.location.href = 'home';
        }
    });
}
let btn_logout = document.querySelector('#btn_logout');

if (btn_logout) {
    btn_logout.addEventListener('click', async (e) => {
        e.preventDefault();

        let formData = new FormData();

        const success = await fetchAjax("config/logout.php", formData);
        if (success) {
            window.location.reload()
        }
    });
}

let frm_register = document.querySelector('#frm-register');

if (frm_register) {
    frm_register.addEventListener('submit', async (e) => {
        e.preventDefault();

        let formData = new FormData(frm_register);

        const success = await fetchAjax("config/register.php", formData);
        if (success) {
            window.location.href = "login"
        }
    });
}

let frm_vaquinha = document.querySelector('#frm_vaquinha');

if (frm_vaquinha) {
    frm_vaquinha.addEventListener('submit', async (e) => {
        e.preventDefault();

        let formData = new FormData(frm_vaquinha);

        const success = await fetchAjax("config/created_vaquina.php", formData);
        if (success) {
            window.location.href = "home"
        }
    });
}

const dialog = document.getElementById('dialogDoacao');
const campanhaIdInput = document.getElementById('campanhaId');
const valorInput = document.getElementById('valorDoacao');
const confirmarBtn = document.getElementById('confirmarDoacao');
const cancelarBtn = document.getElementById('cancelarDoacao');

if (document.querySelectorAll('.card button')) {
    document.querySelectorAll('.card button').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            campanhaIdInput.value = id;
            valorInput.value = '';
            dialog.showModal();
        });
    });
}

if (confirmarBtn) {
    cancelarBtn.addEventListener('click', () => {
        dialog.close();
    });
}

if (confirmarBtn) {
    confirmarBtn.addEventListener('click', async (e) => {
        e.preventDefault();

        const valor = valorInput.value;
        const campanhaId = campanhaIdInput.value;

        if (valor && campanhaId) {
            const formData = new FormData();
            formData.append('action', 'doar');
            formData.append('campanha_id', campanhaId);
            formData.append('valor', valor);

            const success = await fetchAjax("config/doar.php", formData);
            if (success) {
                alert(`Doação de R$ ${valor} registrada com sucesso!`);
                dialog.close();
                window.location.reload();
            }
        } else {
            alert('Preencha o valor da doação.');
        }
    });
}