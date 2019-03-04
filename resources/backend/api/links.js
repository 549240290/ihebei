import { API } from '~/config.js'

export function fetchList() {
    return axios.get(API + 'link');
}

export function create(data) {
    return axios.post(API + 'link', data);
}

export function update(data) {
    return axios.request({
        url: API + 'link/' + data.id,
        data: data,
        method: 'patch'
    })
}