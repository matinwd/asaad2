<template>
    <section>
        <div v-for="(item,index) in data.items" class="row"
             :class="{'border-bottom-2 border-bottom-light mb-1': index + 1 < data.items.length}">
            <div class="form-group col-md-6">
                <label>عنوان شمارنده {{ index + 1 }}</label>
                <input type="text" class="form-control" v-model="item.title" @keyup="$emit('update:data', data);">
            </div>
            <div class="form-group col-md-6">
                <label>عدد شمارنده {{ index + 1 }}</label>
                <input type="text" class="form-control" v-model="item.count" @keyup="$emit('update:data', data);">
            </div>
            <div class="form-group col-md-6">
                <label>متن شمارنده {{ index + 1 }}</label>
                <input type="text" class="form-control" v-model="item.text" @keyup="$emit('update:data', data);">
            </div>
            <div class="form-group col-md-6">
                <label>واحد شمارنده {{ index + 1 }}</label>
                <input type="text" class="form-control" v-model="item.unit" @keyup="$emit('update:data', data);">
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