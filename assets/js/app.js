import { UsersComponent } from '../../components/users/user.component.js';


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

const LogsComponent = {
    template: `<div class="card p-3">Logs Page</div>`
};

const ErrorsComponent = {
    template: `<div class="card p-3">Errors Page</div>`
};

const SetupComponent = {
    template: `<div class="card p-3">System Setup</div>`
};

/* --------------------------
   MAIN APP
---------------------------*/

createApp({

    data() {
        return {
            user: null,
            isCollapsed: false,
            openMenu: null, // main menu open
            currentView: 'GraphsComponent',
            activeMain: 'dashboard',
            activeSub: 'graphs',
            floatingMenu: null,   // track floating menu state
            floatingTop: 0, // <-- Y position ng floating menu
            activeSub: '',
        };
    },
    // --- DAGDAG NA SECTION DITO ---
    mounted() {
        // Restore last sidebar state
        const savedState = JSON.parse(localStorage.getItem('sidebarState'));
        if (savedState) {
            this.currentView = savedState.currentView || 'DashboardComponent'; // default view
            this.activeMain = savedState.activeMain || null;
            this.activeSub = savedState.activeSub || null;
            this.openMenu = savedState.openMenu || null;
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
            if (!this.isCollapsed && (main === 'dashboard' || main === 'activities')) {
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
        }
    }

})
.component('GraphsComponent', GraphsComponent)
.component('StatisticsComponent', StatisticsComponent)
.component('VisualComponent', VisualComponent)
.component('LogsComponent', LogsComponent)
.component('ErrorsComponent', ErrorsComponent)
.component('UsersComponent', UsersComponent)
.component('SetupComponent', SetupComponent)
.mount('#app');
