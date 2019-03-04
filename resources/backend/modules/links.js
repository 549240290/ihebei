/*
|-------------------------------------------------------------------------------
| VUEX modules/cafes.js
|-------------------------------------------------------------------------------
| The Vuex data store for the cafes
|status = 0 -> 数据尚未加载
|status = 1 -> 数据开始加载
|status = 2 -> 数据加载成功
|status = 3 -> 数据加载失败
*/

import API from '~/api/links.js';

export const links = {
    state: {
        links: [],
        linksLoadStatus: 0,
        link: {},
        linkLoadStatus: 0,
    },
    actions: {
        loadLinks({ commit }) {
            commit('setLinksLoadStatus', 1);
            API.getLinks().then(function(response) {
                commit('setLinks', response.data);
                commit('setLinksLoadStatus', 2);
            }).catch(function() {
                commit('setLinks', []);
                commit('setLinksLoadStatus', 3);
            });
        },
        loadLink({ commit }, data) {
            commit('setLinkLoadStatus', 1);
            API.getLink(data.id).then(function(response) {
                commit('setLink', response.data);
                commit('setLinkLoadStatus', 2);
            }).catch(function() {
                commit('setLink', {});
                commit('setLinkLoadStatus', 3);
            });
        }
    },
    mutations: {
        setLinksLoadStatus(state, status) {
            state.LinksLoadStatus = status;
        },

        setLinks(state, links) {
            state.links = links;
        },

        setLinkLoadStatus(state, status) {
            state.linkLoadStatus = status;
        },

        setLink(state, link) {
            state.link = link;
        }
    },
    getters: {
        getLinksLoadStatus(state) {
            return state.linksLoadStatus;
        },

        getLinks(state) {
            return state.links;
        },

        getLinkLoadStatus(state) {
            return state.linkLoadStatus;
        },

        getLink(state) {
            return state.link;
        }
    }
}