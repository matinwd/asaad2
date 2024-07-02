<template>
    <section>
        <div class="row" :class="{'border-bottom-2 border-bottom-light mb-1': index + 1 < list.length}"
             v-for="(pic,index) in list">
            <div class="text-center col-md-2 col-sm-12 pb-1" :style="`visibility: ${pic.url ? 'visible' : 'hidden'}`">
                <img :src="pic.url" alt="pic" width="100px">
            </div>
            <div class="form-group col-md-10 col-sm-12 align-self-center">
                <div class="input-group">
                    <span class="input-group-btn input-group-prepend">
                     <button type="button" @click="lfm(pic)" class="btn btn-primary">
                       <i class="feather icon-image"></i> انتخاب
                     </button>
                   </span>
                    <input @click="lfm(pic)" v-model="pic.name" class="form-control text-center" readonly>
                    <input :value="pic.url" type="hidden" name="pictures[]">
                    <span class="input-group-btn input-group-append">
                        <button @click="deletePic(index)" type="button" class="btn btn-danger">
                        <i class="feather icon-trash"></i> حذف</button>
                   </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <button @click="addEmptyPic" type="button" class="btn btn-success">Add</button>
            </div>
        </div>
        <el-dialog
                title="مدیریت فایل ها"
                :visible.sync="openLfm"
                width="80%"
                append-to-body>
            <iframe src="/cms/lfm?type=image&callback=SetUrl" frameborder="0" height="350" width="100%"></iframe>
        </el-dialog>
    </section>
</template>

<script>

    export default {
        props: {
            currentList: {
                type: Array,
                default: function () {
                    return [];
                },
            },
        },
        data() {
            return {
                openLfm: false,
                list: [],
            }
        },
        methods: {
            lfm(pic) {
                let thiz = this;
                thiz.openLfm = true;
                window.SetUrl = function (items) {
                    thiz.openLfm = false;
                    if (items.length > 0) {
                        items.map(function (item, index) {
                            if (index == 0) {
                                pic.url = items[0].url;
                                pic.name = items[0].name;
                            } else {
                                thiz.list.push({
                                    url: item.url,
                                    name: item.name,
                                });
                            }
                        });
                    } else {
                        pic.url = items[0].url;
                        pic.name = items[0].name;
                    }
                    thiz.$emit('updateItems', thiz.list);
                };
            },
            addEmptyPic() {
                this.list.push({
                    url: '',
                    name: '',
                });
            },
            deletePic(index) {
                if (this.list.length > 1)
                    this.list.splice(index, 1);
                else{
                    this.list.splice(index, 1);
                    this.list.push({
                        url: '',
                        name: '',
                    });
                }
            },
        },
        created() {
            if (this.currentList.length > 0)
                this.list = this.currentList;
            else
                this.addEmptyPic();
        }
    }
</script>

<style scoped>

</style>