const state = {
    schoolTeachers: {}
};
const actions = {};
const mutations = {
    setSchoolTeachers(state, payload) {
        state.schoolTeachers = payload;
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
