<template>
    <div>
        <label v-if="showLabel">{{ label }}</label>
        <date-picker v-model="date" :color="color"
                     clearable :display-format="dFormat"
                     :format="format"
                     :placeholder="placeHolder">
        </date-picker>
        <input type="hidden" v-model="date" :name="dateName">
    </div>
</template>

<script>
    export default {
        props: {
            showLabel: {
                type: Boolean,
                default: true,
            },
            currentDate: {
                type: String,
                default: false,
            },

            dateName: {
                type: String,
                default: 'date',
            },
            label: {
                type: String,
                default: 'تاریخ',
            },
            color: {
                type: String,
                default: '#888888',
            },
            dFormat: {
                type: String,
                default: 'dddd jDD jMMMM jYYYY',
            },
            format: {
                type: String,
                default: 'YYYY-MM-DD',
            },
            placeHolder: {
                type: String,
                default: '-- انتخاب تاریخ --',
            },

        },
        data() {
            return {
                date : null,
            }
        },
        created() {
            if(this.currentDate)
                this.date = this.currentDate;
        }
    }
</script>

