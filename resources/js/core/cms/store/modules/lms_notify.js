const state = {
    notifications: {},
};
const actions = {};
const mutations = {
    setNotifications(state, payload) {
        state.notifications = payload;
    },
};
const getters = {
    notifications: state => {
        return state.notifications;
    }
};

export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
};
