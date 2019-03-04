import axios from 'axios'
import { CONFIG } from '~/config.js'

const HttpRequest = axios.create({
    baseURL: CONFIG.API_URL,
    timeout: 5000
})

HttpRequest.interceptors.request.use(
    config => {

    },
    error => {

    }
)

export default HttpRequest