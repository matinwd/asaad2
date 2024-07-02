<template>
    <div>
        <el-button @click="visibleModal = true" type="primary">نمایش</el-button>
        <el-dialog
                :visible.sync="visibleModal"
                width="80%">
            <el-table :data="[this.formData]">
                <el-table-column
                        v-for="(input,index) in this.inputs"
                        :key="index"
                        :prop="index"
                        :label="input">
                </el-table-column>
            </el-table>
            <div v-if="files_count.length > 0" class="mt-3">
                <h3>فایل ها</h3>
                <a v-for="(file,index) in this.files" :href="file" class="btn btn-link btn-light m-2" target="_blank">{{ inputs[index] }} ({{ index }})</a>
            </div>
            <div class="dialog-footer" slot="footer">
                <el-button @click="visibleModal = false">بستن</el-button>
            </div>
        </el-dialog>
    </div>
</template>

<script>
    export default {
        props: ['formData','inputs','files'],
        data() {
            return {
                visibleModal: false,
                files_count: 0,
            };
        },
        created() {
            this.files_count = Object.values(this.files);
        },
        methods: {
            showData() {
                this.visibleModal = true;
            },
        }
    }
</script>