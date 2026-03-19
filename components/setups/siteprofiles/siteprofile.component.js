import api from "../../../assets/js/api";

import { SkeletonComponent } from "../../common/skeleton.component";
import { PageHeaderComponent } from "../../common/pageheader.component";
import { formatDateTime } from "../../../assets/js/formatters";


export const SiteprofilesComponent = {

    components: {
        PageHeaderComponent,
        SkeletonComponent
    },

    data() {
        return {
            loading: true,
            siteprofiles: [],

            title: 'Site profile',
            breadcrumb: ['Home', 'Site profile'],
            icon: 'bi bi-folder-fill',
        }
    },

    methods: {
        formatDateTime,

        async fetchSiteProfiles(){
            this.loading = true;
            try {
                const response = await api.get("site-profile");

                this.siteprofiles = response.data;
                // console.log(response.data);
                this.loading = false;
            } catch (error) {
                console.log(data.response?.error || error.message);
            }
        }
    },

    mounted() {
        this.fetchSiteProfiles();
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
            <!-- <tvserver-modal-component
                ref="tvserverModal"
                @tvserver-saved="fetchTvServers"
            >
            </tvserver-modal-component> -->
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
                <button class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Add Site Profile
                </button> 
            </div>
            <table class="table table-bordered table-hover table-striped">
                <thead class="table-dark">
                <tr>
                    <th width="5%">ID</th>
                    <th width="8%">Site_ID</th>
                    <th width="17%">Name</th>
                    <th width="25%">Website</th>
                    <th width="5%">Currency</th>
                    <th width="10%">Time_Zone</th>
                    <th width="9%">TV_brand</th>
                    <th width="9%">Status</th>
                    <th width="10%">Created_At</th>
                    <th width="12%">ACTIONS</th>
                </tr>
                </thead>
                <tbody>
                <skeleton-component
                    v-if="loading"
                    :rows="5"
                    :columns="10"
                />
                <template v-else-if="siteprofiles.length > 0">
                    <tr v-for="sp in siteprofiles" :key="sp.id">
                        <td>{{ sp.id }}</td>
                        <td>{{ sp.site_id }}</td>
                        <td>{{ sp.name }}</td>
                        <td>{{ sp.website }}</td>
                        <td>{{ sp.currency }}</td>
                        <td>{{ sp.timezone }}</td>
                        <td>{{ sp.tv_brand }}</td>
                        <td>
                            <span v-if="sp.status == 1 || sp.status == -1" class="badge bg-success">
                            Active
                            </span>
                            <span v-else class="badge bg-secondary">
                            Inactive
                            </span>
                        </td>
                        <td v-html="formatDateTime(sp.timestamp)"></td>
                        <td>
                            <button 
                                class="btn btn-sm btn-info text-white me-1"
                            >
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button 
                                class="btn btn-sm btn-danger text-white"
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