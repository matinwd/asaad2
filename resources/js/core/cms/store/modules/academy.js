const state = {
    branches: [],
    grades: [],
    classes: [],
};
const actions = {};
const mutations = {
    setBranches(state, payload) {
        state.branches = payload;
    },
    setGrades(state, payload) {
        state.grades = payload;
    },
    setClasses(state, payload) {
        state.classes = payload;
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
