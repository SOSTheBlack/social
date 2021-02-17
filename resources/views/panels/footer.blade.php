<!-- BEGIN: Footer-->

<footer
  class="{{$configData['mainFooterClass']}} @if($configData['isFooterFixed']=== true){{'footer-fixed'}}@else {{'footer-static'}} @endif @if($configData['isFooterDark']=== true) {{'footer-dark'}} @elseif($configData['isFooterDark']=== false) {{'footer-light'}} @else {{$configData['mainFooterColor']}} @endif">
  <div class="footer-copyright">
    <div class="container">
      <span>&copy; {{ now()->year }} <a href="{{ route('home') }}"
      </span> {{ __('Todos os direitos reservados') }}
      <span class="right hide-on-small-only">
        {{ __('Desenvolvido por') }} <a href="https://github.com/SOSTheBlack">SOSTheBlack</a> | {{ __('Design por') }} <a href="https://pixinvent.com/">PIXINVENT</a>
      </span>
    </div>
  </div>
</footer>

<!-- END: Footer-->
