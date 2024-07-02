<template>
    <section>
        <div class="row">
            <div class="form-group col-12">
                <label>عنوان</label>
                <input type="text" class="form-control" v-model="data.title" @keyup="$emit('update:data', data);">
            </div>
            <div class="form-group col-12">
                <label>شرح</label>
                <textarea class="form-control" v-model="data.details" @keyup="$emit('update:data', data);" @change="$emit('update:data', data);"></textarea>
            </div>
        </div>
        <div class="row border-bottom-2 border-bottom-light mb-1">
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
            <div class="form-group col-12" v-if="data.background == 'parallaxie'" >
                <label>تصویر parallaxie</label>
                <pic-single :current-picture="data.data_bg_img" @updatePic="updatePic"></pic-single>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        props: ['data'],
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