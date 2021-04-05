@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 text-center">
            <img src="{{ asset('img/Pokemon_logo.png')}}" style="max-width: 18rem;" alt="Favsimg">
        </div>
    </div>
    <div class="row justify-content-center mt-5" id="pokecards">

    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/scripts.js') }}"></script>
<script>

</script>
@endsection

