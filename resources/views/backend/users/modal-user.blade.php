<div class="modal fade" id="modal-user" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dark" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-title-user"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="form-user">
					<input type="hidden" id="id-user" value="">
					@include('backend.users._form')
					<div class="form-group text-right">
						<button type="button" class="btn btn-sm btn-primary" id="btn-action-user" type="submit">
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>