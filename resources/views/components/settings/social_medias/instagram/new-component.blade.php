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
                <div id="view-icon-prefixes" class="active">
                    <blockquote class="bold Flow Text">
                        {{ __('Antes de se conectar, certifique-se de que você tem acesso ao email ou celular registrado do seu
                        Instagram.<br>Pode ser solicitado uma confirmação de') }} "<strong>{{ __('Fui eu') }}</strong>".
                    </blockquote>
                    <div class="row">
                        <form wire:submit.prevent="submit" class="col s12" autocomplete="off">
                            <div class="row input-field col s12">
                                <i class="material-icons prefix">account_circle</i>
                                <input wire:model="username" id="username"
                                       type="text" min="3" class="" autocomplete="off">
                                @error('username')
                                <div class="error">{{ $message }}</div> @enderror
                                <label for="username" class="active">{{ __('Usuário') }}</label>
                            </div>
                            <div class="row input-field col s12">
                                <i class="material-icons prefix">vpn_key</i>
                                <input wire:model="password" id="password" type="password" class="" autocomplete="off">
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
    <script>
        // Materialize.updateTextFields();
        $(document).ready(function () {
            var input_selector = 'input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=number], input[type=search], input[type=date], input[type=time], textarea';
            console.log(input_selector);
            $(input_selector).each(function (element, index) {
                console.log(element, index);
                var $this = $(this);
                if (index.value.length > 0 || $(index).is(':focus') || index.autofocus || $this.attr('placeholder') !== null) {
                    $this.siblings('label').addClass('active');
                } else if (index.validity) {
                    $this.siblings('label').toggleClass('active', index.validity.badInput === true);
                } else {
                    $this.siblings('label').removeClass('active');
                }
            });
        });
    </script>
@endsection
