
<datalist id="cityList">
    @foreach(App\City::getList() ?? [] as $city)
        <option value="{{$city}}">
    @endforeach
</datalist>