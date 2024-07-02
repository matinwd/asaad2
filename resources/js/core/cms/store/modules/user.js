const state = {
    users: {
        data: [],
        meta: {},
    },
    user: {},
    userLoading : true,
    userLoadingText : "در حال بارگیری ...",
};
const actions = {};
const mutations = {
    setUsers(state, payload) {
        state.users = payload;
    },
    setUser(state, payload) {
        state.user = payload;
    },
    setUserLoadingText(state, payload){
        state.userLoadingText = payload;
    },
    setUserLoading(state, payload){
        state.userLoading = payload;
    },
};
const getters = {
    users: state => {
        return state.users;
    },
    user: state => {
        return state.user;
    }
};

export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
};
