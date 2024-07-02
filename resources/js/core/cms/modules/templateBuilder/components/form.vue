<template>
    <section>
        <div class="row">
            <div class="form-group col-12">
                <label>انتخاب فرم از فرم ساز</label>
                <el-select class="w-100 d-block" v-model="data.form_id" :placeholder="loadingForms ? 'در حال واکشی اطلاعات ...' : '-- انتخاب کنید --'" @change="$emit('update:data', data);">
                    <el-option
                            v-for="(form,fIndex) in forms"
                            :key="fIndex"
                            :value="form.id"
                            :label="form.name">
                    </el-option>
                </el-select>
            </div>
            <div class="form-group col-12">
                <label>عنوان (اختیاری)</label>
                <input type="text" class="form-control" v-model="data.title" @keyup="$emit('update:data', data);">
            </div>
            <div class="form-group col-12">
                <label>توضیحات اجمالی (اختیاری)</label>
                <textarea class="form-control" v-model="data.details" @keyup="$emit('update:data', data);"
                          @change="$emit('update:data', data);"></textarea>
            </div>
        </div>
        <div class="row border-bottom-2 border-bottom-light">
            <div class="form-group col-12">
                <label>اندازه در PC</label>
                <select class="form-control" v-model="data.col_lg" @change="$emit('update:data', data);">
                    <option value="12">ستون 12 تایی</option>
                    <option value="11">ستون 11 تایی</option>
                    <option value="10">ستون 10 تایی</option>
                    <option value="9">ستون 9 تایی</option>
                    <option value="8">ستون 8 تایی</option>
                    <option value="7">ستون 7 تایی</option>
                    <option value="6">ستون 6 تایی</option>
                    <option value="5">ستون 5 تایی</option>
                    <option value="4">ستون 4 تایی</option>
                    <option value="3">ستون 3 تایی</option>
                    <option value="2">ستون 2 تایی</option>
                    <option value="1">ستون 1 تایی</option>
                </select>
            </div>
            <div class="form-group col-12">
                <label>اندازه در Tablet</label>
                <select class="form-control" v-model="data.col_md" @change="$emit('update:data', data);">
                    <option value="12">ستون 12 تایی</option>
                    <option value="11">ستون 11 تایی</option>
                    <option value="10">ستون 10 تایی</option>
                    <option value="9">ستون 9 تایی</option>
                    <option value="8">ستون 8 تایی</option>
                    <option value="7">ستون 7 تایی</option>
                    <option value="6">ستون 6 تایی</option>
                    <option value="5">ستون 5 تایی</option>
                    <option value="4">ستون 4 تایی</option>
                    <option value="3">ستون 3 تایی</option>
                    <option value="2">ستون 2 تایی</option>
                    <option value="1">ستون 1 تایی</option>
                </select>
            </div>
            <div class="form-group col-12">
                <label>اندازه در Mobile</label>
                <select class="form-control" v-model="data.col_sm" @change="$emit('update:data', data);">
                    <option value="12">ستون 12 تایی</option>
                    <option value="11">ستون 11 تایی</option>
                    <option value="10">ستون 10 تایی</option>
                    <option value="9">ستون 9 تایی</option>
                    <option value="8">ستون 8 تایی</option>
                    <option value="7">ستون 7 تایی</option>
                    <option value="6">ستون 6 تایی</option>
                    <option value="5">ستون 5 تایی</option>
                    <option value="4">ستون 4 تایی</option>
                    <option value="3">ستون 3 تایی</option>
                    <option value="2">ستون 2 تایی</option>
                    <option value="1">ستون 1 تایی</option>
                </select>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        props: ['data'],
        data() {
            return {
                forms: null,
                loadingForms: false,
            }
        },
        methods: {
            getForms() {
                let thiz = this;
                thiz.loadingForms = true;
                axios.get('/cms/forms')
                    .then(response => {
                        thiz.forms = response.data;
                    })
                    .catch(error => {
                        this.$message.error({
                            center: true,
                            message: 'خطا در ارتباط با سرور.لطفا مجددا تلاش کنید...',
                        });
                    })
                    .finally(_ => {
                        thiz.loadingForms = false;
                    });
            }
        },
        created() {
            this.getForms();
        }
    }
</script>

<style scoped>

</style>