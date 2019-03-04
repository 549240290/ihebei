/*
|-------------------------------------------------------------------------------
| VUEX modules/user.js
|-------------------------------------------------------------------------------
| The Vuex data store for the cafes
|status = 0 -> 数据未加载
|status = 1 -> 数据加载成功
|status = 2 -> 数据加载失败
*/

import { getUser } from '~/api/user.js';

export const user = {
    state: {
        user: {},
        userLoadStatus: 0
    },
    actions: {
        loadUser({ commit }) {
            getUser().then(function(response) {
                commit('setUser', response.data);
                commit('setUserLoadStatus', 1);
            }).catch(function() {
                commit('setUser', {});
                commit('setUserLoadStatus', 2);
            });
        },
        destroyUser({ commit }) {

        }
    },
    mutations: {
        setUserLoadStatus(state, status) {
            state.userLoadStatus = status;
        },

        setUser(state, data) {
            state.user = data;
        }
    },
    getters: {
        getUserLoadStatus(state) {
            return state.userLoadStatus;
        },

        getUser(state) {
            return state.user;
        }
    }
}