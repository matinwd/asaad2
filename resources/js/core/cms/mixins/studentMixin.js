export default {
    methods: {
        fetchStudents(options = {}) {
            return $http.get(options.url || (`/admin/students` + options.query || null));
        },
        addStudent(data) {
            return $http.post(`/admin/students`);
        },
        deleteStudent(id,options = {}) {
            return $http.delete(options.route || `/admin/students/${id}`);
        },
    }
}
