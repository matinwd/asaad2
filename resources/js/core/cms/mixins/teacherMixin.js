export default {
    methods: {
        fetchSchoolTeachers(schoolId) {
            return $http.get(`/admin/teachers?my_school_id=${schoolId}`);
        }
    }
}
