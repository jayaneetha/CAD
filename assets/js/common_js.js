/**
 * Created by Admin on 8/9/15.
 */

setInterval(function () {
    check_mail();
}, 60000);

var check_mail = function () {
    $.ajax({
        type: "GET",
        dataType: 'html',
        url: "/index.php/messages/get_inbox_count/",
        success: function (data) {
            if (data == 'error') {
                $('#inbox-count').replaceWith("");
            } else {
                $('#inbox-count').replaceWith(data);
            }
        }
    });
    $.ajax({
        type: "GET",
        dataType: 'html',
        url: "/index.php/messages/notification/",
        success: function (data) {
            $('#mail-notification').replaceWith(data);
        }
    });
};

var show_user_modal = function (parent_view, data, userType) {
    switch (userType) {
        case 'student':
            $('#student-modal-title').text(data.first_name + " " + data.last_name);
            $('#student-modal-title-small').text(data.name);
            $('#student-name').val(data.first_name + " " + data.last_name);
            $('#student-address1').val(data.address_1);
            $('#student-address2').val(data.address_2);
            $('#student-city').val(data.city);
            $('#student-dob').val(data.DOB);
            $('#student-contact_no').val(data.contact_no);
            if (parent_view == 'registration_requests') {
                $('#student-accept').attr('href', BASE_URL + "/users/accept_reject_request/" + data.id + '/accept');
                $('#student-reject').attr('href', BASE_URL + "/users/accept_reject_request/" + data.id + '/reject');
            } else {
                $('#student-accept').addClass('hidden');
                $('#student-reject').addClass('hidden');
            }
            $('#modelStudent').modal('show');
            break;
        case 'donor':
            $('#donor-modal-title').text(data.first_name + " " + data.last_name);
            $('#donor-modal-title-small').text(data.title);
            $('#donor-name').val(data.first_name + " " + data.last_name);
            $('#donor-address1').val(data.address_1);
            $('#donor-address2').val(data.address_2);
            $('#donor-city').val(data.city);
            $('#donor-country').val(data.country);
            $('#donor-email').val(data.email);
            $('#donor-contact_no').val(data.contact_no);
            if (parent_view == 'registration_requests') {
                $('#donor-accept').attr('href', BASE_URL + "/users/accept_reject_request/" + data.id + '/accept');
                $('#donor-reject').attr('href', BASE_URL + "/users/accept_reject_request/" + data.id + '/reject');
            } else {
                $('#donor-accept').addClass('hidden');
                $('#donor-reject').addClass('hidden');
            }
            $('#modelDonor').modal('show');
            break;
        case 'cad':
            $('#cad-modal-title').text(data.first_name + " " + data.last_name);
            $('#cad-modal-title-small').text(data.position);
            $('#cad-name').val(data.first_name + " " + data.last_name);
            $('#cad-id').val(data.id);
            $('#cad-email').val(data.email);
            $('#cad-contact_no').val(data.contact_no);
            $('#cad-position').val(data.position);
            if (parent_view == 'manage_users') {
            } else {
                $('#cad-update').addClass('hidden');
            }
            $('#modelCAD').modal('show');
            break;
        case 'admin':
            toastr.warning('Admin profiles are restricted');
            break;
        default:
            toastr.error('Something went wrong!');
    }
};

var show_school_modal = function (parent_view, data) {
    $('#school-modal-title').html(data.name);
    $('#school-modal-title-small').text(data.city);
    $('#school-name').val(data.name);
    $('#school-id').val(data.id);
    $('#school-address-1').val(data.address_1);
    $('#school-address-2').val(data.address_2);
    $('#school-city').val(data.city);
    $('#school-principal').val(data.principal);
    $('#school-contact-no').val(data.contact_no);
    if (parent_view == 'registered_schools') {
        $('#school-delete').show();
    } else {
        $('#school-delete').hide();
    }
};
var show_class_modal = function (parent_view, data) {
    $('#class-modal-title').html(data.class_name);
    $('#class-name').val(data.class_name);
    $('#class-id').val(data.id);
    $('#class-delete').data('class-id', data.id);


    if (parent_view == 'admin_manage_classes') {
        $('#class-delete').show();
        $('#class-submit').show();
    } else {
        $('#class-name').prop('disabled', true);
        $('#class-delete').hide();
        $('#class-submit').hide();
    }
};

var show_subject_modal = function (parent_view, data) {
    $('#subject-modal-title').html(data.subject_name);
    $('#subject-name').val(data.subject_name);
    $('#subject-id').val(data.id);
    $('#subject-delete').data('subject-id', data.id);


    if (parent_view == 'admin_manage_subjects') {
        $('#subject-delete').show();
        $('#subject-submit').show();
    } else {
        $('#subject-name').prop('disabled', true);
        $('#subject-delete').hide();
        $('#subject-submit').hide();
    }
};
