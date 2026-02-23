import { PUBLIC_API } from "./config";

const api = axios.create({
    baseURL: PUBLIC_API, // Ibinase sa curl mo
    withCredentials: true, // Importante para sa Laravel Cookies/Sessions
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
    }
});

export default api;