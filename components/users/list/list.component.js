import api from "../../../assets/js/api";
import { UserModalComponent } from "../modals/UserModalComponent";
import { SkeletonComponent } from "../../common/skeleton.component";

export const ListsComponent = {
    components: {
        UserModalComponent,
        SkeletonComponent,
    },

    data() {
        return {
            loading: true,
            searchUser: '',
            usersList: [],
            modalDetails: {
                modalTitle: 'Insert User',
                modalBtn: false
            }
        };
    },

    methods: {
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
        <div id="activities-container">
            <div class="page-header">
              <h3 class="page-title"> USERS </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Users</li>
                </ol>
              </nav>
            </div>

            <div class="card shadow-sm p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Users List</h4>
                    <input v-model="searchUser" id="searchUser" type="text" class="form-control w-25" placeholder="Search...">
                    <user-modal-component 
                        ref="userModal" 
                        @user-saved="fetchUsers"
                    >
                    </user-modal-component>
                    <button class="btn btn-primary" @click="openAddUser">Add User</button>
                </div>
                <table class="table table-bordered table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">ID</th>
                            <th width="25%">Username</th>
                            <th width="20%">Main_Group</th>
                            <th width="20%">Status</th>
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
                        <template v-else-if="usersList.length > 0">
                            <tr v-for="(user, index) in usersList" :key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ user.username }}</td>
                                <td>{{ user.main_group ? user.main_group.group_name : 'N/A'  }}</td>
                                <td>{{ user.status }}</td>
                                <td>{{ user.created_at }}</td>
                                <td class="d-flex align-items-center gap-2">
                                    <button class="btn btn-sm btn-info text-white d-flex align-items-center" @click="openEditUser(user)"><i class="bi bi-pencil"></i></button>
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