<div class="modal inmodal" id="modelStudent" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-user modal-icon"></i>
                <h4 class="modal-title" id="student-modal-title"></h4>
                <small id="student-modal-title-small"></small>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name </label>
                                <input id="student-name" type="text" class="form-control disabled" name="name"
                                       value="" disabled/>
                            </div>
                            <div class="form-group">
                                <label for="address">Address </label>
                                <input type="text" name="address1" id="student-address1" class="form-control disabled"
                                       disabled
                                       value="Ihala Magama Rd"/>
                                <input type="text" name="address2" id="student-address2" class="form-control disabled"
                                       disabled
                                       value="Nikawewa"/>
                                <input type="text" name="city" id="student-city" class="form-control disabled" disabled
                                       value="Anuradhapura"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Date of Birth </label>
                                <input name="dob" id="student-dob" disabled type="text" class="form-control disabled"
                                       value="15-04-2003"/>
                            </div>
                            <div class="form-group">
                                <label for="name">Contact Number </label>
                                <input name="contact_no" id="student-contact_no" disabled type="text"
                                       class="form-control disabled"
                                       value="071-4232885"/>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <a id="student-accept" href="#" class="btn btn-primary">Accept</a>
                    <a id="student-reject" href="#" class="btn btn-danger">Reject</a>
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>