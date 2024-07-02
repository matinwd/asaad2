export default {
    methods: {
        fetchMajors(branch = 1) {
            return axios.get(`/api/majors?search=branch:${branch}&orderBy=name`);
        },
        fetchSubjects(class_id, branch = 0, major_id = null) {
            let url = `/api/subjects?class_id=${class_id}`;

            if (branch != 0)
                url += `&branch=${branch}&major_id=${major_id}`;

            return axios.get(url);
        },
        fetchGroupsByClassId(school_id, class_id, major_id = null) {
            let url = `/api/groups?school_id=${school_id}&class_id=${class_id}`;

            if (major_id != null)
                url += `&major_id=${major_id}`;

            return axios.get(url);
        },
        fetchClasses(degree = 0) {
            /*
            * degrees
            * ابتدایی 0
            * متوسطه اول 1
            * متوسطه دوم 2
            */
            return axios.get(`/api/classes?search=degree:${degree}`);
        },
        fetchGroups() {
            return axios.post(`/api/admin/groups`);
        }
    }
}
