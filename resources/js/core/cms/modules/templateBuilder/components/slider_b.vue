<template>
  <div>
    <div v-for="(item,index) in data.items"  class="row"
      :class="{'border-bottom-2 border-bottom-light mb-1': index + 1 < data.items.length}">
      <div class="form-group col-12">
        <label>ایکون SVG {{ index + 1 }}</label>
        <input type="text" class="form-control" v-model="item.icon" @keyup="$emit('update:data', data);">
        <span class="text-muted">SVG</span>
      </div>
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
        <label>لینک اسلایدر {{ index + 1 }}</label>
        <input type="text" class="form-control" v-model="item.url" @keyup="$emit('update:data', data);">
      </div>

  </div>
    <div class="row">
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
    </div>
</template>

<script>
    export default {
        props: ['data'],
        data() {
            return {
                images: []
            };
        },
        methods: {
          addEmptyItem() {
            this.data.items.push({
              icon: '',
              title: '',
              url: '',
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