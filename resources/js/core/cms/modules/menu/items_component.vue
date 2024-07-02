<template>
    <!--    http://booking-core.test/admin/module/core/menu/edit/1-->
    <!--    https://github.com/phphe/vue-draggable-nested-tree#template-->
    <!--    https://codepen.io/phphe/pen/KRapQm-->
    <div class="card">
        <div class="card-header">
            <div class="form-group col-md-4 col-sm-12">
                <label>عنوان</label>
                <input type="text" v-model="custom_name" class="form-control text-center">
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <label>پیوند</label>
                <input dir="ltr" type="text" v-model="custom_url" class="form-control text-center">
            </div>
            <div class="col-md-4 col-sm-12 text-center">
                <button @click="addItem" type="button" class="btn btn-success">افزودن به لیست</button>
            </div>
        </div>
        <div class="card-body">
            <div class="menu-items-zone" dir="ltr">
                <Draggable-Tree :data="items" draggable cross-tree @change="parseMenuItems(items)">
                    <div slot-scope="{data,store}" class="nestable-item-content" v-if="!data.isDragPlaceHolder">
                        <div class="menu-title">{{data.name}}
                            <span class="menu-right">
                            <i class="feather ml-1"
                               :class="{'icon-chevron-down' : !data._open,'icon-chevron-up' : data._open}"
                               @click="toogleItem(data)"></i>
                            <i class="feather icon-trash ml-1" @click="deleteMenuItem($event,data,store)"></i>
                        </span>
                        </div>
                        <div class="menu-info" v-show="data._open">
                            <div class="form-group">
                                <label>نام</label>
                                <input @change="parseMenuItems(items)" type="text" v-model="data.name"
                                       class="form-control input-sm text-center">
                            </div>
                            <div class="form-group">
                                <label>پیوند</label>
                                <input @change="parseMenuItems(items)" type="text" v-model="data.url"
                                       class="form-control input-sm text-center" dir="ltr">
                            </div>
                            <!--<div v-if="data.parent && data.parent.isRoot && data.children.length > 0" class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input v-model="data.is_mega" class="custom-control-input" type="checkbox" :id="`menu-${data._id}`"/>
                                    <label class="custom-control-label" :for="`menu-${data._id}`">Mega</label>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </Draggable-Tree>
                <input type="hidden" :name="inputName" :value="json">
            </div>
        </div>
    </div>
</template>

<script>
    import {DraggableTree} from 'vue-draggable-nested-tree'

    export default {
        props: ['inputName', 'currentItems'],
        components: {
            DraggableTree
        },
        data() {
            return {
                json: '',
                custom_name: '',
                custom_url: '',
                items: [],
            }
        },
        methods: {
            toogleItem(item) {
                if (item._open) {
                    item._open = false;
                } else {
                    item._open = true;
                }
            },
            addItem() {
                if (!this.custom_name) return;

                this.items.push({
                    name: this.custom_name,
                    url: this.custom_url,
                    _open: false,
                });

                this.custom_name = '';
                this.custom_url = '';
                this.parseMenuItems(this.items);
            },
            parseMenuItems(origins) {
                var items = [];
                for (var i = 0; i < origins.length; i++) {
                    var item = origins[i];
                    var tmp = Object.assign({}, item);

                    delete tmp._vm;
                    delete tmp.parent;
                    delete tmp.style;
                    delete tmp.style;
                    delete tmp.innerStyle;
                    delete tmp.innerBackClass;
                    delete tmp.innerBackStyle;
                    delete tmp._id;
                    delete tmp._treeNodePropertiesCompleted;
                    delete tmp.class;
                    delete tmp.innerClass;
                    delete tmp.active;
                    delete tmp.open;
                    // delete tmp._open;

                    if (tmp.children && tmp.children.length > 0) {
                        tmp.children = this.parseMenuItems(tmp.children);
                    }

                    items.push(tmp);
                }
                this.json = JSON.stringify(items);
                return items;
            },
            deleteMenuItem(e, item, tree) {
                e.preventDefault();
                tree.deleteNode(item);
                this.parseMenuItems(this.items);
            }
        },
        created() {
            this.items = _.cloneDeep(this.currentItems);
            this.json = JSON.stringify(this.items);
        }
    }
</script>

<style lang="scss">
    @import "./_menu.scss";
</style>