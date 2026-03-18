import api from "../../../assets/js/api";
import { PageHeaderComponent } from "../../common/pageheader.component";

export const PermissionsComponent = {
  components:{
    PageHeaderComponent,
  },

  data() {
    return {
      searchPermission: '',
      permissionsList: [],
      loading: true,
      expandedModules: {},

      title: 'permissions',
      breadcrumb: ['home', 'permissions'],
      icon: 'bi bi-person-fill-lock'
    };
  },

  methods: {
    async fetchPermissions() {
      try {
        const response = await api.get("permissions");
        this.permissionsList = response.data;

        // Initialize expanded state for each module
        this.permissionsList.forEach(mod => {
          this.expandedModules[mod.module] = false;
        });

        this.loading = false;
      } catch (error) {
        console.log(error);
        this.loading = false;
      }
    },

    toggleModule(moduleName) {
      this.expandedModules[moduleName] = !this.expandedModules[moduleName];
    },

    togglePermission(permission) {
      // Handle toggle logic here (e.g., call API to update)
      console.log("Toggled permission:", permission.perm_code);
    },
  },

  mounted() {
    this.fetchPermissions();
  },

  template: /* HTML */ `
    <div id="permissions-container">
      <page-header-component 
        :title="title"
        :breadcrumb="breadcrumb"
        :icon="icon"
      >
      </page-header-component>

      <div class="mb-3 d-flex justify-content-between align-items-center">
        <div class="input-group" style="max-width:400px;">
          <span class="input-group-text">
            <i class="bi bi-search"></i>
          </span>
          <input 
            v-model="searchPermission"
            id="searchPermission"
            type="text" 
            class="form-control w-25" 
            placeholder="Search..."
          >
        </div>
        <button class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add Module</button>
      </div>

      <div v-if="loading" class="text-center py-5">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>

      <div v-else>
        <div 
          v-for="module in permissionsList" 
          :key="module.module" 
          class="card mb-3 shadow-sm"
        >
          <div 
            class="card-header d-flex justify-content-between align-items-center cursor-pointer"
            @click="toggleModule(module.module)"
          >
            <h5 class="mb-0"> <i class="bi bi-shield-lock"></i> {{ module.module }}</h5>
            <span>
              <i :class="expandedModules[module.module] ? 'bi bi-chevron-up' : 'bi bi-chevron-down'"></i>
            </span>
          </div>

          <div v-show="expandedModules[module.module]" class="card-body">
            <div class="d-flex justify-content-end mb-2">
              <button class="btn btn-sm btn-success">
                <i class="bi bi-plus-circle"></i> Add Permission
              </button>
            </div>

            <div 
              v-for="perm in module.permissions" 
              :key="perm.perm_code" 
              class="d-flex align-items-center justify-content-between mb-2 p-3 border rounded"
            >
              <div class="d-flex align-items-center gap-4">
                <i class="bi bi-key text-white fs-2 bg-dark py-2 px-3 rounded-circle"></i>
                <div>
                  <strong>{{ perm.action_name }}</strong>
                  <p class="mb-0 text-muted small">{{ perm.description }}</p>
                </div>
              </div>
              <div class="d-flex align-items-center gap-2">
                <input 
                  type="hidden" 
                  class="form-check-input" 
                  @change="togglePermission(perm)"
                />
                <button class="btn btn-sm btn-info text-white"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-sm btn-danger text-white"><i class="bi bi-trash"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  `,
};