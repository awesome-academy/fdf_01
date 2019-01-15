@if (count($errors) > config('setting.default'))
    <div class="alert alert-danger">
        <strong>@lang('auth.whoops')</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('alert'))
    <script type="text/javascript" charset="utf-8">
    	alert("{{ session('alert') }}");
    </script>
@endif

@if (session('msgDelete'))
    <script type="text/javascript" charset="utf-8">
        alert("{{ session('msgDelete') }}");
    </script>
@endif
