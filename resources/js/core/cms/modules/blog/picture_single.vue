<template>
    <div>
        <div class="form-group" v-if="type != 'inline'">
            <img v-if="url" :src="url" alt="pic" width="30%">
            <div class="input-group mt-2">
                <span class="input-group-btn input-group-prepend">
                    <button type="button" @click="lfm" class="btn btn-primary">
                     <i class="feather icon-image"></i> انتخاب
                 </button>
           </span>
                <input @click="lfm" v-model="name" class="form-control text-center" readonly>
                <input :value="url" type="hidden" :name="inputName">
                <span v-if="url" class="input-group-btn input-group-append">
                    <button type="button" @click="empty" class="btn btn-danger">
                        <i class="feather icon-trash"></i> حذف
                    </button>
                </span>
            </div>
        </div>
        <div class="form-group" v-if="type == 'inline'">
            <input :value="url" type="hidden" :name="inputName">
            <el-popover
                    :placement="placement"
                    :width="popoverSize"
                    trigger="hover" v-if="url">
                <div class="text-center">
                    <img :src="url" alt="pic" width="100%">
                    <strong class="d-block my-1">{{ name }}</strong>
                </div>
                <div class="text-center" slot="reference">
                    <img class="mb-1" :src="url" alt="pic" :width="picSize">
                </div>
            </el-popover>
            <button v-if="!url" type="button" @click="lfm" class="btn btn-primary">
                <i class="feather icon-image"></i>
            </button>
            <button v-if="url" type="button" @click="empty" class="btn btn-danger">
                <i class="feather icon-trash"></i>
            </button>
        </div>
        <el-dialog
                title="مدیریت فایل"
                :visible.sync="openLfm"
                width="80%"
                append-to-body>
            <iframe src="/cms/lfm?type=image&callback=SetUrl" frameborder="0" height="350" width="100%"></iframe>
        </el-dialog>
    </div>
</template>

<script>

    export default {
        props: {
            currentPicture: {},
            inputName: {
                type: String,
                default: 'picture',
            },
            type: {
                type: String,
                default: 'form',
            },
            picSize: {
                type: Number,
                default: 50,
            },
            popoverSize: {
                type: Number,
                default: 300,
            },
            placement: {
                type: String,
                default: 'top-start',
            },
            model: {
                type: String,
                default: null,
            },
        },
        data() {
            return {
                name: '',
                url: '',
                openLfm: false,
            }
        },
        methods: {
            empty() {
                this.name = '';
                this.url = '';
                this.$emit('updatePic', null);
            },
            lfm() {
                let thiz = this;
                thiz.openLfm = true;
                window.SetUrl = function (items) {
                    thiz.openLfm = false;
                    thiz.url = items[0].url;
                    thiz.name = items[0].name;
                    thiz.$emit('updatePic', thiz.url);
                };
            },
        },
        created() {
            if (this.currentPicture) {
                if (typeof this.currentPicture == "object") {
                    this.url = this.currentPicture.url;
                    this.name = this.currentPicture.name;
                } else {
                    this.url = this.currentPicture;
                    this.name = this.url.split('/')[this.url.split('/').length - 1];
                }
            }
            if (this.model) {
                if (typeof this.model == "object") {
                    this.url = this.model.url;
                    this.name = this.model.name;
                } else {
                    this.url = this.model;
                    this.name = this.url.split('/')[this.url.split('/').length - 1];
                }
            }
        }
    }
</script>

<style scoped>
    .el-dialog__body {
        padding: 0;
    }
</style>