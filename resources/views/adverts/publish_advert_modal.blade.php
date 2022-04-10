<?php
/**
 * Author: Farai Zihove
 * Date: 4/4/2022
 * Time: 12:28
 */
?>
<div id="publish_advert_modal_{{$advert->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('publish-advert',[$advert->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="standard-modalLabel">Confirm Publish or Un-Publish </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-1">
                        <select name="publish" id="publish" class="form-control" required>
                            <option value="">Select Choice</option>
                            <option value="1">Publish</option>
                            <option value="0">Un-Publish</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-check"></i> Un-Publish / Publish</button>
                </div>
            </form>
        </div>
    </div>
</div>
