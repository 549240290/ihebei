import { API } from '~/config.js'

export function fetchList() {
    return axios.get(API + 'category')
}

export function fetchItem(id) {
    return axios.get(API + 'categroy/' + id)
}

export function create(data) {
    return axios.post(API + 'category/', data)
}

export function update(data) {
    return axios.request({
        url: API + 'category/' + data.id,
        data: data,
        method: 'patch'
    })
}

export function removeItem(id) {
    return axios.delete(API + 'category/' + id)
}