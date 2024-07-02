const state = {
    students: [],
    student: {}
};
const actions = {};
const mutations = {
    setStudents(state, payload) {
        state.students = payload;
    },
    setStudent(state, payload) {
        state.student = payload;
    },
};
const getters = {};

export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
};
