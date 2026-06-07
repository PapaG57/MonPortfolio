document.getElementById('contactForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const status = document.getElementById('formStatus');
    const btn = this.querySelector('button[type="submit"]');
    const form = this;
    
    const formData = new FormData(form);

    // Visual feedback for sending
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Envoi en cours...';
    
    try {
        const response = await fetch(form.action, {
            method: form.method,
            body: formData,
            headers: {
                'Accept': 'application/json'
            }
        });

        if (response.ok) {
            btn.innerHTML = 'Envoyé !';
            btn.style.backgroundColor = 'var(--success)';
            status.innerHTML = '<span class="text-success">Merci ! Votre message a bien été envoyé.</span>';
            form.reset();
            
            setTimeout(() => {
                btn.disabled = false;
                btn.innerHTML = 'Envoyer le message';
                btn.style.backgroundColor = '';
                status.innerHTML = '';
            }, 5000);
        } else {
            const data = await response.json();
            if (Object.hasOwn(data, 'errors')) {
                status.innerHTML = data["errors"].map(error => error["message"]).join(", ");
            } else {
                status.innerHTML = '<span class="text-danger">Oups ! Un problème est survenu lors de l\'envoi.</span>';
            }
            btn.disabled = false;
            btn.innerHTML = 'Envoyer le message';
        }
    } catch (error) {
        status.innerHTML = '<span class="text-danger">Oups ! Impossible d\'envoyer le message pour le moment.</span>';
        btn.disabled = false;
        btn.innerHTML = 'Envoyer le message';
    }
});
