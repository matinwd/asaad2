const state = {
    school: {}
};
const actions = {};
const mutations = {
    setSchool(state, payload) {
        state.school = payload;
    }
};
const getters = {};

export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
};
