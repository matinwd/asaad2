export default {
    methods: {
        fetchCourseList(role = 'admin', options = {}) {
            return $http.get(options.url || `/${role}/courses`);
        },
        fetchCourse(id, role = 'admin', options = {}) {
            return $http.get(options.url || (`/${role}/courses/${id}` + options.query || null));
        },
        addCourse(data) {
            return $http.post('/admin/courses', data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });
        },
        updateCourse(data, id) {
            data.append('_method', 'patch');
            return $http.post(`/admin/courses/${id}`, data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });
        },
        deleteCourse(id) {
            return $http.delete(`/admin/courses/${id}`);
        },
        fetchSections(courseId, options = {}) {
            return $http.get(options.url || (`/teacher/courses/${courseId}/sections` + options.query || null));
        },
        addSection(courseId,data) {
            return $http.post(`/teacher/sections?course_id=${courseId}`, data);
        },
        addEpisode(sectionId,data) {
            return $http.post(`/teacher/episodes?section_id=${sectionId}`, data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });
        },
        updateSection(id, data) {
            return $http.patch(`/teacher/sections/${id}`, data);
        },
        updateEpisode(id, data) {
            return $http.patch(`/teacher/episodes/${id}`, data);
        },
        deleteSection(id) {
            return $http.delete(`/teacher/sections/${id}`);
        },
        deleteEpisode(id) {
            return $http.delete(`/teacher/episodes/${id}`);
        },
    }
}
