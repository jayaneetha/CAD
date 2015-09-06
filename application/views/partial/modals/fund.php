<div class="modal inmodal" id="modalFund" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-dollar modal-icon"></i>
                <h4 class="modal-title">Fund</h4>
            </div>
            <form>
                <input type="text" class="hidden" hidden="hidden" id="fund-id" name="fund_id"/>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Donor </label>
                                <input type="text" class="form-control disabled" disabled name="donor_name" id="donor-name"
                                       value=""/>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount </label>
                                <input type="text" name="amount" class="form-control disabled" disabled id="amount"
                                       value=""/>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="transaction_no">Transaction No. </label>
                                <input type="text" name="transaction_no" id="transaction-no"
                                       class="form-control disabled" disabled
                                       value=""/>
                            </div>
                            <div class="form-group">
                                <label for="date_time">Date/Time </label>
                                <input type="text" name="date_time" id="date-time" class="form-control disabled"
                                       disabled
                                       value=""/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <textarea disabled class="form-control disabled" name="description" id="description"
                                      cols="30" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>