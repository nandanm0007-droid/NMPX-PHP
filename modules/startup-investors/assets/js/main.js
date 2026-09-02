document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.querySelector('.nav-toggle');
    const links = document.querySelector('.nav-links');
    if (toggle) toggle.addEventListener('click', () => links.classList.toggle('show'));

    const roleRadios = document.querySelectorAll('input[name="role"]');
    const startupFields = document.getElementById('startupFields');
    const investorFields = document.getElementById('investorFields');
    if (roleRadios.length) {
        roleRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                document.querySelectorAll('.role-toggle label').forEach(l => l.classList.remove('active'));
                this.closest('label').classList.add('active');
                if (this.value === 'startup') {
                    startupFields.classList.remove('hidden');
                    investorFields.classList.add('hidden');
                } else {
                    investorFields.classList.remove('hidden');
                    startupFields.classList.add('hidden');
                }
            });
        });
    }

    document.querySelectorAll('.confirm-action').forEach(el => {
        el.addEventListener('submit', function (e) {
            if (!confirm(this.dataset.confirm || 'Are you sure?')) e.preventDefault();
        });
    });

    document.querySelectorAll('.file-input').forEach(input => {
        input.addEventListener('change', function () {
            const label = document.querySelector(`[data-file-label="${this.id}"]`);
            if (label && this.files.length) label.textContent = this.files[0].name;
        });
    });

    document.querySelectorAll('.auto-filter select').forEach(sel => {
        sel.addEventListener('change', () => sel.closest('form').submit());
    });
});