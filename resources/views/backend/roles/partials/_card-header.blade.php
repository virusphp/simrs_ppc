<div class="card-header pb-0 mb-0">
	<div class="row">
		<div class="col-md-4">
			<h4><b>Daftar</b> Roles</h4>
		</div>

		<div class="col-md-4">
			<p></p>
		</div>

		<div class="col-md-4">
			<div class="row">
				<div class="form-group mr-1">
					<div class="controls">
						<div class="input-group">
							<label class="mx-2 my-1" for="pulang-sep">Cari Roles</label>
							<input class="form-control form-control-sm" id="input-cari-history" type="text"
								placeholder="No Rm">
							<span class="input-group-append">
								<button id="btn-cari-history" class="btn btn-sm btn-info" type="button">Cari</button>
							</span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="controls">
						<a id="add-user" href="{{ route('roles.create') }}"
							class="add-user-btn btn btn-sm btn-primary d-none d-md-block">
							<i class="fas fa-plus"></i>
							Tambah
						</a>
						<a href="{{ route('roles.create') }}"
							class="add-user-btn btn btn-sm btn-primary mb-2 d-md-none">
							<i class="fas fa-plus"></i>
						</a>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>