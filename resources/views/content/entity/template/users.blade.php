@extends('layouts/contentLayoutMaster')

@section('title', 'کاربران / حق دسترسی')

@php($bodyId = 'vAppb')

@section('content')
    <section id="vApp"></section>
    <section id="vueApp">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('cms.templates.update_users',$template) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-hover table-borderless">
                                <thead>
                                <tr>
                                    <td class="text-center">نام و نام خانوادگی</td>
                                    <td class="text-center">نام کاربری</td>
                                    <td class="text-center">رمزعبور</td>
                                    <td class="text-center"></td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(item,index) in users">
                                    <td>
                                        <el-input dir="auto" v-model="item.name" clearable></el-input>
                                    </td>
                                    <td>
                                        <el-input dir="auto" v-model="item.user_name" clearable></el-input>
                                    </td>
                                    <td>
                                        <el-input dir="auto" v-model="item.password" clearable></el-input>
                                    </td>
                                    <td>
                                        <button v-if="index == 0" @click="addNewItem"
                                                class="btn btn-success" type="button">
                                            <i class="feather icon-plus"></i>
                                        </button>
                                        <button v-if="index != 0" @click="deleteItem(index)"
                                                class="btn btn-danger" type="button">
                                            <i class="feather icon-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="users_data" :value="JSON.stringify(this.users)">
                            <button type="submit" class="btn btn-primary">تایید</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('page-style')
    <style>
        .tox-tinymce-aux {
            z-index: 100000 !important;
        }
    </style>
@endsection

@section('page-script')
    <script>
        new Vue({
            el: '#vueApp',
            data() {
                return {
                    users: {!! json_encode($template->users ?? []) !!}
                }
            },
            methods: {
                addNewItem() {
                    this.users.push({
                        'name': null,
                        'user_name': null,
                        'password': null
                    });
                },
                deleteItem(index) {
                    this.users.splice(index, 1);
                },
            },
            created() {
                if (this.users.length == 0)
                    this.addNewItem();
            }
        });
    </script>
@endsection
