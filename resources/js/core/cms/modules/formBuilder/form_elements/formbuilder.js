import Vue from 'vue';

// window.Vue = require("vue").default;

import draggable from 'vuedraggable'

import TextInput from './FormElementTextInput'
import LongTextInput from './FormElementLongTextInput'
import SelectList from './FormElementSelectList'
import ProvinceCity from './FormElementProvinceCity'
import RadioButton from './FormElementRadioButton'
import Checkbox from './FormElementCheckbox'
import DatePicker from './FormElementDatePicker'
import FileUploader from './FormElementFileUploader'
import Button from './FormElementButton'

import Elements from './Elements'
import Properties from './Properties'
import Theming from './Theming'


export const FormBuilder = new Vue({
    components: {
        Elements,
        Properties,
        Theming,
        draggable,
        TextInput,
        LongTextInput,
        SelectList,
        ProvinceCity,
        RadioButton,
        Checkbox,
        DatePicker,
        FileUploader,
        Button
    },
    data() {
        return {
            fields: [
                {
                    'name': 'TextInput',
                    'text': 'Input',
                    'group': 'form', //form group
                    'hasOptions': false,
                    'isRequired': false,
                    'isPlaceholderVisible': true,
                    'isInputMask': true,
                    'isUnique': false
                },
                {
                    'name': 'LongTextInput',
                    'text': 'TextArea',
                    'group': 'form',
                    'hasOptions': false,
                    'isRequired': false,
                    'isPlaceholderVisible': true,
                    'isInputMask': true,
                    'isUnique': false
                },
                {
                    'name': 'SelectList',
                    'text': 'Select',
                    'group': 'form',
                    'hasOptions': true,
                    'isRequired': false,
                    'isPlaceholderVisible': false,
                    'isInputMask': false,
                    'isUnique': false
                },
                {
                    'name': 'ProvinceCity',
                    'text': 'Province - City',
                    'group': 'form',
                    'hasOptions': false,
                    'isRequired': false,
                    'isPlaceholderVisible': false,
                    'isInputMask': false,
                    'isUnique': false
                },
                {
                    'name': 'RadioButton',
                    'text': 'Radio',
                    'group': 'form',
                    'hasOptions': true,
                    'isRequired': false,
                    'isPlaceholderVisible': false,
                    'isInputMask': false,
                    'isUnique': false
                },
                {
                    'name': 'Checkbox',
                    'text': 'Checkbox',
                    'group': 'form',
                    'hasOptions': true,
                    'isRequired': false,
                    'isPlaceholderVisible': false,
                    'isInputMask': false,
                    'isUnique': false
                },
                {
                    'name': 'DatePicker',
                    'text': 'Date Picker',
                    'group': 'form',
                    'hasOptions': false,
                    'isRequired': false,
                    'isPlaceholderVisible': false,
                    'isInputMask': false,
                    'isUnique': false
                },
                {
                    'name': 'FileUploader',
                    'text': 'File Uploader',
                    'group': 'form',
                    'hasOptions': false,
                    'isRequired': false,
                    'isPlaceholderVisible': false,
                    'isInputMask': false,
                    'isUnique': false
                },
                {
                    'name': 'Button',
                    'text': 'Button',
                    'group': 'button',
                    'hasOptions': false,
                    'isRequired': false,
                    'isPlaceholderVisible': false,
                    'isInputMask': false,
                    'isUnique': true
                }
            ],

            sortElementOptions: {
                group: {name: 'formbuilder', pull: false, put: true},
                sort: true,
                handle: ".form__actionitem--move"
            },

            dropElementOptions: {
                group: {name: 'formbuilder', pull: 'clone', put: false},
                sort: false,
                ghostClass: "sortable__ghost",
                filter: ".is-disabled"
            }
        }
    },
    methods: {
        deleteElement(index) {
            vm.$store.activeForm = [];
            vm.$store.activeTabForFields = "elements";
            this.$delete(vm.$store.forms, index);
        },

        cloneElement(index, form) {
            var cloned = _.cloneDeep(form) // clone deep lodash
            vm.$store.forms.splice(index, 0, cloned)
        },

        editElementProperties(form) {
            vm.$store.activeForm = form;
            vm.$store.activeTabForFields = "properties";
        }
    }
});
