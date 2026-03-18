import api from "../../../assets/js/api";
import { SkeletonComponent } from "../../common/skeleton.component";
import { PageHeaderComponent } from "../../common/pageheader.component";
import { formatDateTime } from "../../../assets/js/formatters";

import { RoleModalComponent } from "../modals/RoleModalComponent";

export const RolesComponent = {
    components: {
        SkeletonComponent,
        PageHeaderComponent,
        RoleModalComponent
    },

    data() {
        return {
            loading: true,
            searRole: '',
            rolesLst: [],
            modalDetails: {
                modalTitle: 'Insert Role',
                modalBtn: false
            },

            title: 'roles',
            breadcrumb: ['home', 'roles'],
            icon: 'bi bi-person-fill-gear'
        }
    },

    methods: {
        formatDateTime,

        async fetchRoles(){
            this.loading = true;
            try {
                const roles = await api.get("usergroups");

                this.rolesList = roles.data;
                // console.log(roles.data);
                this.loading = false;
            } catch (error) {
                console.log(error.data);
            }
        },

        addRole(){
            this.modalDetails.modalTitle = 'Insert Role';
            this.modalDetails.modalBtn = false;
            this.$refs.roleModal.show(null, this.modalDetails);
        },
         
        openEditRole(role){
            this.modalDetails.modalTitle = 'Update Role';
            this.modalDetails.modalBtn = true;
            this.$refs.roleModal.show(role, this.modalDetails);
        },
    },

    mounted() {
        this.fetchRoles();
    },

    template: /* HTML */`
        <div id="activities-container">
            <page-header-component 
                :title="title"
                :breadcrumb="breadcrumb"
                :icon="icon"
            >
            </page-header-component>

            <div class="card shadow-sm p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                <role-modal-component 
                    ref="roleModal"
                    @role-saved="fetchRoles"
                >
                </role-modal-component>
                    <div class="input-group" style="max-width:400px;">
                      <span class="input-group-text">
                        <i class="bi bi-search"></i>
                      </span>
                      <input 
                        v-model="searRole"
                        id="searRole"
                        type="text" 
                        class="form-control w-25" 
                        placeholder="Search..."
                      >
                    </div>
                    <button class="btn btn-primary" @click="addRole"><i class="bi bi-plus-circle"></i> Add Role</button>
                </div>
                <table class="table table-bordered table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">ID</th>
                            <th width="25%">Group_Code</th>
                            <th width="25%">Group_Name</th>
                            <th width="20%">Description</th>
                            <th width="10%">Date_Added</th>
                            <th width="15%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <skeleton-component
                            v-if="loading"
                            :rows="5"
                            :columns="6"
                        />
                        <template v-else-if="rolesList.length > 0">
                            <tr v-for="role in rolesList" :key="role.id">
                                <td>{{ role.id }}</td>
                                <td>{{ role.group_code }}</td>
                                <td>{{ role.group_name }}</td>
                                <td>{{ role.description }}</td>
                                <td v-html="formatDateTime(role.created_at)"></td>
                                <td>
                                    <button class="btn btn-sm btn-info text-white me-1" @click="openEditRole(role)"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-sm btn-danger text-white"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    `
};
