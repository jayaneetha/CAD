<div class="modal inmodal" id="modelCAD" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-user modal-icon"></i>
                <h4 id="cad-modal-title" class="modal-title"></h4>
                <small id="cad-modal-title-small"></small>
            </div>
            <form action="<?php echo base_url('users/update_cad_user') ?>" method="POST">

                <input type="text" id="cad-id" name="id" value="" hidden="hidden" class="hidden"/>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name </label>
                                <input id="cad-name" type="text" class="form-control disabled" name="name" value=""
                                       disabled/>
                            </div>
                            <div class="form-group">
                                <label for="name">E-Mail Address </label>
                                <input id="cad-email" name="email" disabled type="text" class="form-control disabled"
                                       value=""/>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="contact_no">Contact Number </label>
                                <input id="cad-contact_no" name="contact_no" disabled type="text"
                                       class="form-control disabled"
                                       value=""/>
                            </div>
                            <div class="form-group">
                                <label for="position">Position </label>
                                <select id="cad-position" name="position" class="form-control">
                                    <option value="Project Manager">Project Manager</option>
                                    <option value="Project Coordinator">Project Coordinator</option>
                                    <option value="Team Member">Team Member</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button id="cad-update" type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>