const state = {
    courses: {
        data: []
    },
    courseLoading : true,
    courseLoadingText : "در حال بارگیری ...",
    sections: [],
    sectionLoading : true,
    sectionLoadingText : "در حال بارگیری ...",
    course: {},
    episodeTypes: {}
};
const actions = {};
const mutations = {
    setCourses(state, payload) {
        state.courses = payload;
    },
    setCourseLoadingText(state, payload){
        state.courseLoadingText = payload;
    },
    setCourseLoading(state, payload){
        state.courseLoading = payload;
    },
    setSectionLoadingText(state, payload){
        state.sectionLoadingText = payload;
    },
    setSectionLoading(state, payload){
        state.sectionLoading = payload;
    },
    setSections(state, payload) {
        state.sections = payload;
    },
    setCourse(state, payload) {
        state.course = payload;
    },
    setEpisodeTypes(state, payload) {
        state.episodeTypes = payload;
    },
};
const getters = {
    courses: state => {
        return state.courses;
    },
    sections: state => {
        return state.sections;
    }
};

export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters
};
