export default {
    methods: {
        fetchStudentList(options = {}) {
            return axios.get(options.url || `/dashboard/admin/students`);
        },
        fetchUser(){
            return axios.get(options.url || `/dashboard/admin/students`);
        }
    }
}
