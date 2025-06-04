<div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="row mt-4">
    <div class="col-4 offset-4">
    <form action="/register/save" method="POST">
    @csrf
    <div class="mb-3">
        <input type="text" name="name" value="{{ old('name') }}" 
            class='form-control mb-3' 
            placeholder="Enter Username">
        <input type="email" name="email" value="{{ old('email') }}" 
            class='form-control mb-3' 
            placeholder="Enter Email">

        <input type="password" id="password" name="password" 
            class='form-control mb-3' 
            placeholder="Enter Password">

        <input type="password" id="password_confirmation" name="password_confirmation" 
            class='form-control mb-3' 
            placeholder="Confirm Password" />

        <input type="submit" name="submit" value="Register" 
            class='btn btn-success'>
            
        <a href="/login">login?</a>
    </div>
    </form>

    </div>
</div>
@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



</div>
