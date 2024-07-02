<template>
    <div class="row">
        <div class="form-group col-12">
            <label>عنوان (اختیاری)</label>
            <input type="text" class="form-control" v-model="data.title" @keyup="$emit('update:data', data);">
        </div>
        <div class="form-group col-12">
            <label>متن  (اختیاری)</label>
            <textarea class="form-control" v-model="data.text" @keyup="$emit('update:data', data);" @change="$emit('update:data', data);"></textarea>
        </div>
        <div class="form-group col-12">
            <label v-if="data.type == 'image'">فایل تصویر</label>
            <label v-if="data.type == 'sound'">فایل صدا</label>
            <label v-if="data.type == 'video'">فایل ویدئو</label>
            <div class="input-group">
                <input @click="lfm" :value="data.file.name" class="form-control text-center" readonly @change="$emit('update:data', data);">
                <span class="input-group-btn">
                     <button type="button" @click="lfm" class="btn btn-primary">
                         انتخاب
                     </button>
                   </span>
            </div>
        </div>
        <hr>
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
</template>

<script>
    export default {
        props: ['data'],
        methods: {
            lfm() {
                var route_prefix = '/cms/lfm';

                let thiz = this;

                window.open(route_prefix + (this.data.type == 'image' ? '?type=image' : '?type=file'), 'FileManager', 'width=1024,height=600');
                window.SetUrl = function (items) {
                    thiz.data.file = items[0];
                    thiz.$emit('update:data', thiz.data);
                };
            },
        }
    }
</script>

<style scoped>

</style>