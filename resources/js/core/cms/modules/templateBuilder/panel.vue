<template>
    <div class="row" id="tbPanel">
        <div class="col-md-8 col-sm-12 order-md-1 order-sm-2">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">محتوا</h5>
                </div>
                <div class="card-body">
                    <draggable class="list-group" v-model="templateBlocks"
                               v-bind="dragOptions"
                               @start="drag = true"
                               @end="drag = false">
                        <transition-group type="transition" :name="!drag ? 'flip-list' : null">
                            <li class="list-group-item d-flex justify-content-between"
                                v-for="(block,i) in templateBlocks" :key="`item-${i}`">
                                    <span>
                                        <i class="feather icon-menu mr-50"></i>
                                        {{ block.title }}
                                    </span>
                                <div>
                                    <button type="button" class="btn btn-light bg-white btn-sm"
                                            @click="configBlock(block,i)">
                                        <i class="feather icon-sliders text-primary"></i>
                                    </button>
                                    <button type="button" class="btn btn-light bg-white btn-sm"
                                            @click="deleteItem(templateBlocks,i)">
                                        <i class="feather icon-trash text-danger"></i>
                                    </button>
                                </div>
                            </li>
                        </transition-group>
                    </draggable>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 order-md-2 order-sm-1">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">بخش ها</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between" v-for="(block,i) in blocks">
                            {{ block.title }}
                            <button type="button" class="btn btn-secondary btn-sm" @click="addBlock(block)">
                                <i data-feather="plus"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <el-dialog
                :id="this.modalId"
                :key="this.modalId"
                :title="activeBlock.title"
                :visible.sync="visibleModal"
                width="80%">
            <component :is="activeBlock.component" :data="activeBlock.data"
                       :data.sync="activeBlock.data"></component>
            <div class="dialog-footer" slot="footer">
                <el-button @click="visibleModal = false">منصرف شدم</el-button>
                <el-button @click="updateBlock" type="primary">بروزرسانی</el-button>
            </div>
        </el-dialog>
        <textarea :name="inputName" class="d-none">
            {{ templateBlocks }}
        </textarea>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        name: 'tbPanel',
        props: {
            modalId: {
                type: String,
                default: 'confModal'
            },
            inputName: {
                type: String,
                default: 'content'
            },
            currentTemplateBlocks: {
                type: Array,
                default: function () {
                    return [];
                },
            },
            currentBlocks: {
                type: Array,
                default: function () {
                    return [];
                },
            },
            currentBlocks: {
                type: Object,
                default: function () {
                    return {};
                },
            },
        },
        components: {
            draggable,
        },
        data() {
            return {
                visibleModal: false,
                activeBlockIndex: -1,
                activeBlock: {
                    data: {}
                },
                drag: false,
                blocks: [],
                templateBlocks: [],
            }
        },
        methods: {
            addBlock(block) {
                let blockTmp = _.cloneDeep(block);
                this.templateBlocks.push(_.cloneDeep(block));
            },
            deleteItem(list, index) {
                list.splice(index, 1);
            },
            configBlock(block, index) {
                this.activeBlock = _.cloneDeep(block);
                this.activeBlockIndex = index;
                this.visibleModal = true;
            },
            updateBlock() {
                this.templateBlocks[this.activeBlockIndex] = this.activeBlock;
                this.activeBlock = {
                    data: {}
                };
                this.visibleModal = false;
            }
        },
        computed: {
            dragOptions() {
                return {
                    animation: 200,
                    group: "description",
                    disabled: false,
                    ghostClass: "ghost"
                };
            }
        },
        created() {
            if (this.currentTemplateBlocks)
                this.templateBlocks = this.currentTemplateBlocks;
            if (this.currentBlocks)
                this.blocks = this.currentBlocks;
        }
    }
</script>

<style scoped>
    .tox-tinymce-aux{
        z-index : 130000000 !important;
    }
    .flip-list-move {
        transition: transform 0.5s;
    }

    .no-move {
        transition: transform 0s;
    }

    .ghost {
        opacity: 0.5;
        background: #c8ebfb;
    }

    .list-group-item {
        cursor: move;
    }

    .list-group-item i.icon-menu {
        cursor: pointer;
    }
</style>