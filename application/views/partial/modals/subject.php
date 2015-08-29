<div class="modal inmodal" id="modelSubject" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-pencil modal-icon"></i>
                <h4 id="subject-modal-title" class="modal-title"></h4>
            </div>
            <form action="<?= base_url('/index.php/schools/update_subject')?>" method="post">
                <input type="text" class="hidden" hidden="hidden" id="subject-id" name="subject_id"/>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="name">Subject Name </label>
                                <input id="subject-name" name="name" required="" type="text" class="form-control"
                                       value=""/>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button id="subject-delete" type="button" class="btn btn-danger m-r-xs">Delete</button>
                    <button id="subject-submit" type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
