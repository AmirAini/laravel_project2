<html>
<head>
    <script src="<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    @auth
        The user is authenticated...
        <br/>Hi {{Auth::user()->name}},<br/>
        <a href="{{route('logout')}}">Logout</a>
    @endauth

    @guest
        // The user is not authenticated...
    @endguest

<div style="width: 80%;margin:0 auto;">
    
    @isset($companies) 
    {{-- will check if the variables are null or not, check it first before displaying it, make it a habit --}}
    {{-- $records is defined and is not null... --}}
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Id</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
        @foreach ($companies as $company)
            {{-- <p>{{ $company->name }} is {{ $company->id }}</p>
            --}}
            <tr>
                
                <td>{{ $company->name }}</td>
                <td>{{ $company->id }}</td>
                
                <td>
                    <a href="{{URL::signedRoute('company.edit',['id'=>$company->id])}}">Edit sign</a>
                    <a href="{{URL::temporarySignedRoute('company.edit',now()->addSeconds(3),['id'=>$company->id])}}">Edit tempsig</a>
                    {{ print'<a href="'.route('company.edit', ["id"=>$company->id]).'">edit D</a>' }}
                </td>
            </tr> 
        @endforeach
        </tbody>
    </table>
        {{$companies->links()}}
    @endisset
</div>

    {{-- @for ($ind = 0; $ind < 10; $ind++)
        {{ $ind }},
    @endfor --}}




</body>
</html>