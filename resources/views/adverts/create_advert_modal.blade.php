<?php
/**
 * Author: Farai Zihove
 * Date: 4/4/2022
 * Time: 08:18
 */
?>
<div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('upload-adverts')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="standard-modalLabel">Upload Banner</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="title" class="form-label">Banner Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" id="desctiption" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label for="image_name" class="form-label">Banner Image</label>
                        <input type="file" name="image_name" id="image_name" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-file-upload"></i> Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
