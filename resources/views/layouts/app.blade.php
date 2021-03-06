{{-- pageConfigs variable pass to Helper's updatePageConfig function to update page configuration  --}}
@isset($pageConfigs)
{!! TemplateHelper::updatePageConfig($pageConfigs) !!}
@endisset

<!DOCTYPE html>
@php
// confiData variable layoutClasses array in Helper.php file.
$configData = TemplateHelper::applClasses();
@endphp
<html class="loading"
  lang="@if(session()->has('locale')){{session()->get('locale')}}@else{{$configData['defaultLanguage']}}@endif"
  data-textdirection="{{ env('MIX_CONTENT_DIRECTION') === 'rtl' ? 'rtl' : 'ltr' }}">
<!-- BEGIN: Head-->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $pageTitle ?? 'Buzzina' }} | {{ env('APP_NAME') }} </title>
  <link rel="apple-touch-icon" href="{{ asset('images/favicon/apple-touch-icon-152x152.png') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon/favicon-32x32.png') }}">
  <script src="https://kit.fontawesome.com/846a7a1872.js" crossorigin="anonymous"></script>

  {{-- Include core + vendor Styles --}}
  @livewireStyles
  @include('panels.styles')

</head>
<!-- END: Head-->
{{-- @isset(config('custom.custom.mainLayoutType'))
@endisset --}}
@if(!empty($configData['mainLayoutType']) && isset($configData['mainLayoutType']))
@include(($configData['mainLayoutType'] === 'horizontal-menu') ? 'layouts.horizontalLayoutMaster':
'layouts.verticalLayoutMaster')
@else
{{-- if mainLaoutType is empty or not set then its print below line  --}}
<h1>{{'mainLayoutType Option is empty in config custom.php file.'}}</h1>
@endif
@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
</html>
