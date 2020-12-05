$(function () {
    // Users -> profile
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('img.user-avatar-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $('input[name="avatar"]').change(function() {
        readURL(this);
    });

    // Roles -> index
    $('a#role-remove-btn').on('click', function () {
        let role_id = $(this).data('id');
        let confirm = $('div#role-remove-modal a#remove-confirm');

        let url = confirm.data('ex');
        confirm.attr('href', url.replace('null', role_id));
    });

});
