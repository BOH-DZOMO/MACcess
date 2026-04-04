import axios from 'axios';
import Echo from 'laravel-echo';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


import { WaveConnector } from 'laravel-wave';

window.Echo = new Echo({
    broadcaster: WaveConnector,
});
