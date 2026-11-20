const navToggle = document.querySelector('[data-nav-toggle]');
const navMenu = document.querySelector('[data-nav-menu]');
const navHeader = document.querySelector('[data-nav-header]');

const setNavOpen = (isOpen) => {
    if (!navToggle || !navMenu) {
        return;
    }

    navToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    navMenu.classList.toggle('hidden', !isOpen);
    navMenu.classList.toggle('block', isOpen);
};

navToggle?.addEventListener('click', () => {
    setNavOpen(navToggle.getAttribute('aria-expanded') !== 'true');
});

document.addEventListener('click', (event) => {
    if (
        navToggle?.getAttribute('aria-expanded') === 'true' &&
        navHeader &&
        !navHeader.contains(event.target)
    ) {
        setNavOpen(false);
    }
});

document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
        setNavOpen(false);
    }
});

window.addEventListener('resize', () => {
    if (window.matchMedia('(min-width: 768px)').matches) {
        setNavOpen(false);
    }
});

navMenu?.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => setNavOpen(false));
});
