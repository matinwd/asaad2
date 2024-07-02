<template>
    <div>
		<div class="custom-file">
			<input type="file" class="custom-file-input" id="customFile">
			<label class="custom-file-label" for="customFile">انتخاب فایل برای بارگزاری</label>
		</div>
	</div>
</template>

<script>
  export default {
    name: 'FileUploader',
    props: ['currentField']
  }
</script>