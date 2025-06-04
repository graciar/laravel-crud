<div class="row mt-4">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <div class="col-4 offset-4">

    <form action="/logout" method="POST">
        @csrf
        <h4>are you sure want to logout?</h4>
        <div class="mb-3">
               <button type="submit" class="btn btn-danger">Confirm</button>
               <a href="/dashboard" class="btn btn-warning">Cancel</a>
           </div>
    </form>    
</div>
</div>
