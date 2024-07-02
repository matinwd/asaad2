{{-- Vendor Scripts --}}
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@yield('vendor-script')
{{-- Theme Scripts --}}

<script src="{{ asset(mix('js/core/app-menu.js')) }}?v=1"></script>
<script src="{{ asset(mix('js/core/app.js')) }}?v=1"></script>
{{-- page script --}}

@yield('page-script')
{{-- page script --}}

@if(!($disableVue ?? false))
    <script>
        window.trash_route_param = parseInt({!! request('trash',0) !!});
        let mixins = [];
        try {
            mixins = [mix, mix2];
        } catch (e) {
            mixins = [];
            if (typeof mix != "undefined")
                mixins = [mix];
        }

        mixins.push({
            data() {
                return {
                    previewUrl: null,
                    previewTitle: null,
                    visiblePreviewBox: false,
                }
            },
            methods: {
                previewBox(link, title = null) {
                    this.previewUrl = link;
                    this.visiblePreviewBox = true;
                    this.previewTitle = title;
                },
            }
        });

        @isset($enableActionGroup)
        mixins.push({
            data() {
                return {
                    trash: window.trash_route_param,
                    paginator: {
                        data: []
                    },
                    filter: {
                        is_active: null,
                        status: 'all',
                    },
                    loadingData: false,
                    loadingSubmitSA: false,
                    sa_action: null,
                    multipleSelection: []
                }
            },
            methods: {
                getData(page = 1) {
                    this.loadingData = true;
                    let thiz = this;
                    axios.get(`${window.location.pathname}?page=${page}&filter=${JSON.stringify(this.filter)}&trash=${this.trash}`)
                        .then(response => {
                            if (response.data)
                                thiz.paginator = response.data;
                        })
                        .catch((error) => {
                            thiz.paginator = {
                                data: []
                            };
                        })
                        .finally(() => {
                            this.loadingData = false;
                        });
                },
                runSA() {
                    this.$confirm(`آیا از انجام این عمل اطمینان دارید؟`, {
                        cancelButtonText: 'منصرف شدم',
                        confirmButtonText: 'بله،انجام شود',
                    })
                        .then(_ => {
                            axios.post(`${window.location.pathname}/sa_action`, {
                                rows: this.multipleSelection.map(item => item.id),
                                action: this.sa_action
                            })
                                .then(response => {
                                    this.$message.success({
                                        center: true,
                                        message: "{{ trans('actions.operation_success') }}"
                                    });
                                    this.getData();
                                    this.sa_action = null;
                                })
                                .catch(error => {
                                    this.$message.error({
                                        center: true,
                                        message: "{{ trans('actions.operation_fail') }}"
                                    });
                                });
                        });
                },
                handleSelectionChange(val) {
                    this.multipleSelection = val;
                },
                duplicate(id) {
                    axios.post(`${window.location.pathname}/${id}/duplicate`)
                        .then(response => {
                            this.$message.success({
                                center: true,
                                message: "{{ trans('actions.store_success') }}"
                            });
                            this.getData();
                        })
                        .catch(error => {
                            this.$message.error({
                                center: true,
                                message: "{{ trans('actions.store_fail') }}"
                            });
                        });
                },
                recovery(id) {
                    this.$confirm(`آیا از انجام این عمل اطمینان دارید؟`, {
                        cancelButtonText: 'منصرف شدم',
                        confirmButtonText: 'بله،بازیابی شود',
                    })
                        .then(_ => {
                            axios.patch(`${window.location.pathname}/${id}/recovery`, {
                                '_method': 'update'
                            })
                                .then(response => {
                                    this.$message.success({
                                        center: true,
                                        message: "{{ trans('actions.recovery_success') }}"
                                    });
                                    this.getData();
                                })
                                .catch(error => {
                                    this.$message.error({
                                        center: true,
                                        message: "{{ trans('actions.recovery_fail') }}"
                                    });
                                });
                        });
                },
                handleDelete(id, force = 0) {
                    this.$confirm(`آیا از انجام این عمل اطمینان دارید؟ (${(force === 1 ? 'حذف دائمی' : 'زباله‌دان')})`, {
                        cancelButtonText: 'منصرف شدم',
                        confirmButtonText: 'بله،حذف شود',
                    })
                        .then(_ => {
                            axios.delete(`${window.location.pathname}/${id}?force=${force}`)
                                .then(response => {
                                    this.$message.success({
                                        center: true,
                                        message: force === 1 ? "{{ trans('actions.destroy_success') }}" : "{{ trans('actions.trash_success') }}",
                                    });
                                    this.getData();
                                })
                                .catch(error => {
                                    this.$message.error({
                                        center: true,
                                        message: force === 1 ? "{{ trans('actions.destroy_fail') }}" : "{{ trans('actions.trash_fail') }}",
                                    });
                                });
                        });
                }
            },
            created() {
                this.getData();
            }
        });
        @endisset
    </script>

    @yield('page-script-vue')
    <script src="{{ asset(mix('js/core/cms.js')) }}"></script>
@endif

@include('sweet::alert')

