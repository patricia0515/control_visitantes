  
{{-- {!!Form::open(array('url'=>'visitantes','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!} --}}
<form action="{{ route('visitantes.show') }}" method="POST">
    @csrf
    <div class="input-group">
        <input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}" >
        <spam class="input-group-btn">
            <button type="sumit" class="btn btn-primary">Buscar</button>
        </spam>
    </div>
</form>

{{-- {{Form::close()}} --}}