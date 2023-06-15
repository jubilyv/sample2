@extends('layouts.header')

@section('content')
<div class="container">
    <form action="{{ route('edit-article', $article->id) }}" method="POST">

        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <h4 class="text-center">Edit Article</h4>

                <div class="form-group">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" name="title" id="title" class="form-control" aria-describedby="nameHelp"
                        value="{{ $article->title }}" required>

                </div>
                <br />
                <div class="form-group">
                    <label for="content" class="form-label">Content:</label>
                    <textarea name="content" rows="3" cols="8" id="content" placeholder="Article content"
                        class="form-control" value="{{ $article->content }}" required>
                        </textarea>
                </div>
                <br />
                <input type="hidden" name="id" value="{{ $article->id }}">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#confirmEditModal">Update</button>
            </div>
        </div>
       
        <!-- modal -->
        <div class="modal fade" id="confirmEditModal" tabindex="-1" role="dialog"
            aria-labelledby="confirmEditModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmEditModalLabel">Confirm Edit
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Article Edited successfully </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary">ok</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
  
    @endsection