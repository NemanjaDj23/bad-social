@if(session()->has('success'))
    <div class='alert alert-success fade-message'>
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session()->get('success') }}
    </div>

    <script>
        $(document).ready(function(){
            $(".alert").delay(5000).fadeOut(300);
        });
    </script>
@endif