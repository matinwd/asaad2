<template>
  <div>
    <el-select v-model="value" placeholder="در حال بارگزاری ... ">
    </el-select>
    <div v-if="currentField.has_city" class="mt-1">
      <label class="d-block">شهر</label>
      <el-select v-model="value" placeholder="در حال بارگزاری ... ">
      </el-select>
    </div>
  </div>
</template>


<script>
  export default {
    name: 'province_city',
    props: ['currentField'],
    data(){
    	return {
    		value: ""
    	}
    }
  }
</script>