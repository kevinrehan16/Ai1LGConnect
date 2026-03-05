import api from "../../../assets/js/api";

// assets/js/UserModalComponent.js
export const UserModalComponent = {
  data() {
    return {
      formUser: {
        uuid: '',
        username: '',
        password: '',
        password_confirmation: '',
        main_group: '',
        status: 1,
      },
      userGroups: [],
      modalInfo: []
    };
  },
  methods: {
    // Show the modal and optionally populate with user data
    async getUserGroups() {
      try {
        const userGroups = await api.get("usergroups");
        // console.log(userGroups.data);
        this.userGroups = userGroups.data;

      } catch (error) {
        console.log(error);
      }
    },

    show(user = null, modalDetails) {
      this.getUserGroups();
      this.modalInfo = modalDetails;

      if (user) {
        this.formUser.uuid = user.uuid;
        this.formUser.username = user.username || '';
        this.formUser.main_group = user.main_group ? user.main_group.group_code : '';
        this.formUser.password = '';
        this.formUser.password_confirmation = '';
      } else {
        this.reset();
      }

      const modalUser = document.getElementById('userModal');
      const modal = new bootstrap.Modal(modalUser);
      modal.show();
    },

    closeUserModal() {
      const modalUser = document.getElementById('userModal');
      const modal = bootstrap.Modal.getInstance(modalUser);
      modal.hide();

      this.reset();
    },

    // Reset all fields
    reset() {
      this.formUser.uuid = '';
      this.formUser.username = '';
      this.formUser.password = '';
      this.formUser.password_confirmation = '';
      this.formUser.main_group = '';
      this.formUser.status = 1;
    },

    // Example save method (you can integrate API call here)
    async saveUser() {
      try {
        if(!this.modalInfo.modalBtn){
          const response = await api.post('users', this.formUser);
          alert("Added successfully.");
        }
        else{
          //! MAY ISSUE SA UPDATE ROLE KAPAG YUNG GROUPNAME IS EXISTING
          //! MARERECEIVE MO Request failed with status code 422 
          const response = await api.patch(`users/${this.formUser.uuid}`, this.formUser);
          alert("Updated successfully.");
        }
        // console.log(response.data); 

        this.$emit('user-saved');
        this.closeUserModal();
      } catch (error) {
        console.log(error.response);
      }
    }
  },

  mounted() {
    // this.getUserGroups();
  },
  template: /* html */ `
    <div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title text-white">{{ modalInfo.modalTitle }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label>Username</label>
              <input v-model="formUser.username" class="form-control">
            </div>
            <div class="mb-3">
              <label>Password</label>
              <input v-model="formUser.password" type="password" class="form-control">
            </div>
            <div class="mb-3">
              <label>Confirm Password</label>
              <input v-model="formUser.password_confirmation" type="password" class="form-control">
            </div>
            <hr />
            <div class="mb-3">
              <label>Main Group</label>
              <select v-model="formUser.main_group" class="form-select">
                <option value="" disabled>Select a group</option>
                <option v-for="usergroup in userGroups" :key="usergroup.id" :value="usergroup.group_code">
                  {{ usergroup.group_name }}
                </option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" @click="saveUser"><i class="bi bi-check"></i> Save</button>
            <button class="btn btn-danger" @click="closeUserModal"><i class="bi bi-x"></i> Close</button>
          </div>
        </div>
      </div>
    </div>
  `
};