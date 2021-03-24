@if($errors->has('error'))
    <div class="card-alert card red lighten-5">
        <div class="card-content red-text">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif