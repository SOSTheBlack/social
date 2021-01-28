<!-- BEGIN: Footer-->

<footer
  class="{{$configData['mainFooterClass']}} @if($configData['isFooterFixed']=== true){{'footer-fixed'}}@else {{'footer-static'}} @endif @if($configData['isFooterDark']=== true) {{'footer-dark'}} @elseif($configData['isFooterDark']=== false) {{'footer-light'}} @else {{$configData['mainFooterColor']}} @endif">
  <div class="footer-copyright">
    <div class="container">
      <span>&copy; {{ now()->year }} <a href="{{ route('dashboard.home') }}"
          target="_blank">{{ config('app.name') }}</a> @lang('locale.All rights reserved').
      </span>
      <span class="right hide-on-small-only">
        @lang('locale.Developed by') <a href="https://github.com/SOSTheBlack">SOSTheBlack</a> | @lang('locale.Design by') <a href="https://pixinvent.com/">PIXINVENT</a>
      </span>
    </div>
  </div>
</footer>

<!-- END: Footer-->
