<div class="modal inmodal" id="modelDonor" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-user modal-icon"></i>
                <h4 id="donor-modal-title" class="modal-title"></h4>
                <small id="donor-modal-title-small"></small>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name </label>
                                <input type="text" class="form-control disabled" name="name" id="donor-name"
                                       value=""
                                       disabled/>
                            </div>
                            <div class="form-group">
                                <label for="address">Address </label>
                                <input type="text" name="address1" id="donor-address1" class="form-control disabled"
                                       disabled
                                       value=""/>
                                <input type="text" name="address2" id="donor-address2" class="form-control disabled"
                                       disabled
                                       value=""/>
                                <input type="text" name="city" id="donor-city" class="form-control disabled" disabled
                                       value=""/>
                                <input type="text" name="country" id="donor-country" class="form-control disabled"
                                       disabled
                                       value=""/>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">E-Mail Address </label>
                                <input name="email" id="donor-email" disabled type="text" class="form-control disabled"
                                       value=""/>
                            </div>
                            <div class="form-group">
                                <label for="name">Contact Number </label>
                                <input name="contact_no" id="donor-contact_no" disabled type="text"
                                       class="form-control disabled"
                                       value=""/>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <a id="donor-accept" href="#" class="btn btn-primary">Accept</a>
                    <a id="donor-reject" href="#" class="btn btn-danger">Reject</a>
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>