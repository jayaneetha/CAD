<div class="modal inmodal" id="modelSchool" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-bank modal-icon"></i>
                <h4 id="school-modal-title" class="modal-title"></h4>
                <small id="school-modal-title-small"></small>
            </div>
            <form action="<?= base_url('index.php/schools/update_school') ?>" method="POST">
                <input type="text" class="hidden" hidden="hidden" id="school-id" name="school_id"/>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name </label>
                                <input id="school-name" type="text" class="form-control" name="name"
                                       value="""/>
                            </div>
                            <div class="form-group">
                                <label for="address">Address </label>
                                <input id="school-address-1" type="text" name="address1" class="form-control" value=""/>
                                <input id="school-address-2" type="text" name="address2" class="form-control" value=""/>
                                <input id="school-city" type="text" name="city" class="form-control" value=""/>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name of Principal </label>
                                <input id="school-principal" name="principal" required="" type="text"
                                       class="form-control"
                                       value=""/>
                            </div>
                            <div class="form-group">
                                <label for="name">Contact Number </label>
                                <input id="school-contact-no" name="contact_no" required="" type="text"
                                       class="form-control"
                                       value=""/>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button id="school-delete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modelDelete" >Delete</button>
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>