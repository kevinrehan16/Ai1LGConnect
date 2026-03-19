// import { UsersComponent } from '../../components/users/user.component.js';
import { LogsComponent } from '../../components/activities/logs/log.components.js';
import { ErrorsComponent } from '../../components/activities/errors/error.component.js';

import { ListsComponent } from '../../components/users/list/list.component.js';
import { RolesComponent } from '../../components/users/roles/role.component.js';
import { PermissionsComponent } from '../../components/users/permissions/permission.component.js';

import { TvserversComponent } from '../../components/setups/tvservers/tvserver.component.js';
import { SiteprofilesComponent } from '../../components/setups/siteprofiles/siteprofile.component.js';

import api from './api.js';


const { createApp } = Vue;

/*! --------------------------
   COMPONENT DEFINITIONS
---------------------------*/

const GraphsComponent = {
    template: `
        <div class="card shadow-sm p-3">
            <h4>Graphs</h4>
            <p>Graph analytics here...</p>
        </div>
        
    `
};

const StatisticsComponent = {
    template: `<div class="card p-3">Statistics Page</div>`
};

const VisualComponent = {
    template: `<div class="card p-3">Visual Page</div>`
};

/* --------------------------
   MAIN APP
---------------------------*/

createApp({

    data() {
        return {
            user: null,
            isCollapsed: false,
            openMenu: 'dashboard', // main menu open
            currentView: 'GraphsComponent',
            activeMain: 'dashboard',
            activeSub: 'graphs',
            floatingMenu: null,   // track floating menu state
            floatingTop: 0, // <-- Y position ng floating menu
        };
    },
    // --- DAGDAG NA SECTION DITO ---
    mounted() {
        // Restore last sidebar state
        const savedState = JSON.parse(localStorage.getItem('sidebarState'));
        if (savedState) {
            this.currentView = savedState.currentView || 'DashboardComponent'; // default view
            this.activeMain = savedState.activeMain || null;
            this.activeSub = savedState.activeSub || this.activeSub;
            this.openMenu = savedState.openMenu || this.openMenu;
        }

        // Makikinig tayo sa click sa buong document
        document.addEventListener('click', this.handleOutsideClick);
    },

    beforeUnmount() {
        // Lilinisin natin ang listener para walang memory leak
        document.removeEventListener('click', this.handleOutsideClick);
    },
    // ------------------------------

    methods: {
        // --- DAGDAG NA METHOD DITO ---
        handleOutsideClick(event) {
            // I-check kung may nakabukas na floating menu
            if (this.floatingMenu) {
                // I-check kung ang cliniclick ay HINDI part ng sidebar
                const sidebar = document.querySelector('.sidebar');
                if (sidebar && !sidebar.contains(event.target)) {
                    this.floatingMenu = null;
                }
            }
        },

        toggleSidebar() {
            this.isCollapsed = !this.isCollapsed;

            // collapse behavior: close submenu
            if (this.isCollapsed) {
              this.openMenu = null;
            } else {
              // restore submenu if previously active
              if (this.activeSub) {
                this.openMenu = this.activeMain;
              }
            }
        },

        toggleMenu(menu, event) {
            // STOP PROPAGATION: Importante ito para hindi agad mag-trigger 
            // ang handleOutsideClick kapag clinick ang menu icon mismo.
            event.stopPropagation();
            
            if (this.isCollapsed) {
                // Toggle floating menu
                this.floatingMenu = (this.floatingMenu === menu) ? null : menu;

                // Get vertical position of the clicked menu item
                this.floatingTop = event.currentTarget.getBoundingClientRect().top;
            } else {
                // Normal expanded menu behavior
                this.openMenu = (this.openMenu === menu) ? null : menu;
                this.floatingMenu = null;
            }
        },

        switchView(component, main, sub = null) {
            this.currentView = component;
            this.activeMain = main;
            this.activeSub = sub;
            this.floatingMenu = null;

            // if sidebar expanded, keep submenu open
            if (!this.isCollapsed && (main === 'dashboard' || main === 'activities' || main === 'users' || main === 'setups')) {
                this.openMenu = main;
            } else {
                this.openMenu = null;
            }

            // Save current state to localStorage
            const sidebarState = {
                currentView: this.currentView,
                activeMain: this.activeMain,
                activeSub: this.activeSub,
                openMenu: this.openMenu
            };
            localStorage.setItem('sidebarState', JSON.stringify(sidebarState));
        },

        isActiveMain(menu) {
            return this.activeMain === menu;
        },

        isActiveSub(sub) {
            return this.activeSub === sub;
        },

        async handleLogout() {
            if (!confirm("Are you sure you want to logout?")) return;
            
            this.loading = true;
            try {
                const response = await api.post('auth/logout');

                // console.log(response);
                if (response.data.status === "success") {
                    // Clear storage kung kailangan
                    localStorage.removeItem('sidebarState');
                    window.location.href = 'views/logout.php';
                }
            } catch (error) {
                console.error("Logout Failed:", error);
            } finally {
                this.loading = false;
            }
        },
    }

})
.component('GraphsComponent', GraphsComponent)
.component('StatisticsComponent', StatisticsComponent)
.component('VisualComponent', VisualComponent)
.component('LogsComponent', LogsComponent)
.component('ErrorsComponent', ErrorsComponent)
.component('ListsComponent', ListsComponent)
.component('RolesComponent', RolesComponent)
.component('PermissionsComponent', PermissionsComponent)
.component('TvserversComponent', TvserversComponent)
.component('SiteprofilesComponent', SiteprofilesComponent)
.mount('#app');
