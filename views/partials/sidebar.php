<aside :class="['sidebar bg-dark text-white', {collapsed: isCollapsed}]">

    <!-- LOGO -->
    <div class="sidebar-logo text-center py-3 border-bottom">
        <h5 class="mb-1" v-show="!isCollapsed">Ai1 Genesis</h5>
        <i v-show="isCollapsed" class="bi bi-grid"></i>
    </div>

    <div class="sidebar-menu p-2">

        <!-- DASHBOARD -->
        <div>
            <div 
                class="menu-item"
                :class="{'active-main': isActiveMain('dashboard')}"
                @click="toggleMenu('dashboard', $event)"
            >
                <div class="menu-left">
                    <i class="bi bi-speedometer2"></i>
                    <span v-show="!isCollapsed">Dashboard</span>
                </div>
                <i 
                    v-show="!isCollapsed"
                    class="bi bi-chevron-down arrow"
                    :class="{'rotate': openMenu === 'dashboard'}"
                ></i>
            </div>

            <!-- SUBMENU (expanded normally) -->
            <div class="submenu-wrapper" :class="{'submenu-open': openMenu === 'dashboard'}">
                <div class="submenu-item"
                    @click="switchView('GraphsComponent','dashboard','graphs')"
                    :class="{'active-sub': isActiveSub('graphs')}">
                    <i class="bi bi-circle-fill dot"></i> Graphs
                </div>
                <div class="submenu-item"
                    @click="switchView('StatisticsComponent','dashboard','statistics')"
                    :class="{'active-sub': isActiveSub('statistics')}">
                    <i class="bi bi-circle-fill dot"></i> Statistics
                </div>
                <div class="submenu-item"
                    @click="switchView('VisualComponent','dashboard','visual')"
                    :class="{'active-sub': isActiveSub('visual')}">
                    <i class="bi bi-circle-fill dot"></i> Visual
                </div>
            </div>

            <!-- FLOATING SUBMENU (sidebar collapsed) -->
            <div class="floating-submenu" v-if="floatingMenu === 'dashboard' && isCollapsed">
                <div class="submenu-item"
                    @click="switchView('GraphsComponent','dashboard','graphs')"
                    :class="{'active-sub': isActiveSub('graphs')}">
                    <i class="bi bi-circle-fill dot"></i> Graphs
                </div>
                <div class="submenu-item"
                    @click="switchView('StatisticsComponent','dashboard','statistics')"
                    :class="{'active-sub': isActiveSub('statistics')}">
                    <i class="bi bi-circle-fill dot"></i> Statistics
                </div>
                <div class="submenu-item"
                    @click="switchView('VisualComponent','dashboard','visual')"
                    :class="{'active-sub': isActiveSub('visual')}">
                    <i class="bi bi-circle-fill dot"></i> Visual
                </div>
            </div>
        </div>

        <!-- ACTIVITIES -->
        <div class="mt-2">
            <div 
                class="menu-item"
                :class="{'active-main': isActiveMain('activities')}"
                @click="toggleMenu('activities', $event)"
            >
                <div class="menu-left">
                    <i class="bi bi-activity"></i>
                    <span v-show="!isCollapsed">Activities</span>
                </div>
                <i 
                    v-show="!isCollapsed"
                    class="bi bi-chevron-down arrow"
                    :class="{'rotate': openMenu === 'activities'}"
                ></i>
            </div>

            <!-- SUBMENU (expanded normally) -->
            <div class="submenu-wrapper" :class="{'submenu-open': openMenu === 'activities'}">
                <div class="submenu-item"
                    @click="switchView('LogsComponent','activities','logs')"
                    :class="{'active-sub': isActiveSub('logs')}">
                    <i class="bi bi-circle-fill dot"></i> Logs
                </div>
                <div class="submenu-item"
                    @click="switchView('ErrorsComponent','activities','errors')"
                    :class="{'active-sub': isActiveSub('errors')}">
                    <i class="bi bi-circle-fill dot"></i> Errors
                </div>
            </div>

            <!-- FLOATING SUBMENU (sidebar collapsed) -->
            <div class="floating-submenu" v-if="floatingMenu === 'activities' && isCollapsed" :style="{top: floatingTop + 'px'}">
                <div class="submenu-item"
                    @click="switchView('LogsComponent','activities','logs')"
                    :class="{'active-sub': isActiveSub('logs')}">
                    <i class="bi bi-circle-fill dot"></i> Logs
                </div>
                <div class="submenu-item"
                    @click="switchView('ErrorsComponent','activities','errors')"
                    :class="{'active-sub': isActiveSub('errors')}">
                    <i class="bi bi-circle-fill dot"></i> Errors
                </div>
            </div>
        </div>

        <!-- USERS (MAIN MENU DIRECT) -->
        <div 
            class="menu-item"
            :class="{'active-main': isActiveMain('users')}"
            @click="switchView('UsersComponent','users')"
        >
            <div class="menu-left">
                <i class="bi bi-people"></i>
                <span v-show="!isCollapsed">Users</span>
            </div>
        </div>

        <!-- SETUP (MAIN MENU DIRECT) -->
        <div 
            class="menu-item"
            :class="{'active-main': isActiveMain('setup')}"
            @click="switchView('SetupComponent','setup')"
        >
            <div class="menu-left">
                <i class="bi bi-gear"></i>
                <span v-show="!isCollapsed"> Setup</span>
            </div>
        </div>

    </div>

</aside>
