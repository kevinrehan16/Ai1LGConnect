import api from "../../../assets/js/api";
import { SkeletonComponent } from "../../common/skeleton.component";
import { PageHeaderComponent } from "../../common/pageheader.component";
import { formatDateTime, formatTitleCase } from "../../../assets/js/formatters";
import { LogModalComponent } from "../logs/modals/LogModalComponent";

export const LogsComponent = {
    components: {
        PageHeaderComponent,
        SkeletonComponent,
        LogModalComponent
    },

    data() {
        return {
            loading: true,
            inboundLogs: [],
            outboundLogs: [],
            activeTab: 'inbound', // I-track natin para alam kung alin ang i-fe-fetch
            title: 'Logs',
            breadcrumb: ['Home', 'Logs'],
            icon: 'bi bi-journal-text',
        }
    },

    methods: {
        formatDateTime,
        formatTitleCase,

        async fetchInboundLogs() {
            this.loading = true;
            try {
                const response = await api.get("logs/inbound?page=1&per_page=20");
                this.inboundLogs = response.data.data;
            } catch (error) {
                console.error("Inbound Error:", error.response?.error || error.message);
            } finally {
                this.loading = false;
            }
        },

        async fetchOutboundLogs() {
            this.loading = true;
            try {
                const response = await api.get("logs/outbound?page=1&per_page=20");
                this.outboundLogs = response.data.data;
            } catch (error) {
                console.error("Outbound Error:", error.response?.error || error.message);
            } finally {
                this.loading = false;
            }
        },

        // Switch Tab Logic
        setActiveTab(tab) {
            this.activeTab = tab;
            if (tab === 'inbound') {
                this.fetchInboundLogs();
            } else {
                this.fetchOutboundLogs();
            }
        },

        viewLog(log) {
            this.$refs.logModal.show(log);
        },
    },

    mounted() {
        this.fetchInboundLogs(); // Default load
    },

    template: /* HTML */`
        <div id="main-container">
            <page-header-component :title="title" :breadcrumb="breadcrumb" :icon="icon"></page-header-component>
            <log-modal-component ref="logModal"></log-modal-component>

            <div class="card shadow-sm">
                <div class="card-header bg-white pt-3">
                    <ul class="nav nav-tabs card-header-tabs" id="logsTab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link" :class="{ active: activeTab === 'inbound' }" 
                            @click="setActiveTab('inbound')" type="button">
                                <i class="bi bi-download me-1"></i> Inbound Logs
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" :class="{ active: activeTab === 'outbound' }" 
                            @click="setActiveTab('outbound')" type="button">
                                <i class="bi bi-upload me-1"></i> Outbound Logs
                            </button>
                        </li>
                    </ul>
                </div>

                <div class="card-body p-4">
                    <div class="tab-content" id="logsTabContent">
                        
                        <div v-if="activeTab === 'inbound'" class="tab-pane fade show active">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="input-group" style="max-width:400px;">
                                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Search Inbound...">
                                </div>
                                <button class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add Inbound 
                                Profile</button> 
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped w-100">
                                    <thead class="table-dark">
                                        <tr>
                                            <th width="5%" class="text-center">#</th>
                                            <th width="15%">Request_ID</th>
                                            <th width="20%">Request_Data</th>
                                            <th width="12%">Module</th>
                                            <th width="10%">IP_Address</th>
                                            <th width="10%">TV_Server</th>
                                            <th width="10%" class="text-center">Method</th>
                                            <th width="10%">Created_At</th>
                                            <th width="8%" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <skeleton-component v-if="loading" :rows="5" :columns="9" />
                                        <template v-else-if="inboundLogs.length > 0">
                                            <tr v-for="(log, index) in inboundLogs" :key="'in-'+index">
                                                <td class="align-top text-center">{{ index + 1 }}</td>
                                                <td class="align-top text-truncate">{{ log.request_id }}</td>
                                                <td>
                                                    <div class="log-data-box">{{ log.request_data }}</div>
                                                </td>
                                                <td class="align-top">{{ formatTitleCase(log.module)}}</td>
                                                <td class="align-top">{{ log.ip_address }}</td>
                                                <td class="align-top">{{ log.tv_server_id}}</td>
                                                <td class="align-top text-center">
                                                    <span class="badge bg-success">{{ log.method }}</span>
                                                </td>
                                                <td class="align-top" v-html="formatDateTime(log.created_at)"></td>
                                                <td class="align-top text-center">
                                                    <button @click="viewLog(log)" class="btn btn-sm btn-info text-
                                                    white"><i class="bi bi-eye text-white"></i></button>
                                                </td>
                                            </tr>
                                        </template>
                                        <tr v-else>
                                            <td colspan="9" class="text-center">No Inbound logs found.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div v-if="activeTab === 'outbound'" class="tab-pane fade show active">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="input-group" style="max-width:400px;">
                                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Search Outbound...">
                                </div>
                                <button class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add Outbound 
                                Profile</button> 
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped w-100">
                                    <thead class="table-dark">
                                        <tr class="text-nowrap">
                                            <th width="3%" class="text-center">#</th>
                                            <th width="10%">Username</th>
                                            <th width="10%">Request_ID</th>
                                            <th width="24%">Request_Data</th>
                                            <th width="10%">Module</th>
                                            <th width="10%">IP_Address</th>
                                            <th width="10%">TV_Server</th>
                                            <th width="7%" class="text-center">Method</th>
                                            <th width="10%">Created_At</th>
                                            <th width="6%" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <skeleton-component v-if="loading" :rows="5" :columns="10" />
                                        <template v-else-if="outboundLogs.length > 0">
                                            <tr v-for="(log, index) in outboundLogs" :key="'in-'+index">
                                                <td class="align-top text-center">{{ index + 1 }}</td>
                                                <td class="align-top">{{ formatTitleCase(log.username) }}</td>
                                                <td class="align-top text-truncate">{{ log.request_id }}</td>
                                                <td>
                                                    <div class="log-data-box">{{ log.request_data }}</div>
                                                </td>
                                                <td class="align-top">{{ formatTitleCase(log.module) }}</td>
                                                <td class="align-top">{{ log.ip_address }}</td>
                                                <td class="align-top">{{ log.tv_server_id}}</td>
                                                <td class="align-top text-center">
                                                    <span class="badge bg-success">{{ log.action }}</span>
                                                </td>
                                                <td class="align-top" v-html="formatDateTime(log.created_at)"></td>
                                                <td class="align-top text-center">
                                                    <button @click="viewLog(log)" class="btn btn-sm btn-info text-
                                                    white"><i class="bi bi-eye text-white"></i></button>
                                                </td>
                                            </tr>
                                        </template>
                                        <tr v-else>
                                            <td colspan="10" class="text-center">No Outbound logs found.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    `
};