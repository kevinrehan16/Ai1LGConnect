import api from "../../../assets/js/api";

// assets/js/RoleModalComponent.js
export const RoleModalComponent = {
  data() {
    return {
      modalInfo: [],
      formRole: {
        group_code: '',
        group_name: '',
        description: ''
      },
    };
  },
  methods: {
    show(role = null, modalDetails) {
      this.modalInfo = modalDetails;

      // console.log(role);
      if (role) {
        this.formRole.group_code = role.group_code;
        this.formRole.group_name = role.group_name;
        this.formRole.description = role.description;
      } else {
        this.reset();
      }

      const modalRole = document.getElementById('roleModal');
      const modal = new bootstrap.Modal(modalRole);
      modal.show();
    },

    closeRoleModal() {
      const modalRole = document.getElementById('roleModal');
      const modal = bootstrap.Modal.getInstance(modalRole);
      modal.hide();

      this.reset();
    },

    reset(){
      this.formRole.group_name = '';
      this.formRole.description = '';
    },

    async saveRole(){
      try {
        if(!this.modalInfo.modalBtn){
          const response = await api.post("usergroups", this.formRole);
          alert("Added successfully.");
        }
        else{
          const response = await api.patch(`usergroups/${this.formRole.group_code}`, this.formRole);
          alert("Updated successfully.");
        }

        // console.log(response.data);
        this.$emit('role-saved');
        this.closeRoleModal();
      } catch (error) {
        console.log(error.data);
      }
    },
    
  },

  mounted() {
    
  },
  template: /* html */ `
    <div class="modal fade" id="roleModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title text-white">{{ modalInfo.modalTitle }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label>Group Name</label>
              <input v-model="formRole.group_name" type="text" class="form-control">
            </div>
            <div class="mb-3">
              <label>Description</label>
              <textarea v-model="formRole.description" rows="5" resize="none" class="form-control"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" @click="saveRole"><i class="bi bi-check"></i> Save</button>
            <button class="btn btn-danger" @click="closeRoleModal"><i class="bi bi-x"></i> Close</button>
          </div>
        </div>
      </div>
    </div>
  `
};