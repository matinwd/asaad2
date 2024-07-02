<template>
  <div>
    <div class="row">
      <div class="form-group col-12">
        <label>تیتر</label>
        <input type="text" class="form-control" v-model="data.title" @keyup="$emit('update:data', data);">
      </div>
      <div class="form-group col-12">
        <label>متن</label>
        <editor api-key="fymce8zuta7bvh8bp4u61nctf3aypy99ysf73akjxvpvhz38" :init="editor_config" v-model="data.text"
                @keyup="$emit('update:data', data);"
                @change="$emit('update:data', data);"/>
      </div>
    </div>
    <div v-for="(item,index) in data.items" class="row"
         :class="{'border-bottom-2 border-bottom-light mb-1': index + 1 < data.items.length}">
      <div class="form-group col-12">
        <label>عنوان اسلایدر {{ index + 1 }}</label>
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
        <label>قیمت (تنها برای اسلایدر محصولات) {{ index + 1 }}</label>
        <input type="text" class="form-control" v-model="item.price" @keyup="$emit('update:data', data);">

      </div>
      <div class="form-group col-12">
        <label>بنر اسلایدر {{ index + 1 }}</label>
        <div class="input-group">
          <input @click="lfmIcon(item)" :value="item.icon.name" class="form-control text-center" readonly @change="$emit('update:data', data);">
          <span class="input-group-btn">
                     <button type="button" @click="lfmIcon(item)" class="btn btn-primary">
                         انتخاب
                     </button>
                   </span>
        </div>
        <span class="text-muted">تصویر PNG</span>
      </div>
      <div class="form-group col-12">
        <label>لینک {{ index + 1 }}</label>
        <input type="text" class="form-control" v-model="item.url" @keyup="$emit('update:data', data);">

      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center">
        <button @click="addEmptyItem" type="button" class="btn btn-success">افزودن اسلایدر جدید</button>
      </div>
    </div>

  </div>
</template>

<script>
    import Editor from '@tinymce/tinymce-vue';

    export default {
        components: {
            'editor': Editor
        },
        props: ['data'],
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
                    automatic_uploads: true,
                    images_upload_url: 'uploader',
                }
            };
        },
        methods: {

          updatePic(image) {
            this.data.data_bg_img = image;
            this.$emit('update:data', this.data);
          },
          addEmptyItem() {
            this.data.items.push({
              user_name: '',
              description: '',
              user_job: '',
              icon: '',
            });
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
          deleteItem(index) {
            this.data.items.splice(index, 1);
            this.$emit('update:data', this.data);
          }
        }
    }
</script>

<style scoped>

</style>