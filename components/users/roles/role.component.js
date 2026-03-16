import api from "../../../assets/js/api";
import { SkeletonComponent } from "../../common/skeleton.component";
import { RoleModalComponent } from "../modals/RoleModalComponent";

export const RolesComponent = {
    components: {
        SkeletonComponent,
        RoleModalComponent
    },

    data() {
        return {
            loading: true,
            rolesList: [],
            modalDetails: {
                modalTitle: 'Insert Role',
                modalBtn: false
            }
        }
    },

    methods: {
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
            <div class="page-header">
              <h3 class="page-title"> ROLES </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Roles</li>
                </ol>
              </nav>
            </div>

            <div class="card shadow-sm p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Role List</h4>
                    <input id="searchUser" type="text" class="form-control w-25" placeholder="Search...">
                    <role-modal-component 
                        ref="roleModal"
                        @role-saved="fetchRoles"
                    >
                    </role-modal-component>
                    <button class="btn btn-primary" @click="addRole"><i class="bi bi-plus-circle"></i> Add Role</button>
                </div>
                <table class="table table-bordered table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">ID</th>
                            <th width="25%">Group_Code</th>
                            <th width="20%">Group_Name</th>
                            <th width="20%">Description</th>
                            <th width="15%">Date_Added</th>
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
                                <td>{{ role.created_at }}</td>
                                <td class="d-flex align-items-center gap-2">
                                    <button class="btn btn-sm btn-info text-white d-flex align-items-center" @click="openEditRole(role)"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-sm btn-danger text-white d-flex align-items-center"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    `
};
