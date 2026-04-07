const LG = '(min-width: 1024px)';

/**
 * Responsive admin sidebar: drawer on small screens, persistent from lg up.
 */
export function initAdminShell() {
    const root = document.getElementById('admin-shell');
    if (!root) {
        return;
    }

    const sidebar = root.querySelector('[data-admin-sidebar]');
    const backdrop = root.querySelector('[data-admin-sidebar-backdrop]');
    const openBtn = root.querySelector('[data-admin-sidebar-open]');
    const closeTriggers = root.querySelectorAll('[data-admin-sidebar-close]');

    if (!sidebar || !backdrop) {
        return;
    }

    const media = window.matchMedia(LG);
    let mobileOpen = false;

    function setMenuButtonExpanded(open) {
        openBtn?.setAttribute('aria-expanded', open ? 'true' : 'false');
    }

    function sync() {
        if (media.matches) {
            sidebar.classList.remove('-translate-x-full');
            backdrop.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
            mobileOpen = false;
            setMenuButtonExpanded(false);
            return;
        }

        if (mobileOpen) {
            sidebar.classList.remove('-translate-x-full');
            backdrop.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
            setMenuButtonExpanded(true);
        } else {
            sidebar.classList.add('-translate-x-full');
            backdrop.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
            setMenuButtonExpanded(false);
        }
    }

    function openMobile() {
        if (media.matches) {
            return;
        }
        mobileOpen = true;
        sync();
    }

    function closeMobile() {
        mobileOpen = false;
        sync();
    }

    openBtn?.addEventListener('click', () => {
        if (media.matches) {
            return;
        }
        mobileOpen = !mobileOpen;
        sync();
    });

    closeTriggers.forEach((el) => {
        el.addEventListener('click', closeMobile);
    });

    backdrop.addEventListener('click', closeMobile);

    media.addEventListener('change', () => {
        mobileOpen = false;
        sync();
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && mobileOpen && !media.matches) {
            closeMobile();
        }
    });

    sync();
}
