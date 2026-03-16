import api from "../../../assets/js/api";
import { SkeletonComponent } from "../../common/skeleton.component";
import { formatDateTime } from "../../../assets/js/formatters";
import { TvserverModalComponent } from "../modals/TvserverModalComponent";


export const TvserversComponent = {

  components:{
    SkeletonComponent,
    TvserverModalComponent
  },

  data() {
    return {
      modalDetails: {
        modalTitle: 'Insert Role',
        modalBtn: false
      },
      loading: true,
      tvservers: [],
    }
  },

  methods: {
    formatDateTime, //! This is also a methods so need to put in the METHODS

    async fetchTvServers(){
      this.loading = true;
      try {
        const response = await api.get("tv-servers");
        // console.log(response.data);
        this.tvservers = response.data;
        this.loading = false;
      } catch (error) {
        console.log(error.data);
      }
    },

    addTvServer(){
      this.modalDetails.modalTitle = 'Insert TV Server';
      this.modalDetails.modalBtn = false;
      this.$refs.tvserverModal.show(null, this.modalDetails);
    },

    openEditTvserver(tvs){
      this.modalDetails.modalTitle = 'Update TV Server';
      this.modalDetails.modalBtn = true;
      this.$refs.tvserverModal.show(tvs, this.modalDetails);
    },

    async deleteTvserver(server_id){
      var msg = confirm("Do you want to delete the selected server?");
      if(msg)
        try {
          const response = await api.delete(`tv-servers/${server_id}`);
          // console.log(response.data);

          this.fetchTvServers();
        } catch (error) {
          console.log(error.data);
        }
    },
  },

  mounted() {
    this.fetchTvServers();
  },

    template: /* HTML */ `
        <div id="activities-container">
            <div class="page-header">
              <h3 class="page-title text-primary"><i class="bi bi-display"></i> TV SERVERS </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Setups</li>
                  <li class="breadcrumb-item active" aria-current="page">TV Servers</li>
                </ol>
              </nav>
            </div>

            <div class="card shadow-sm p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                <tvserver-modal-component
                  ref="tvserverModal"
                  @tvserver-saved="fetchTvServers"
                >
                </tvserver-modal-component>
                    <div class="input-group" style="max-width:400px;">
                      <span class="input-group-text">
                        <i class="bi bi-search"></i>
                      </span>
                      <input 
                        type="text" 
                        class="form-control" 
                        placeholder="Search..."
                      >
                    </div>
                    <button class="btn btn-primary" @click="addTvServer">
                      <i class="bi bi-plus-circle"></i> Add TV Server
                    </button> 
                </div>
                <table class="table table-bordered table-hover table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th width="15%">SERVER_ID</th>
                            <th width="40%">URL_SERVER</th>
                            <th width="7%">PORT</th>
                            <th width="10%">CLIENT_ID</th>
                            <th width="8%">Status</th>
                            <th width="10%">CREATED_AT</th>
                            <th width="10%">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <skeleton-component
                            v-if="loading"
                            :rows="5"
                            :columns="7"
                        />
                        <template v-else-if="tvservers.length > 0">
                            <tr v-for="tvs in tvservers" :key="tvs.id">
                                <td>{{ tvs.server_id }}</td>
                                <td>{{ tvs.url }}</td>
                                <td>{{ tvs.port }}</td>
                                <td>{{ tvs.client_id }}</td>
                                <td>
                                  <span v-if="tvs.status == 1 || tvs.status == -1" class="badge bg-success">
                                    Active
                                  </span>
                                  <span v-else class="badge bg-secondary">
                                    Inactive
                                  </span>
                                </td>
                                <td v-html="formatDateTime(tvs.created_at)"></td>
                                <td>
                                  <button 
                                    class="btn btn-sm btn-info text-white me-1"
                                    @click="openEditTvserver(tvs)"
                                  >
                                      <i class="bi bi-pencil"></i>
                                  </button>
                                  <button 
                                    class="btn btn-sm btn-danger text-white"
                                    @click="deleteTvserver(tvs.server_id)"
                                  >
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