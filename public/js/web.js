function openModal(action, modal_size = 'modal-lg') {
	$('#empty_modal').find('.modal-dialog').removeClass('modal-md');
	$('#empty_modal').find('.modal-dialog').removeClass('modal-lg');
	$('#empty_modal').find('.modal-dialog').removeClass('modal-xl');
	$('#empty_modal').find('.modal-dialog').addClass(modal_size);
    var myModal = new bootstrap.Modal(document.getElementById("empty_modal"), {});
	$('#empty_modal .modal-content').html('<div class="modal-body p-5"><div id="pre-modal-loader"><div class="lds-ripple"><div></div><div></div></div></div></div>');
	myModal.show();
	setTimeout(function(){
		$.ajax({
			url: action,
			success: function(response) {
				$('#empty_modal .modal-content').html(response);
                $('input[type=text]').attr('maxlength', 255);
                $('textarea').attr('maxlength', 524288);
			}
		});
	}, 100);
}
function confirmById(confirmText, url){
	Swal.fire({
		title: 'Are you sure?',
		text: confirmText,
		width: 400,
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		if (result.isConfirmed) {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = url;
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            var csrfField = document.createElement('input');
            csrfField.type = 'hidden';
            csrfField.name = '_token';
            csrfField.value = csrfToken;
            var methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'POST';
            form.appendChild(csrfField);
            form.appendChild(methodField);
            document.body.appendChild(form);
            form.submit();
			Swal.fire(
                'Deleted!',
                'Your data has been deleted.',
                'success'
			)
		}
	})
}
function alert(message) {
    Swal.fire({
        position: 'top',
        text: message,
        showConfirmButton: false,
        showCloseButton: true,
        closeButtonHtml: '<i class="fas fa-times"></i>',
        customClass: {
            popup: 'my-alert-class',
            closeButton: 'alert-close-button'
        }
    });
}
function infoModal(status = 'success', title, content) {
    if (status == 'error') {
        $('#info_modal').find('.modal-header').addClass('bg-danger');
    }else{
        $('#info_modal').find('.modal-header').removeClass('bg-danger');
    }
    $('#info_modal').find('.modal-title').html(title);
    $('#info_modal').find('.content').html(content);
    $('#info_modal').modal('show');
}

var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      	toast.addEventListener('mouseenter', Swal.stopTimer)
      	toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
function showToast(type, message) {
    Toast.fire({
        icon: type,
        title: message
    });
}
// $(document).ready(function() {
//     $('input[type=text]').attr('maxlength', 255);
//     $('textarea').attr('maxlength', 524288);
// });