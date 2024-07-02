<template>
    <section>
        <div v-for="(item,index) in data.items" class="row"
             :class="{'border-bottom-2 border-bottom-light mb-1': index + 1 < data.items.length}">
            <div class="form-group col-12">
                <label>آیکون ویژگی {{ index + 1 }}</label>
              <textarea type="text" class="form-control" v-model="item.icon" @keyup="$emit('update:data', data);"></textarea>
                <span class="text-muted">SVG</span>
            </div>
            <div class="form-group col-12">
                <label>عنوان ویژگی {{ index + 1 }}</label>
              <div class="input-group">
                    <span class="input-group-btn">
                     <button type="button" @click="deleteItem(index)" class="btn btn-danger">
                         <i class="feather icon-trash"></i>
                     </button>
                   </span>
                <input type="text" class="form-control" v-model="item.title" @keyup="$emit('update:data', data);">
              </div>
            </div>
            <div class="form-group col-12">
                <label>توضیحات ویژگی {{ index + 1 }}</label>
                <input type="text" class="form-control" v-model="item.description" @keyup="$emit('update:data', data);">
            </div>
            <div class="form-group col-12">
                <label>پیوند ویژگی {{ index + 1 }}</label>
                <input dir="ltr" type="url" class="form-control" v-model="item.url" @keyup="$emit('update:data', data);">
            </div>
        </div>
      <div class="row">
        <div class="col-12 text-center">
          <button @click="addEmptyItem" type="button" class="btn btn-success">افزودن آکاردئون جدید</button>
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
            },

          lfmIcon(item) {
            var route_prefix = '/cms/lfm';

            let thiz = this;

            window.open(route_prefix + '?type=image', 'FileManager', 'width=1024,height=600');
            window.SetUrl = function (items) {
              item.icon = items[0];
              thiz.$emit('update:data', thiz.data);
            };
          },
          addEmptyItem() {
            this.data.items.push({
              title: '',
              description: '',
              url: '',
              icon: '',
            });
            this.$emit('update:data', this.data);
          },
          deleteItem(index) {
            this.data.items.splice(index, 1);
            this.$emit('update:data', this.data);
          }
        }
    }
</script>

<style scoped>

</style>