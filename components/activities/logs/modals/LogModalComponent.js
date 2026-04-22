import api from "../../../../assets/js/api";
import { formatJSON, formatDateTime } from "../../../../assets/js/formatters";

export const LogModalComponent = {
  data() {
    return {
      formLog: {}, // Ginawang object na default
    };
  },

  methods: {
    formatJSON,
    formatDateTime,
    
    show(log = null) {
      if (log) {
        this.formLog = { ...log };
      } else {
        this.reset();
      }

      const modalLog = document.getElementById('logModal');
      const modal = new bootstrap.Modal(modalLog);
      modal.show();
    },

    closeLogModal() {
      const modalLog = document.getElementById('logModal');
      const modal = bootstrap.Modal.getInstance(modalLog);
      if (modal) modal.hide();
      this.reset();
    },

    reset() {
      this.formLog = {};
    },
  },
  
  template: /* html */ `
    <div class="modal fade" id="logModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-dark text-white">
            <h5 class="modal-title">Log Details</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label fw-bold small text-muted">Method</label>
                <div class="mt-1">
                    <span :class="formLog.method === 'POST' ? 'badge bg-success' : 'badge bg-primary'">
                        {{ formLog.method ? formLog.method : formLog.action }}
                    </span>
                </div>
              </div>
              <div class="col-6">
                <label class="form-label fw-bold small text-muted">Created At</label>
                <p class="text-secondary small" v-html="formatDateTime(formLog.created_at)" ></p>
              </div>

              <div class="col-md-6">
                <label class="form-label fw-bold small text-muted">Request ID</label>
                <input type="text" class="form-control form-control-sm bg-light" :value="formLog.request_id" 
                readonly>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold small text-muted">IP Address</label>
                <input type="text" class="form-control form-control-sm bg-light" :value="formLog.ip_address" 
                readonly>
              </div>

              <div class="col-md-6">
                <label class="form-label fw-bold small text-muted">Module</label>
                <input type="text" class="form-control form-control-sm bg-light" :value="formLog.module" readonly>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold small text-muted">TV Server ID</label>
                <input type="text" class="form-control form-control-sm bg-light" :value="formLog.tv_server_id" 
                readonly>
              </div>

              <div class="col-12">
                <label class="form-label fw-bold small text-muted">Request Data (JSON Payload)</label>
                <div class="position-relative">
                    <pre class="p-3 m-0" 
                        style="max-height: 500px; 
                                overflow-y: auto; 
                                font-family: 'Courier New', Courier, monospace; 
                                font-size: 13px; 
                                color: #a6e22e; /* Eto yung green text na parang sa pic */
                                background: #272822; /* Monokai style background */
                                border-radius: 5px;
                                border: 1px solid #3e3e3e;
                                line-height: 1.5;"
                    >
                      <code>{{ formatJSON(formLog.request_data) }}</code>
                    </pre>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer bg-light">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                <i class="bi bi-x"></i> Close
            </button>
          </div>
        </div>
      </div>
    </div>
  `
};