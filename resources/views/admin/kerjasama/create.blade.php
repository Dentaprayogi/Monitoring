<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Laravel 10 Summernote Text Editor with Image Upload CRUD (create read update and delete)</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body>
<div class="container p-4 ">
    <div class="row justify-content-md-center">
        <div class="col-md-12">
            <div class="text-center">
                <h1 class="">Aktivitas Poliwangi</h1>
            </div> 
            <form action="/post" method="post">
                @csrf
                <label for="">Title:</label>
                <input type="text" class="form-control" name="title">
                <label for="">Description:</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
                <button type="submit" class="btn btn-lg btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    $('#description').summernote({
        placeholder: 'description...',
        tabsize:2,
        height:300
    });
</script>
</body>
</html>