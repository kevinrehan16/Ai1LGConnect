import api from "../../../assets/js/api";
import { SkeletonComponent } from "../../common/skeleton.component";
import { PageHeaderComponent } from "../../common/pageheader.component";

import { UserModalComponent } from "../modals/UserModalComponent";
import { formatDateTime } from "../../../assets/js/formatters";

export const ListsComponent = {
    components: {
        SkeletonComponent,
        PageHeaderComponent,
        UserModalComponent,
    },

    data() {
        return {
            loading: true,
            searchUser: '',
            usersList: [],
            modalDetails: {
                modalTitle: 'Insert User',
                modalBtn: false
            },

            title: 'users',
            breadcrumb: ['home', 'users'],
            icon: 'bi bi-people-fill'
        };
    },

    methods: {
        formatDateTime,

        async fetchUsers() {
            this.loading = true;
            try {
                const response = await api.get('users');
                this.usersList = response.data;

                this.loading = false;
            } catch (error) {
                console.error("Error fetching users:", error);
            }
        },

        openAddUser() {
            this.modalDetails.modalTitle = "Insert User";
            this.modalDetails.modalBtn = false;
            // Access the modal via $refs
            this.$refs.userModal.show(null, this.modalDetails);
        },

        openEditUser(user) {
            this.modalDetails.modalTitle = "Update User";
            this.modalDetails.modalBtn = true;
            
            this.$refs.userModal.show(user, this.modalDetails);
        },
    },

    mounted() {
        this.fetchUsers(); // Tawagan ang method para kunin ang users pag mount ng component
    },
    
    template: /* HTML */`
        <div id="main-container">
            <page-header-component
                :title="title"
                :breadcrumb="breadcrumb"
                :icon="icon"
            >
            </page-header-component>

            <div class="card shadow-sm p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <user-modal-component 
                        ref="userModal" 
                        @user-saved="fetchUsers"
                    >
                    </user-modal-component>
                    <div class="input-group" style="max-width:400px;">
                      <span class="input-group-text">
                        <i class="bi bi-search"></i>
                      </span>
                      <input 
                        v-model="searchUser"
                        id="searchUser"
                        type="text" 
                        class="form-control w-25" 
                        placeholder="Search..."
                      >
                    </div>
                    <button class="btn btn-primary" @click="openAddUser">
                        <i class="bi bi-plus-circle"></i> Add User
                    </button>
                </div>
                <table class="table table-bordered table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">ID</th>
                            <th width="32%">Username</th>
                            <th width="32%">Main_Group</th>
                            <th width="6%">Status</th>
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
                        <template v-else-if="usersList.length > 0">
                            <tr v-for="(user, index) in usersList" :key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ user.username }}</td>
                                <td>{{ user.main_group ? user.main_group.group_name : 'N/A'  }}</td>
                                <td>
                                    <span v-if="user.status == 1 || user.status == -1" class="badge bg-success">
                                        Active
                                    </span>
                                    <span v-else class="badge bg-secondary">
                                        Inactive
                                    </span>
                                </td>
                                <td v-html="formatDateTime(user.created_at)"></td>
                                <td>
                                    <button 
                                        class="btn btn-sm btn-info text-white me-1" 
                                        @click="openEditUser(user)"
                                    >
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button 
                                        class="btn btn-sm btn-danger text-white">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    `
};