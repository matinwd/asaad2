<!--https://vuejsexamples.com/form-builder-with-vue-js/-->
<template>
    <div class="main__wrapper">
        <textarea name="content" class="d-none" dir="ltr">{{ forms }}</textarea>

        <el-container>
            <el-main :style="cssProps">
                <div class="wrapper--forms">
                    <!-- Show empty state if empty -->
                    <div v-if="forms.length == 0" class="emptyState">
                        <p class="emptyState__p">یکی از اجرا را بکشید و در اینجا رها کنید</p>
                    </div>

                    <draggable :list="forms"
                               class="dragArea"
                               :options="sortElementOptions">

                        <!-- The form elements starts (on the right) -->
                        <div v-for="(form, index) in forms"
                             :key="index"
                             v-bind="form"
                             class="form__group"
                             :class="{ 'is--active': form === activeForm  }">

                            <span class="form__selectedlabel">{{ form.fieldType }}</span>

                            <div @click="editElementProperties(form)">
                                <label class="form__label" v-model="form.label" v-show="form.hasOwnProperty('label')">{{
                                    form.label }}</label>

                                <component :is="form.fieldType"
                                           :currentField="form"
                                           class="form__field">
                                </component>
                            </div>

                            <!-- Actions list -->
                            <div class="form__actiongroup">
                                <el-button circle size="mini" type="primary" icon="el-icon-rank"
                                           class="form__actionitem--move"></el-button>

                                <el-button-group class="form__actionlist">
                                    <el-button size="mini"
                                               type="primary"
                                               icon="el-icon-plus"
                                               @click="cloneElement(index, form)"
                                               v-show="!form.isUnique"></el-button>
                                    <el-button size="mini"
                                               type="primary"
                                               icon="el-icon-delete"
                                               @click="deleteElement(index)"></el-button>
                                </el-button-group>
                            </div>
                        </div>
                    </draggable>
                </div>

            </el-main>

            <el-aside class="wrapper--sidebar" width="450px">
                <el-tabs type="border-card" v-model="activeTabForFields">
                    <el-tab-pane name="elements" label="اجزا">
                        <elements/>
                    </el-tab-pane>

                    <el-tab-pane name="properties" label="ویژگی ها">
                        <properties v-show="Object.keys($store.activeForm).length > 0"></properties>
                    </el-tab-pane>

                    <!--
                                        <el-tab-pane name="designs" label="Styles">
                                            <theming></theming>
                                        </el-tab-pane>
                    -->
                </el-tabs>
            </el-aside>
        </el-container>
    </div>
</template>

<script>
    import {FormBuilder} from './form_elements/formbuilder'

    export default {
        name: 'FormBuilder',
        props: {
            currentFormItems: {
                type: Array,
                default: function () {
                    return [];
                },
            },
        },
        store: ['forms', 'activeForm', 'activeTabForFields', 'themingVars'],
        data() {
            return {
                sortElementOptions: FormBuilder.$data.sortElementOptions
            };
        },
        computed: {
            cssProps() {
                // Return an object that will generate css properties key
                // to match with the themingVars
                //
                // Example output: { '--theme-primary-color': this.themingVars.primaryColor }
                var result = {},
                    themingVars = this.themingVars;

                for (var v in themingVars) {
                    if (themingVars.hasOwnProperty(v)) {
                        var newV = "--theme-" + _.kebabCase(v),
                            suffix = "";

                        // Add px to the value if the default value contain 'px'
                        if (_.includes(newV, 'size')) suffix = "px"
                        else if (_.includes(newV, 'margin')) suffix = "px"
                        else if (_.includes(newV, 'radius')) suffix = "px"

                        result [newV] = themingVars[v] + suffix;
                    }
                }

                return result;
            }
        },
        created() {
            if (this.currentFormItems) {
                this.$store.forms = this.currentFormItems;
            }
        },
        components: FormBuilder.$options.components,
        methods: {
            deleteElement(index) {
                FormBuilder.deleteElement(index)
            },
            cloneElement(index, form) {
                FormBuilder.cloneElement(index, form)
            },
            editElementProperties(form) {
                FormBuilder.editElementProperties(form)
            }
        }
    }
</script>


<style lang="scss" scoped>
    @import './assets/scss/main.scss';
</style>

<style lang="scss" scoped>
    .el-button--primary {
        border-color: #00448d !important;
        background-color: #00448d !important;
    }

    .main__wrapper {
        height: 100%;
    }

    .wrapper--forms {
        height: 100%;
        padding: 1rem !important;
    }

    .emptyState {
        position: absolute;
        z-index: 1;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }

    .dragArea {
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        min-height: 100%;
        z-index: 2;
    }

    .form__selectedlabel {
        display: none;
        background: lighten(black, 20%);
        padding: 3px 5px !important;
        color: white;
        font-size: 10px !important;
        position: absolute;
        top: -17px;
        right: 15px;
    }

    .form__actionitem--move {
        position: absolute;
        right: -14px;
        top: 50%;
        transform: translateY(-50%);
        visibility: hidden;

        &:active, &:focus, &:hover {
            border-color: lighten(black, 50%);
            background: lighten(black, 50%);
        }
    }

    .form__actionlist {
        position: absolute;
        margin-top: 10px;
        visibility: hidden;
        z-index: 3;
        right: 0;
        box-shadow: 4px 4px 0 0 lighten(black, 80%);
        border-radius: 2px;
    }

    .form__group {
        margin-bottom: 1.5rem !important;
        border: 2px solid transparent !important;
        position: relative;
        padding: .5rem !important;

        &:hover {
            border-color: lighten(black, 80%) !important;

            .form__actionitem--move {
                visibility: visible !important;
            }
        }

        &.is--active {
            border-color: lighten(black, 50%) !important;
            background: lighten(black, 95%) !important;

            .form__actionlist {
                visibility: visible;
            }

            .form__selectedlabel {
                display: inline-block;
            }
        }
    }

    .el-checkbox {
        margin-left: 1.5rem !important;
    }

    .el-checkbox__label {
        padding-right: .5rem !important;
    }

    .el-form-item__content ul {
        list-style: none !important;

        .el-input__inner {
            height: 42px !important;
            line-height: 42px !important;
        }
    }

</style>

