document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const status = document.getElementById('formStatus');
    const btn = this.querySelector('button[type="submit"]');
    
    // Simple validation feedback
    const firstname = document.getElementById('firstname').value;
    const lastname = document.getElementById('lastname').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    if (!firstname || !lastname || !email || !message) {
        status.innerHTML = '<span class="text-danger">Veuillez remplir tous les champs obligatoires.</span>';
        return;
    }

    // Visual feedback for sending
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Envoi en cours...';
    
    // Simulate API call
    setTimeout(() => {
        btn.innerHTML = 'Envoyé !';
        btn.style.backgroundColor = 'var(--success)';
        status.innerHTML = '<span class="text-success">Merci ' + firstname + ', votre message a bien été envoyé !</span>';
        
        // Reset form
        this.reset();
        
        setTimeout(() => {
            btn.disabled = false;
            btn.innerHTML = 'Envoyer le message';
            btn.style.backgroundColor = '';
            status.innerHTML = '';
        }, 3000);
    }, 1500);
});
