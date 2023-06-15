@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- jquery validation plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <h4 class="text-center ">Unlock your creativity: Enhance your writing skills Today!</h4>
                <form method="post" id="formArticle" action="add-article">
                    @csrf
                    <div class="form-group">
                 
                        <label for="title" class="form-label"> Title:</label>
                        <input type="text" name="title" id="title" class="form-control" aria-describedby="name">
                        <span style="color:red">@error('title'){{$message}}@enderror</span>
                    </div>
                    <br />
                    <div class="form-group">
                        <textarea name="content" rows="3" cols="8" id="content" class="form-control"
                            aria-describedby="name" placeholder="Article content"></textarea>
                        <span style="color:red">@error('content'){{$message}}@enderror</span>
                    </div>
                    <div>
                        <input type="hidden" name="published_at" id="published_at" class="form-control">
                    </div>
                    <br />
                    <button class="btn btn-outline-primary" data-bs-container="body" data-bs-toggle="popover"
                        title="Add">Add</button>
                </form>
            </div>
        </div>
    </div>
    <x-footer />
</body>
@endsection