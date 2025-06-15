<div class="modal-para-registro">
    <div class="modal-content rounded-3 shadow">
        <div class="modal-body p-4 text-center">
            <h5 class="mb-3">¿Seguro que querés borrar el local?</h5>
            <p class="mb-0">Se borrará al dueño también</p>
        </div> <div class="modal-footer flex-nowrap p-0">
            <a href="/webtest/src/borrarlocal.php?codigo=<?php echo ($_GET["borrar"]) ?>" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end">
                <strong>Sí</strong>
            </a>
            <a href="/webtest/src/localesadmin.php" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end">
                <strong>No</strong>
            </a>
        </div>
    </div>
</div>