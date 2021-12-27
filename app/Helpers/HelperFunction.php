<?php

function statusUser($nilai) {
	return $nilai == 1 ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>' ;
}