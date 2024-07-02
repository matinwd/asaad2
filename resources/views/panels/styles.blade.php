<link rel="stylesheet" href="{{ asset(mix('vendors/css/vendors.min.css')) }}"/>
<link rel="stylesheet" href="{{ asset(mix('vendors/css/ui/prism.min.css')) }}"/>
<link rel="stylesheet" href="{{ asset(mix('fonts/feather/iconfont.css')) }}"/>
{{-- Vendor Styles --}}
@yield('vendor-style')
{{-- Theme Styles --}}

<link rel="stylesheet" href="{{ asset(mix('css/core.css')) }}"/>

{{-- {!! Helper::applClasses() !!} --}}
@php $configData = Helper::applClasses(); @endphp

{{-- Page Styles --}}
@if($configData['mainLayoutType'] === 'horizontal')
    <link rel="stylesheet" href="{{ asset(mix('css/base/core/menu/menu-types/horizontal-menu.css')) }}"/>
@endif
<link rel="stylesheet" href="{{ asset(mix('css/base/core/menu/menu-types/vertical-menu.css')) }}"/>

<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">

{{-- Page Styles --}}
@yield('page-style')

{{-- Laravel Style --}}
<link rel="stylesheet" href="{{ asset(mix('css/overrides.css')) }}"/>

{{-- Custom RTL Styles --}}

@if($configData['direction'] === 'rtl' && isset($configData['direction']))
    <link rel="stylesheet" href="{{ asset(mix('fonts/iransans/iran-sans.css')) }}"/>
    <link rel="stylesheet" href="{{ asset(mix('css/custom-rtl.css')) }}"/>
    <link rel="stylesheet" href="{{ asset(mix('css/style-rtl.css')) }}"/>
@endif

{{-- user custom styles --}}
<link rel="stylesheet" href="{{ asset(mix('css/style.css')) }}"/>
<style>
    .el-dialog__header{
        text-align : center;
    }
    .table-center td,.table-center th{
        text-align: center;
    }
</style>

<script>
    window.lData = <?php
    $user = \Illuminate\Support\Facades\Auth::user();
    echo json_encode([
        'csrfToken' => csrf_token(),
        'userId' => isset($user) ? $user->id : null,
        'languages' => \App\Helpers\Helper::activeLanguages(),
    ]);
    ?>
</script>
