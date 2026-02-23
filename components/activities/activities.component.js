// Export the component definition
export const ActivitiesComponent = {
    data() {
        return {
            searchQuery: '',
            activityList: [
                { id: 1, name: 'User Login', date: '2026-02-19' },
                { id: 2, name: 'File Uploaded', date: '2026-02-18' }
            ]
        };
    },
    template: `
        <div class="activities-container">
            <div class="card shadow-sm p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Activity Logs</h4>
                    <input v-model="searchQuery" type="text" class="form-control w-25" placeholder="Search...">
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Activity</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in activityList" :key="item.id">
                            <td>{{ item.id }}</td>
                            <td>{{ item.name }}</td>
                            <td>{{ item.date }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    `
};