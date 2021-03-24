@if(session()->has('alert'))
    <div class="card-alert card {{ session('alert')['color'] }} lighten-5">
        <div class="card-content {{ session('alert')['color'] }}-text">
            <p>{{ session('alert')['message'] }}</p>
        </div>
        @if(session('alert')['exit'])
            <button type="button" class="close {{ session('alert')['color'] }}-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        @endif
    </div>
@endif