@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- jquery validation plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

</head>

<body>

    <h4 class="text-center">An inspiring collection of Articles </h4>
    <?php if (empty($blogs)): ?> 
      
    <?php else: ?>  
        <?php foreach ($blogs as $article): ?>
            <div class="container mb-5 ">

                <div class="card">
                    <h4 class="card-header ">

                        <?= ($article['title']); ?>
                    </h4>
                    <h6 class="card-body lh-base">

                        <?= ($article['content']); ?>
                    </h6>
                    <div class="blockquote-footer ">
                        <time datetime="<?= $article['created_at'] ?>"><?php
                          $datetime = new DateTime($article['created_at']);
                          echo $datetime->format("j F,Y H:i:s "); ?></time>
                    </div>

                    <div class="card-footer">
                        <div class="btn-group" role="group" aria-label="Robot Buttons" >
                            <form action="{{ route('edit-article', $article->id) }}" method="GET">
                                @csrf
                                @method('GET')
                                <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                            </form>

                            <!-- Button to trigger the modal -->
                            <button type="submit" class="btn btn-danger btn-sm " data-bs-toggle="modal"
                                data-bs-target="#deleteArticleModal">Delete</button>
                        </div>
                    </div>
               
              
                        <!-- Modal -->
                        <div class="modal fade" id="deleteArticleModal" tabindex="-1" aria-labelledby="deleteArticleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteArticleModalLabel">Delete Article</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>

                                    </div>


                                    <div class="modal-body">
                                        <input type="hidden" name="_method" value="DELETE">

                                        <p> Are you sure you want to delete this article?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                                        <input type="hidden" name="id" value="{{ $article->id }}">
                                        <form action="{{ route('delete-article', $article->id) }}" method="POST"
                                            id="deleteForm">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger float-right " id="deleteButton"
                                              >Yes! Delete Data</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                 
                    <!-- </div> -->
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <x-footer />
</body>

</html>
@endsection