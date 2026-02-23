<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - LG Ai1Connect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body class="bg-light">
    <div id="login-app" class="container h-100">
        <form @submit.prevent="handleLogin">
            <input v-model="form.username" type="text" class="form-control mb-2" placeholder="Username">
            <input v-model="form.password" type="password" class="form-control mb-3" placeholder="Password">
            
            <button type="submit" :disabled="loading" class="btn btn-primary w-100">
                <span v-if="loading"></span>
                Login
            </button>
        </form>
    </div>

    <script type="module">
        import api from '../assets/js/api.js';

        const { createApp } = Vue;
        createApp({
            data() {
                return {
                    loading: false,
                    form: {
                        username: '',
                        password: ''
                    },
                    usersList: []
                }
            },
            methods: {
                async handleLogin() {
                    this.loading = true;
                    try {
                        // 1. Login sa Laravel API
                        const response = await api.post('auth/login', {
                            username: this.form.username,
                            password: this.form.password
                        });
  
                        if (response.data.status == "success") {
                            // 2. Tawagan ang local bridge para i-set ang $_SESSION['username']
                            // Gagamit tayo ng plain axios dito o yung 'api' instance pero sa local path
                            await axios.post('../api/set_session.php', {
                                user: response.data.user // Gamitin ang input
                            });

                            // 3. Redirect na sa Dashboard
                            window.location.href = '../index.php';
                        }
                    } catch (error) {
                        alert("Login Failed: " + (error.response?.data?.message || "Invalid Credentials"));
                    } finally {
                        this.loading = false;
                    }
                },

                async fetchUsers() {
                    try {
                        const response = await api.get('users'); // Endpoint para sa users
                        this.usersList = response.data.users; // I-adjust base sa actual API response structure

                        console.log("Fetched Users: ", this.usersList); // Debug log para makita ang users sa console
                    } catch (error) {
                        console.error("Error fetching users:", error);
                    }
                }
            }
        }).mount('#login-app');
    </script>
</body>
</html>