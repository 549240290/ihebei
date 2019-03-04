import { API } from '~/config.js'

export function getUser() {
    return axios.get(API + 'user');
}