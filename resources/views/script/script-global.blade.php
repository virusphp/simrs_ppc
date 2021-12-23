<script>
	$(function() {
		window.onload = function() {
			let sidebar = $("#sidebar");
			sidebar.attr("class", "c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show c-sidebar-minimized");
		};

		// validator
		$.validator.setDefaults({
			ignore: [],
			highlight: function(element) {
				$(element).closest('.form-control').addClass('is-invalid');
			},
			unhighlight: function(element) {
				$(element).closest('.form-control').removeClass('is-invalid');
				$(element).closest('.form-control').addClass('is-valid');
			},
			errorClass: "text-danger",
			errorElement: "small",
			lang: 'id', // or whatever language option you have.
			errorPlacement: function(error, element) {
				if (element.parent().hasClass('form-group')) {
					error.insertAfter(element.parent());
				} else if (element.parent().hasClass('form-check')) {
					error.insertAfter(element.parent());
				} else if (element.parent().hasClass('input-group')) {
					error.insertAfter(element.parent());
				} else if (element.hasClass('select2') && element.next('.select2-container').length) {
					error.insertAfter(element.next('.select2-container'));
				} else {
					error.insertAfter(element);
				}
			},
		})
		// Config Constanta Toast
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000,
			onOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		});

		// Config Constanta Swal
		window.swalWithBootstrapButtons = Swal.mixin({
			customClass: {
				confirmButton: 'btn btn-success mx-4',
				cancelButton: 'btn btn-danger mx-4'
			},
			buttonsStyling: false
		});

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		})
	})
</script>