<template>
    <div class="el-tabs__inner">
        <el-form :model="fieldProperties"
                 :rules="rules"
                 :label-position="labelPosition"
                 ref="fieldProperties">

            <el-form-item label="نام لاتین - name"
                          v-show="activeForm.hasOwnProperty('name')">
                <el-input v-model="activeForm.name">{{activeForm.name}}</el-input>
            </el-form-item>

            <el-form-item label="عنوان"
                          v-show="activeForm.hasOwnProperty('label')">
                <el-input v-model="activeForm.label">{{activeForm.label}}</el-input>
            </el-form-item>

            <el-form-item label="همراه با شهر ؟"
                          v-show="activeForm.hasOwnProperty('has_city')">
                <el-switch v-model="activeForm.has_city"></el-switch>
            </el-form-item>

            <!-- Show only when 'isPlacehodlerVisible' key exist -->
            <el-form-item label="فیلد شما نیاز به مثال و راهنما دارد ؟"
                          v-show="activeForm.hasOwnProperty('isPlaceholderVisible')">
                <el-switch v-model="activeForm.isPlaceholderVisible"></el-switch>
                <el-input v-show="activeForm.isPlaceholderVisible"
                          v-model="activeForm.placeholder">
                    {{activeForm.placeholder}}
                </el-input>
            </el-form-item>

            <!-- Show only when 'isInputMask' key exist -->
            <el-form-item label="فیلد شما نیاز به الگو دارد ؟"
                          v-show="activeForm.hasOwnProperty('isInputMask') || activeForm.fieldType == 'TextInput' || activeForm.fieldType == 'LongTextInput'">
                <el-switch v-model="activeForm.isInputMask"></el-switch>
                <el-input v-show="activeForm.isInputMask"
                          v-model="activeForm.inputMask">
                    {{activeForm.inputMask}}
                </el-input>
            </el-form-item>

            <el-form-item label="متن"
                          v-show="activeForm.hasOwnProperty('buttonText')">
                <el-input v-model="activeForm.buttonText">
                    {{activeForm.buttonText}}
                </el-input>
            </el-form-item>

            <el-form-item label="فیلد اجباری است؟"
                          v-show="activeForm.hasOwnProperty('isRequired')">
                <el-switch v-model="activeForm.isRequired"></el-switch>
            </el-form-item>

            <el-form-item label="گزینه ها" v-show="activeForm.options">
                <ul>
                    <li v-for="(item, index) in activeForm.options"
                        :key="index"
                        class="properties__optionslist">

                        <el-row :gutter="5">
                            <el-col :xs="20" :sm="20" :md="20" :lg="20" :xl="20">
                                <el-input v-model="item.optionValue">{{item.optionValue}}</el-input>
                            </el-col>
                            <el-col :xs="4" :sm="4" :md="4" :lg="4" :xl="3">
                                <el-button @click="deleteOption(activeForm.options, index)"
                                           v-show="activeForm.options.length > 1">
                                    <i class="el-icon-error"></i>
                                </el-button>
                            </el-col>
                        </el-row>
                    </li>
                </ul>

                <el-button type="text" @click="addOption(activeForm.options)">
                    <i class="el-icon-plus"></i>
                    افزودن گزینه
                </el-button>
            </el-form-item>
        </el-form>
    </div>
</template>

<script>
    export default {
        name: 'Properties',
        store: ['activeForm'], // Get the form data from Home
        data() {
            return {
                labelPosition: 'top',
                fieldProperties: {},
                rules: {}
            }
        },
        methods: {
            deleteOption(option, index) {
                this.$delete(option, index)
            },
            addOption(option) {
                let count = option.length + 1;

                option.push({
                    optionLabel: count,
                    optionValue: "آیتم " + count
                })
            }
        }
    }
</script>

<style lang="scss" scoped>
    .properties__optionslist {
        margin-bottom: 5px;
    }
</style>