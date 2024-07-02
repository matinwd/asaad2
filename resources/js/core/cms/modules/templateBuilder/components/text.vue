<template>
    <div class="row">
        <div class="form-group col-12">
            <label>تیتر</label>
            <input type="text" class="form-control" v-model="data.title" @keyup="$emit('update:data', data);">
        </div>
        <div class="form-group col-12">
            <label>متن</label>
            <editor api-key="fymce8zuta7bvh8bp4u61nctf3aypy99ysf73akjxvpvhz38"
                    :init="editor_config"
                    v-model="data.text"
                    @keyup="$emit('update:data', data);"
                    @change="$emit('update:data', data);"/>
        </div>
        <hr>
        <div class="form-group col-12">
            <label>پس زمینه</label>
            <select class="form-control" v-model="data.background" @change="$emit('update:data', data);">
                <option value="_">ساده</option>
                <option value="white-bg">سفید</option>
                <option value="grey-bg">طوسی</option>
                <option value="dark-bg">تیره/مشکی</option>
                <option value="theme-bg">برند-Primary</option>
                <option value="transparent-bg">شفاف</option>
                <option value="parallaxie">parallaxie - تصویر ثابت</option>
            </select>
        </div>
        <div class="form-group col-12" v-if="data.background == 'parallaxie'">
            <label>تصویر parallaxie</label>
            <pic-single :current-picture="data.data_bg_img" @updatePic="updatePic"></pic-single>
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
    import Editor from '@tinymce/tinymce-vue'

    export default {
        props: ['data'],
        components: {
            'editor': Editor
        },
        data() {
            return {
                editor_config: {
                    language: 'fa',
                    directionality: "rtl",
                    path_absolute: "/",
                    relative_urls: false,
                    plugins: [
                        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                        "searchreplace wordcount visualblocks visualchars code fullscreen",
                        "insertdatetime media nonbreaking save table directionality",
                        "emoticons template paste textpattern"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | rtl ltr | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | code",
                    file_picker_callback: function (callback, value, meta) {
                        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                        var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                        var cmsURL = '/cms/lfm?editor=' + meta.fieldname;
                        if (meta.filetype == 'image') {
                            cmsURL = cmsURL + "&type=Images";
                        } else {
                            cmsURL = cmsURL + "&type=Files";
                        }

                        tinyMCE.activeEditor.windowManager.openUrl({
                            url: cmsURL,
                            title: 'مدیریت فایل ها',
                            width: x * 0.8,
                            height: y * 0.8,
                            resizable: "yes",
                            close_previous: "no",
                            onMessage: (api, message) => {
                                callback(message.content);
                            }
                        });
                    },
                    automatic_uploads: true,
                    images_upload_url: 'uploader',
                }
            };
        },
        mounted() {
        },
        methods: {
            updatePic(image) {
                this.data.data_bg_img = image;
                this.$emit('update:data', this.data);
            }
        }
    }
</script>

<style scoped>

</style>