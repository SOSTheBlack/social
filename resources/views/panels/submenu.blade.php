<div class="collapsible-body">
    <ul class="collapsible collapsible-sub" data-collapsible="accordion">
        @foreach ($menu as $submenu)
            @php
                $custom_classes="";
                if(isset($submenu->class))
                {
                $custom_classes = $submenu->class;
                }
            @endphp
            <li class="bold {{(request()->routeIs($submenu->route ?? '#')) ? 'active' : '' }}">
                <a class="{{$custom_classes}} {{ (request()->routeIs($submenu->route ?? '#')) ? 'active '.$configData['activeMenuColor'] : ''}}"
                   @if(!empty($configData['activeMenuColor'])) {{'style=background:none;box-shadow:none;'}} @endif
                   href="@if(isset($submenu->route)) {{ route($submenu->route) }} @elseif (($submenu->url) === 'javascript:void(0)') {{$submenu->url}} @else{{url($submenu->url)}} @endif"
                        {{isset($submenu->newTab) ? 'target="_blank"':''}}>
                    <i class="material-icons">{{$submenu->icon ?? 'radio_button_unchecked'}}</i>
                    <span class="menu-title">{{ __($submenu->name)}}</span>
                    @if(isset($submenu->tag))
                        <span class="{{$submenu->tagcustom}}">{{$submenu->tag}}</span>
                    @endif
                </a>
                @if(isset($submenu->submenu))
                    @include('panels.submenu', ['menu' => $submenu->submenu])
                @endif
            </li>
        @endforeach
    </ul>
</div>
