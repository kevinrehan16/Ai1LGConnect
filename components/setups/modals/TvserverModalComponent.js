import api from "../../../assets/js/api";
import { formatIP } from "../../../assets/js/formatters";

// assets/js/RoleModalComponent.js
export const TvserverModalComponent = {
  data() {
    return {
      modalInfo: [],
      formTvserver: {
        server_id: '',
        url: '',
        port: '',
        ip_address: '',
        client_id: '',
        client_secret: '',
        status: 1
      },
      originalTvserver: {},
    };
  },
  methods: {
    formatIP,

    show(tvs = null, modalDetails) {
      this.modalInfo = modalDetails;

      // console.log(tvs.server_id);
      if (tvs) {
        this.formTvserver = { ...tvs };          // bind form
        this.originalTvserver = { ...tvs };      // keep original copy
      } else {
        this.reset();
      }

      const modalTvserver = document.getElementById('tvserverModal');
      const modal = new bootstrap.Modal(modalTvserver);
      modal.show();
    },

    closeTvserverModal() {
      const modalTvserver = document.getElementById('tvserverModal');
      const modal = bootstrap.Modal.getInstance(modalTvserver);
      modal.hide();

      this.reset();
    },

    reset(){
      this.formTvserver.server_id = ''
      this.formTvserver.url = ''
      this.formTvserver.port = ''
      this.formTvserver.ip_address = ''
      this.formTvserver.client_id = ''
      this.formTvserver.client_secret = ''

      this.originalTvserver = {};
    },

    async saveTvserver(){
      try {
        if(!this.modalInfo.modalBtn){
          const response = await api.post("tv-servers", this.formTvserver);
          alert("Added successfully.");
        }
        else{
          const patchData = {};
          // Add only changed fields
          for (const key in this.formTvserver) {
            if (this.formTvserver[key] !== this.originalTvserver[key]) {
              patchData[key] = this.formTvserver[key];
            }
          }

          const response = await api.patch(`tv-servers/${this.formTvserver.server_id}`, patchData);
          alert("Updated successfully.");
        }
        // console.log(response);

        this.$emit('tvserver-saved');
        this.closeTvserverModal();
      } catch (error) {
        console.log(error.response);
      }
    }
    
  },

  mounted() {
    
  },
  template: /* html */ `
    <div class="modal fade" id="tvserverModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title text-white">{{ modalInfo.modalTitle }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="row mb-3">
              <div class="col-md-12">
                <label>Server ID</label>
                <input type="text" 
                      class="form-control" 
                      v-model="formTvserver.server_id"
                      :disabled="this.modalInfo.modalBtn"
                >
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <label>URL</label>
                <input type="text" 
                      class="form-control" 
                      v-model="formTvserver.url"
                      placeholder="https://example.com"
                      >
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-4">
                <label>Port</label>
                <input type="text" 
                      class="form-control" 
                      maxlength="4" 
                      v-model="formTvserver.port"
                      placeholder="3306"
                >
              </div>
              <div class="col-md-8">
                <label>IP Address</label>
                <input type="text" 
                        class="form-control" 
                        v-model="formTvserver.ip_address" 
                        placeholder="192.168.0.1"
                        @input="formTvserver.ip_address = formatIP(formTvserver.ip_address)"
                        maxlength="15"
                >
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <label>Client ID</label>
                <input type="text" class="form-control" v-model="formTvserver.client_id">
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <label>Client Secret</label>
                <input type="password" class="form-control" v-model="formTvserver.client_secret">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" @click="saveTvserver"><i class="bi bi-check"></i> Save</button>
            <button class="btn btn-danger" @click="closeTvserverModal"><i class="bi bi-x"></i> Close</button>
          </div>
        </div>
      </div>
    </div>
  `
};