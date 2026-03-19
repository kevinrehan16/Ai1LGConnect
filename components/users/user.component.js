// Export the component definition

import api from '../../assets/js/api.js'; // Import the pre-configured Axios instance
import { UserModalComponent } from './modals/UserModalComponent.js';

export const UsersComponent = {
    components: {
        UserModalComponent
    },

    data() {
        return {
            searchUser: '',
            usersList: []
        };
    },

    methods: {
        async fetchUsers() {
            try {
                const response = await api.get('users');
                this.usersList = response.data;
            } catch (error) {
                console.error("Error fetching users:", error);
            }
        },

        openAddUser() {
        // Access the modal via $refs
        this.$refs.userModal.show();
        },

        openEditUser(user) {
        this.$refs.userModal.show(user);
        }
    },

    mounted() {
        this.fetchUsers(); // Tawagan ang method para kunin ang users pag mount ng component
    },

    template: /* html */`
        <div id="main-container">
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
                    <h4>Users Log</h4>
                    <input v-model="searchUser" id="searchUser" type="text" class="form-control w-25" placeholder="Search...">
                    <user-modal-component ref="userModal"></user-modal-component>
                    <button class="btn btn-primary" @click="openAddUser">Add User</button>
                </div>
                <table class="table table-bordered table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Main_Group</th>
                            <th>Status</th>
                            <th>Date_Added</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(user, index) in usersList" :key="index">
                            <td>{{ index + 1 }}</td>
                            <td>{{ user.username }}</td>
                            <td>{{ user.main_group ? user.main_group.group_name : 'N/A'  }}</td>
                            <td>{{ user.status }}</td>
                            <td>{{ user.created_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    `
};