export default {
    methods: {
        fetchSchool() {
            return axios.get('/api/profile/my-school');
        }
    }
}
