<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="row mt-4">
    <div class="col-4 offset-4">
        <form action="/login/save" method="POST">
            @csrf
            <input type="email" name="email" 
                class='form-control mb-3' 
                placeholder="Enter Your Email">
            <input type="password" name="password" 
                class='form-control mb-3' 
                placeholder="Enter Your Password">
            <input type="submit" name="submit" value="Login" 
                class='btn btn-success'>

            <a href="/register">register?</a>

        </form>
    </div>

</div>
