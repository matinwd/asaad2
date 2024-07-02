export default {
    data() {
        return {
            provinces: [],
            cities: [],
            province_id: '',
            city_placeholder: '<< ابتدا استان را انتخاب کنید >>',
        }
    },
    methods: {
        fetchProvinces() {
            axios.get('/api/provinces')
                .then(response => {
                    this.provinces = response.data.data;
                })
                .catch((error) => {
                    this.$root.handleAxiosError(error)
                });
        },
        fetchCities(provinceId) {
            this.cities = [];
            if (provinceId != '') {
                this.city_placeholder = 'لطفا منتظر باشید ...';
                axios.get('/api/provinces/' + provinceId + '/cities')
                    .then(response => {
                        this.cities = response.data.data;
                        this.city_placeholder = '-- انتخاب شهر --';
                    })
                    .catch((error) => {
                        this.$root.handleAxiosError(error)
                    });
            } else {
                this.city_placeholder = '<< ابتدا استان را انتخاب کنید >>';
            }
        },
    }
}
