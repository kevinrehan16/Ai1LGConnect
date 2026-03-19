<aside :class="['sidebar bg-dark text-white', {collapsed: isCollapsed}]">

    <!-- LOGO -->
    <div class="sidebar-logo border-bottom">
        <h5 class="mb-1" v-show="!isCollapsed">
            <span class="d-flex align-items-center gap-2">
                <img src="assets/images/logo.jpg" loading="lazy" class="img-fluid rounded" /> Connect
            </span>
        </h5>
        <img src="assets/images/logo.jpg" loading="lazy" class="img-fluid rounded" v-show="isCollapsed" style="width:33px; height:33px;" />
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
                    <i :class="isActiveSub('graphs') ? 'bi bi-circle-fill' : 'bi bi-circle'"></i> Graphs
                </div>
                <div class="submenu-item"
                    @click="switchView('StatisticsComponent','dashboard','statistics')"
                    :class="{'active-sub': isActiveSub('statistics')}">
                    <i :class="isActiveSub('statistics') ? 'bi bi-circle-fill' : 'bi bi-circle'"></i> Statistics
                </div>
                <div class="submenu-item"
                    @click="switchView('VisualComponent','dashboard','visual')"
                    :class="{'active-sub': isActiveSub('visual')}">
                    <i :class="isActiveSub('visual') ? 'bi bi-circle-fill' : 'bi bi-circle'"></i> Visual
                </div>
            </div>

            <!-- FLOATING SUBMENU (sidebar collapsed) -->
            <div class="floating-submenu" v-if="floatingMenu === 'dashboard' && isCollapsed">
                <div class="submenu-item"
                    @click="switchView('GraphsComponent','dashboard','graphs')"
                    :class="{'active-sub': isActiveSub('graphs')}">
                    <i :class="isActiveSub('graphs') ? 'bi bi-circle-fill' : 'bi bi-circle'"></i> Graphs
                </div>
                <div class="submenu-item"
                    @click="switchView('StatisticsComponent','dashboard','statistics')"
                    :class="{'active-sub': isActiveSub('statistics')}">
                    <i :class="isActiveSub('statistics') ? 'bi bi-circle-fill' : 'bi bi-circle'"></i> Statistics
                </div>
                <div class="submenu-item"
                    @click="switchView('VisualComponent','dashboard','visual')"
                    :class="{'active-sub': isActiveSub('visual')}">
                    <i :class="isActiveSub('visual') ? 'bi bi-circle-fill' : 'bi bi-circle'"></i> Visual
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
                    <i :class="isActiveSub('logs') ? 'bi bi-circle-fill' : 'bi bi-circle'"></i> Logs
                </div>
                <div class="submenu-item"
                    @click="switchView('ErrorsComponent','activities','errors')"
                    :class="{'active-sub': isActiveSub('errors')}">
                    <i :class="isActiveSub('errors') ? 'bi bi-circle-fill' : 'bi bi-circle'"></i> Errors
                </div>
            </div>

            <!-- FLOATING SUBMENU (sidebar collapsed) -->
            <div class="floating-submenu" v-if="floatingMenu === 'activities' && isCollapsed" :style="{top: floatingTop + 'px'}">
                <div class="submenu-item"
                    @click="switchView('LogsComponent','activities','logs')"
                    :class="{'active-sub': isActiveSub('logs')}">
                    <i :class="isActiveSub('logs') ? 'bi bi-circle-fill' : 'bi bi-circle'"></i> Logs
                </div>
                <div class="submenu-item"
                    @click="switchView('ErrorsComponent','activities','errors')"
                    :class="{'active-sub': isActiveSub('errors')}">
                    <i :class="isActiveSub('errors') ? 'bi bi-circle-fill' : 'bi bi-circle'"></i> Errors
                </div>
            </div>
        </div>

        <!-- USERS (MAIN MENU DIRECT) -->
        <!-- <div 
            class="menu-item"
            :class="{'active-main': isActiveMain('users')}"
            @click="switchView('UsersComponent','users')"
        >
            <div class="menu-left">
                <i class="bi bi-people"></i>
                <span v-show="!isCollapsed">Users</span>
            </div>
        </div> -->

        <div class="mt-2">
            <div 
                class="menu-item"
                :class="{'active-main': isActiveMain('users')}"
                @click="toggleMenu('users', $event)"
            >
                <div class="menu-left">
                    <i class="bi bi-people"></i>
                    <span v-show="!isCollapsed">Users</span>
                </div>
                <i 
                    v-show="!isCollapsed"
                    class="bi bi-chevron-down arrow"
                    :class="{'rotate': openMenu === 'users'}"
                ></i>
            </div>

            <!-- SUBMENU (expanded normally) -->
            <div class="submenu-wrapper" :class="{'submenu-open': openMenu === 'users'}">
                <div class="submenu-item"
                    @click="switchView('ListsComponent','users','lists')"
                    :class="{'active-sub': isActiveSub('lists')}">
                    <i :class="isActiveSub('lists') ? 'bi bi-circle-fill' : 'bi bi-circle'"></i> Users List
                </div>
                <div class="submenu-item"
                    @click="switchView('RolesComponent','users','roles')"
                    :class="{'active-sub': isActiveSub('roles')}">
                    <i :class="isActiveSub('roles') ? 'bi bi-circle-fill' : 'bi bi-circle'"></i> Roles
                </div>
                <div class="submenu-item"
                    @click="switchView('PermissionsComponent','users','permissions')"
                    :class="{'active-sub': isActiveSub('permissions')}">
                    <i :class="isActiveSub('permissions') ? 'bi bi-circle-fill' : 'bi bi-circle'"></i> Permissions
                </div>
            </div>

            <!-- FLOATING SUBMENU (sidebar collapsed) -->
            <div class="floating-submenu" v-if="floatingMenu === 'users' && isCollapsed" :style="{top: floatingTop + 'px'}">
                <div class="submenu-item"
                    @click="switchView('ListsComponent','users','lists')"
                    :class="{'active-sub': isActiveSub('lists')}">
                    <i :class="isActiveSub('lists') ? 'bi bi-circle-fill' : 'bi bi-circle'"></i> Users List
                </div>
                <div class="submenu-item"
                    @click="switchView('RolesComponent','users','roles')"
                    :class="{'active-sub': isActiveSub('roles')}">
                    <i :class="isActiveSub('roles') ? 'bi bi-circle-fill' : 'bi bi-circle'"></i> Roles
                </div>
                <div class="submenu-item"
                    @click="switchView('PermissionsComponent','users','permissions')"
                    :class="{'active-sub': isActiveSub('permissions')}">
                    <i :class="isActiveSub('permissions') ? 'bi bi-circle-fill' : 'bi bi-circle'"></i> Permissions
                </div>
            </div>
        </div>

        <!-- SETUP (MAIN MENU DIRECT) -->
        
        <div class="mt-2">
            <div 
                class="menu-item"
                :class="{'active-main': isActiveMain('setups')}"
                @click="toggleMenu('setups', $event)"
            >
                <div class="menu-left">
                    <i class="bi bi-gear"></i>
                    <span v-show="!isCollapsed">Setups</span>
                </div>
                <i 
                    v-show="!isCollapsed"
                    class="bi bi-chevron-down arrow"
                    :class="{'rotate': openMenu === 'setups'}"
                ></i>
            </div>

            <!-- SUBMENU (expanded normally) -->
            <div class="submenu-wrapper" :class="{'submenu-open': openMenu === 'setups'}">
                <div class="submenu-item"
                    @click="switchView('tvserversComponent','setups','tvservers')"
                    :class="{'active-sub': isActiveSub('tvservers')}">
                    <i :class="isActiveSub('tvservers') ? 'bi bi-circle-fill' : 'bi bi-circle'"></i> TV Servers
                </div>
                <div class="submenu-item"
                    @click="switchView('siteprofilesComponent','setups','siteprofiles')"
                    :class="{'active-sub': isActiveSub('siteprofiles')}">
                    <i :class="isActiveSub('siteprofiles') ? 'bi bi-circle-fill' : 'bi bi-circle'"></i> Site Profile
                </div>
            </div>

            <!-- FLOATING SUBMENU (sidebar collapsed) -->
            <div class="floating-submenu" v-if="floatingMenu === 'setups' && isCollapsed" :style="{top: floatingTop + 'px'}">
                <div class="submenu-item"
                    @click="switchView('tvserversComponent','setups','tvservers')"
                    :class="{'active-sub': isActiveSub('tvservers')}">
                    <i :class="isActiveSub('tvservers') ? 'bi bi-circle-fill' : 'bi bi-circle'"></i> TV Servers
                </div>
                <div class="submenu-item"
                    @click="switchView('siteprofilesComponent','setups','siteprofiles')"
                    :class="{'active-sub': isActiveSub('siteprofiles')}">
                    <i :class="isActiveSub('siteprofiles') ? 'bi bi-circle-fill' : 'bi bi-circle'"></i> Site Profile
                </div>
            </div>
        </div>

    </div>

</aside>
