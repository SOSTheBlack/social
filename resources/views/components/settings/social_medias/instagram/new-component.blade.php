@section('page-style')
@endsection
<div class="row">
    <div class="col offset-m3 s12 m6">
        <div id="icon-prefixes" class="card card-tabs">
            <div class="card-content">
                <div class="card-title">
                    <div class="row">
                        <div class="col s12">
                            <p class="card-title"><i
                                        class="material-icons ">lock</i>{{ __('Você está totalmente seguro!') }}</p>
                        </div>
                    </div>
                </div>
                <x-errors/>
                <x-alert-session/>
                <div id="view-icon-prefixes" class="active">
                    <blockquote class="bold Flow Text">
                        {{ __('Antes de se conectar, certifique-se de que você tem acesso ao email ou celular registrado do seu
                        Instagram.<br>Pode ser solicitado uma confirmação de') }} "<strong>{{ __('Fui eu') }}</strong>".
                    </blockquote>
                    <div class="row">
                        <form wire:submit.prevent="submit" class="col s12" autocomplete="off">
                            @if(! $enterpriseId)
                                <div class="row input-field col s12">
                                    <select wire:model="enterpriseId" name="enterpriseId" id="enterpriseId" class="enterprisess browser-default">
                                        <option value="" selected>Selecionar Empresa</option>
                                        @foreach($enterprises as $enterprise)
                                            <option value="{{ $enterprise['id'] }}">{{ $enterprise['name'] }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            @endif
                            <div class="row input-field col s12">
                                <i class="material-icons prefix">account_circle</i>
                                <input wire:model="username" id="username"
                                       type="text" min="3" class="username" autocomplete="off">
                                @error('username')
                                <div class="error">{{ $message }}</div> @enderror
                                <label for="username" class="active">{{ __('Usuário') }}</label>
                            </div>
                            <div class="row input-field col s12">
                                <i class="material-icons prefix">vpn_key</i>
                                <input wire:model="password" id="password" type="password" class="password"
                                       autocomplete="off">
                                @error('password')
                                <div class="error ">{{ $message }}</div> @enderror
                                <label for="password" class="active">{{ __('Senha') }}</label>
                            </div>
                            <div class="row col offset-s8 s4">
                                <button type="submit" class="btn right">{{ __('Sincronizar') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('page-script')
    <script src="{{asset('js/materialize.js')}}"></script>
    <script src="{{ asset('js/scripts/form-elements.js') }}"></script>
@endsection
