export default {
    data() {
        return {
            errors: {}
        }
    },
    methods: {
        hasError(field) {
            if (this.errors[field]) {
                return typeof this.errors[field] === "string";
            }
            return false;
        },
        emptyValidator() {
            this.errors = {};
        },
        error(field) {
            if (this.errors[field]) {
                return this.errors[field][0];
            }
        },

        handleValidation(error, message = null) {
            this.errors = error.response.data.errors;
            if (message)
                this.$message.error({
                    center: true,
                    message: message,
                });
        }
    },
};
