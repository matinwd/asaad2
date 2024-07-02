<template>
    <div class="el-tabs__inner">
        <el-row :gutter="10" class="row-bg">
            <draggable :list="fields"
                       :clone="clone"
                       class="dragArea"
                       :options="dropElementOptions"
                       @start="onStart">
                <el-col :span="24"
                        :class="{ 'is-disabled': checkStopDragCondition(field) }"
                        v-for="(field, index) in fields"
                        :key="index">
                    <el-button class="button__sidebar"
                               type="info">
                        {{ field.text }}
                    </el-button>
                </el-col>
            </draggable>
        </el-row>
    </div>
</template>

<script>
    import {FormBuilder} from './formbuilder'
    import draggable from 'vuedraggable'

    export default {
        name: 'Elements',
        store: ['forms', 'activeForm'],
        components: {draggable},
        data() {
            return {
                fields: FormBuilder.$data.fields,
                dropElementOptions: FormBuilder.$data.dropElementOptions
            };
        },
        methods: {
            clone(field) {
                var newField = {
                    fieldType: field.name,
                    isUnique: field.isUnique,
                    name: field.name + '__' + Date.now()
                }


                // Show placeholder
                if (field.isPlaceholderVisible) {
                    newField ["isPlaceholderVisible"] = false;
                    newField ["placeholder"] = 'متن خود را در اینجا وارد کنید ...';
                }

                // input mask
                if (field.isInputMask) {
                    newField ["isInputMask"] = false;
                    newField ["inputMask"] = '';
                }

                // Decide whether display label, required field, helpblock
                if (field.group == "form") {
                    newField ["label"] = "عنوان فیلد را در اینجا بنویسد ...";
                    newField ["isRequired"] = false;
                }

                if (field.group == "button") {
                    newField ["buttonText"] = "ارسال";
                }

                // Add dummy options for loading the radio/checkbox
                if (field.hasOptions) {
                    newField ["options"] = [
                        {optionLabel: 1, optionValue: "آیتم یک"},
                        {optionLabel: 2, optionValue: "آیتم دو"}
                    ]
                }

                if (newField.fieldType == 'ProvinceCity') {
                    newField ['has_city'] = true;
                    newField ['city_name'] = 'city' + '__' + Date.now();
                    newField ['label'] = 'استان';
                    newField ['city_label'] = 'شهر';
                }


                return newField;
            },
            onStart() {
            },
            checkStopDragCondition(field) {
                var form = this.forms,
                    formArray = [];

                for (var key in form) {
                    formArray.push(form[key]['fieldType'])
                }

                // Check if the fieldname exist in formArray
                // And when the field.isUnique too
                return _.includes(formArray, field.name) && field.isUnique;
            }
        }
    }
</script>

<style lang="scss" scoped>
    .button__sidebar {
        width: 100%;
        margin-bottom: 10px;

        .is-disabled & {
            opacity: 0.4;
        }
    }

    // Display this ghost in <main> only
    .wrapper--forms .sortable__ghost {
        position: relative;
        width: 100%;
        border-bottom: 2px solid black;
        margin-top: 2px;
        margin-bottom: 2px;

        [type="button"] {
            display: none;
        }

        &:before {
            content: "Drag it here";
            background-color: black;
            color: white;
            position: absolute;
            left: 50%;
            font-size: 10px;
            border-radius: 10px;
            line-height: 15px;
            padding: 0 10px;
            top: -6px;
            transform: translateX(-50%);
        }
    }
</style>
