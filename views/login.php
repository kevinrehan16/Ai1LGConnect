<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ai1-Connect</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

         <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background: linear-gradient(135deg, #f3384b, #d1c9db);
                height: 100vh;
            }

            .login-container {
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
            }

            .login-card {
                width: 100%;
                max-width: 400px;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.2);
                padding: 30px;
                background: #fff;
            }

            .form-control {
                border-radius: 10px;
                padding: 12px;
            }

            .logo {
                font-weight: 600;
                font-size: 24px;
                text-align: center;
                margin-bottom: 20px;
            }

            .hover-password {
                cursor: pointer;
            }

            .forgot {
                font-size: 14px;
            }
        </style>
    </head>
    
    <body>
        <div id="login-app" class="login-container">
            <div class="login-card">
                <div class="logo"><img src="../assets/images/logo.jpg" alt="Ai1 Connect" class="rounded img-thumbnail"/></div>

                <form @submit.prevent="handleLogin">
                    <div class="mb-3">
                        <label class="form-label text-danger fw-medium">Username</label>
                        
                        <div class="input-group">
                            <input 
                                type="text" 
                                v-model="form.username" 
                                id="username" 
                                class="form-control" 
                                placeholder="Enter your username" 
                                required
                            >
                            <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-danger fw-medium">Password</label>
                        <div class="input-group">
                            <input 
                                :type="showPassword ? 'text' : 'password'" 
                                v-model="form.password" 
                                id="password" 
                                class="form-control" 
                                placeholder="Enter your password" 
                                required
                            >
                            <span class="input-group-text hover-password" @click="togglePassword"><i :class="showPassword ? 'bi bi-unlock-fill' : 'bi bi-lock-fill'"></i></span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mb-3">
                        <a href="javascript:void(0)" onclick="alert('Not yet working.')" class="forgot">Forgot password?</a>
                    </div>

                    <button type="submit" :disabled="loading" class="btn btn-primary w-100">
                        <span v-if="loading" class="spinner-border spinner-border-sm me-1"></span>
                        <i v-if="!loading" class="bi bi-box-arrow-in-right me-1"></i>
                        {{ loading ? 'Logging in...' : 'Login' }}
                    </button>
                </form>

                <!-- <div class="text-center mt-3">
                <small>Don't have an account? <a href="#">Sign up</a></small>
                </div> -->
            </div>
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
                        usersList: [],
                        showPassword: false
                    }
                },
                methods: {
                    togglePassword() {
                        this.showPassword = !this.showPassword;
                    },

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