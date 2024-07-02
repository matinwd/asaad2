@isset($pageConfigs)
{!! Helper::updatePageConfig($pageConfigs) !!}
@endisset

<!DOCTYPE html>
{{-- {!! Helper::applClasses() !!} --}}
@php
$configData = Helper::applClasses();
@endphp

<html lang="@if(session()->has('locale')){{session()->get('locale')}}@else{{$configData['defaultLanguage']}}@endif"
    data-textdirection="{{ env('MIX_CONTENT_DIRECTION') === 'rtl' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ trans('titles.dashboard') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ \App\Helpers\Helper::Setting('favicon')->val }}">

    {{-- Include core + vendor Styles --}}
    @include('panels/styles')
    <style>
        .v-error{
            color:red;
            padding : .5rem;
        }
        .tox-tinymce,.tox .tox-dialog__title,.tox-tinymce-aux,.tox .tox-button,tox-dialog{
            font-family: IranSans, Arial, sans-serif !important;
        }
    </style>

</head>



@isset($configData["mainLayoutType"])
@extends((( $configData["mainLayoutType"] === 'horizontal') ? 'layouts.horizontalLayoutMaster' :
'layouts.verticalLayoutMaster' ))
@endisset
