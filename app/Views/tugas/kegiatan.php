<?= $this->extend('index'); ?>

<?= $this->section('content'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-area-wrapper">
        <div class="sidebar-left">
            <div class="sidebar">
                <div class="sidebar-content todo-sidebar d-flex">
                    <span class="sidebar-close-icon">
                        <i class="feather icon-x"></i>
                    </span>
                    <div class="todo-app-menu">
                        <div class="form-group text-center add-task">
                            <button type="button" class="btn btn-primary btn-block my-1" data-toggle="modal" data-target="#addTaskModal">Tambah Kegiatan</button>
                        </div>
                        <div class="sidebar-menu-list">
                            <div class="list-group list-group-filters font-medium-1">
                                <a data="semua" class="filter selected list-group-item list-group-item-action border-0 pt-0 active">
                                    <i class="font-medium-5 feather icon-mail mr-50"></i> Semua Kegiatan (<?= $semua; ?>)
                                </a>
                            </div>
                            <hr>
                            <h5 class="mt-2 mb-1 pt-25">Filter</h5>
                            <div class="list-group list-group-filters font-medium-1">
                                <a data="favorite" class="filter list-group-item list-group-item-action border-0"><i class="font-medium-5 feather icon-star mr-50"></i> Favorit (<?= $favorite; ?>)</a>
                                <a data="penting" class="filter list-group-item list-group-item-action border-0"><i class="font-medium-5 feather icon-info mr-50"></i> Penting (<?= $penting; ?>)</a>
                                <a data="completed" class="filter list-group-item list-group-item-action border-0"><i class="font-medium-5 feather icon-check mr-50"></i> Selesai (<?= $selesai; ?>)</a>
                                <a data="deleted" class="filter list-group-item list-group-item-action border-0"><i class="font-medium-5 feather icon-trash mr-50"></i> Dihapus (<?= $dihapus; ?>)</a>
                            </div>
                            <hr>
                            <h5 class="mt-2 mb-1 pt-25">Label</h5>
                            <div class="list-group list-group-labels font-medium-1">
                                <div class="vs-checkbox-con">
                                    <input type="checkbox" class="label" data-value="aktifitas">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check mr-0"></i>
                                        </span>
                                    </span>
                                    <span>Aktifitas</span>
                                </div>
                                <div class="vs-checkbox-con vs-checkbox-warning">
                                    <input type="checkbox" checked class="label" data-value="tugas">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check mr-0"></i>
                                        </span>
                                    </span>
                                    <span>Tugas</span>
                                </div>
                                <div class="vs-checkbox-con vs-checkbox-success">
                                    <input type="checkbox" class="label" data-value="dokumen">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check mr-0"></i>
                                        </span>
                                    </span>
                                    <span>Dokumen</span>
                                </div>
                                <div class="vs-checkbox-con vs-checkbox-danger">
                                    <input type="checkbox" class="label" data-value="kendala">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check mr-0"></i>
                                        </span>
                                    </span>
                                    <span>Kendala</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
                        <div class="modal-content">
                            <section class="todo-form">
                                <form id="form-add-todo" class="todo-input">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="todo-item-action ml-auto">
                                            <a class='todo-item-info'><i class="feather icon-info"></i></a>
                                            <a class='todo-item-favorite'><i class="feather icon-star"></i></a>
                                            <div class="dropdown todo-item-label">
                                                <i class="dropdown-toggle mr-0 mb-1 feather icon-tag" id="todoLabel" data-toggle="dropdown">
                                                </i>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="todoLabel">
                                                    <div class="dropdown-item">
                                                        <div class="vs-checkbox-con">
                                                            <input type="checkbox" data-color="primary" data-value="Aktifitas">
                                                            <span class="vs-checkbox">
                                                                <span class="vs-checkbox--check">
                                                                    <i class="vs-icon feather icon-check mr-0"></i>
                                                                </span>
                                                            </span>
                                                            <span>Aktifitas</span>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-item">
                                                        <div class="vs-checkbox-con">
                                                            <input type="checkbox" data-color="warning" data-value="Tugas">
                                                            <span class="vs-checkbox">
                                                                <span class="vs-checkbox--check">
                                                                    <i class="vs-icon feather icon-check mr-0"></i>
                                                                </span>
                                                            </span>
                                                            <span>Tugas</span>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-item">
                                                        <div class="vs-checkbox-con">
                                                            <input type="checkbox" data-color="success" data-value="Dokumen">
                                                            <span class="vs-checkbox">
                                                                <span class="vs-checkbox--check">
                                                                    <i class="vs-icon feather icon-check mr-0"></i>
                                                                </span>
                                                            </span>
                                                            <span>Dokumen</span>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-item">
                                                        <div class="vs-checkbox-con">
                                                            <input type="checkbox" data-color="danger" data-value="Kendala">
                                                            <span class="vs-checkbox">
                                                                <span class="vs-checkbox--check">
                                                                    <i class="vs-icon feather icon-check mr-0"></i>
                                                                </span>
                                                            </span>
                                                            <span>Kendala</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <fieldset class="form-group">
                                            <input type="text" class="new-todo-item-title form-control" placeholder="Title">
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <textarea class="new-todo-item-desc form-control" rows="3" placeholder="Add description"></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="modal-footer">
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <button type="button" class="btn btn-primary add-todo-item" data-dismiss="modal"><i class="feather icon-check d-block d-lg-none"></i>
                                                <span class="d-none d-lg-block">Add Task</span></button>
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <button type="button" class="btn btn-outline-light" data-dismiss="modal"><i class="feather icon-x d-block d-lg-none"></i>
                                                <span class="d-none d-lg-block">Cancel</span></button>
                                        </fieldset>
                                    </div>
                                </form>
                            </section>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="content-right">
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <div class="app-content-overlay"></div>
                    <div class="todo-app-area">
                        <div class="todo-app-list-wrapper">
                            <div class="todo-app-list">
                                <div class="app-fixed-search">
                                    <div class="sidebar-toggle d-block d-lg-none"><i class="feather icon-menu"></i></div>
                                    <fieldset class="form-group position-relative has-icon-left m-0">
                                        <input type="text" class="form-control" id="todo-search" placeholder="Cari..">
                                        <div class="form-control-position">
                                            <i class="feather icon-search"></i>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="todo-task-list list-group">
                                    <ul class="todo-task-list-wrapper media-list">
                                        <?php foreach ($kegiatan as $row) { ?>
                                            <li class="todo-item <?= ($row->is_finished) ? ('completed') : (''); ?> <?= ($row->is_deleted) ? ('deleted danger') : (''); ?> <?= ($row->favorite) ? ('favorite') : (''); ?> <?= ($row->info) ? ('penting') : (''); ?> <?= ($row->aktifitas) ? ('aktifitas') : (''); ?> <?= ($row->tugas) ? ('tugas') : (''); ?> <?= ($row->dokumen) ? ('dokumen') : (''); ?> <?= ($row->kendala) ? ('kendala') : (''); ?> " data-toggle="modal" data-target="#editTaskModal">
                                                <div class="todo-title-wrapper d-flex justify-content-between mb-50">
                                                    <div class="todo-title-area d-flex align-items-center">
                                                        <div class="title-wrapper d-flex">
                                                            <div class="vs-checkbox-con">
                                                                <input type="checkbox" <?= ($row->is_finished) ? ('checked') : (''); ?>>
                                                                <span class="vs-checkbox vs-checkbox-sm">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <h6 class="todo-title mt-50 mx-50"><?= $row->judul; ?></h6>
                                                        </div>
                                                        <div class="chip-wrapper">
                                                            <?php if ($row->aktifitas) { ?>
                                                                <div class="chip mb-0">
                                                                    <div class="chip-body">
                                                                        <span class="chip-text" data-value="Aktifitas"><span class="bullet bullet-primary bullet-xs"></span> Aktifitas</span>
                                                                    </div>
                                                                </div>
                                                            <?php }
                                                            if ($row->tugas) { ?>
                                                                <div class="chip mb-0">
                                                                    <div class="chip-body">
                                                                        <span class="chip-text" data-value="Tugas"><span class="bullet bullet-warning bullet-xs"></span> Tugas</span>
                                                                    </div>
                                                                </div>
                                                            <?php }
                                                            if ($row->dokumen) { ?>
                                                                <div class="chip mb-0">
                                                                    <div class="chip-body">
                                                                        <span class="chip-text" data-value="Dokumen"><span class="bullet bullet-success bullet-xs"></span> Dokumen</span>
                                                                    </div>
                                                                </div>
                                                            <?php }
                                                            if ($row->kendala) { ?>
                                                                <div class="chip mb-0">
                                                                    <div class="chip-body">
                                                                        <span class="chip-text" data-value="Kendala"><span class="bullet bullet-danger bullet-xs"></span> Kendala</span>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="float-right todo-item-action d-flex">
                                                        <a class='todo-item-info <?= ($row->info) ? ('success') : (''); ?>'><i class="feather icon-info"></i></a>
                                                        <a class='todo-item-favorite <?= ($row->favorite) ? ('warning') : (''); ?>'><i class="feather icon-star"></i></a>
                                                        <?php if ($row->is_deleted) { ?>
                                                            <a class='todo-item-restore danger'><i class="feather icon-rotate-ccw"></i></a>
                                                        <?php } else { ?>
                                                            <a class='todo-item-delete'><i class="feather icon-trash"></i></a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <p class="todo-desc truncate mb-0"><?= $row->deskripsi; ?></p>
                                                <small class="text-muted">dibuat tanggal: <?= $row->created_at ?></small>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                    <div class="no-results">
                                        <h5>No Items Found</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="editTaskModal" tabindex="-1" role="dialog" aria-labelledby="editTodoTask" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
                            <div class="modal-content">
                                <section class="todo-form">
                                    <form id="form-edit-todo" class="todo-input">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editTodoTask">Ubah Kegiatan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="todo-item-action ml-auto">
                                                <a class='edit-todo-item-info todo-item-info'><i class="feather icon-info"></i></a>
                                                <a class='edit-todo-item-favorite todo-item-favorite'><i class="feather icon-star"></i></a>
                                                <div class="dropdown todo-item-label">
                                                    <i class="dropdown-toggle mr-0 mb-1 feather icon-tag" id="todoEditLabel" data-toggle="dropdown">
                                                    </i>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="todoEditLabel">
                                                        <div class="dropdown-item">
                                                            <div class="vs-checkbox-con">
                                                                <input type="checkbox" data-color="primary" data-value="Aktifitas">
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check mr-0"></i>
                                                                    </span>
                                                                </span>
                                                                <span>Aktifitas</span>
                                                            </div>
                                                        </div>
                                                        <div class="dropdown-item">
                                                            <div class="vs-checkbox-con">
                                                                <input type="checkbox" data-color="warning" data-value="Tugas">
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check mr-0"></i>
                                                                    </span>
                                                                </span>
                                                                <span>Tugas</span>
                                                            </div>
                                                        </div>
                                                        <div class="dropdown-item">
                                                            <div class="vs-checkbox-con">
                                                                <input type="checkbox" data-color="success" data-value="Dokumen">
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check mr-0"></i>
                                                                    </span>
                                                                </span>
                                                                <span>Dokumen</span>
                                                            </div>
                                                        </div>
                                                        <div class="dropdown-item">
                                                            <div class="vs-checkbox-con">
                                                                <input type="checkbox" data-color="danger" data-value="Kendala">
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check mr-0"></i>
                                                                    </span>
                                                                </span>
                                                                <span>Kendala</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <fieldset class="form-group">
                                                <input type="text" class="edit-todo-item-title form-control" placeholder="Title">
                                            </fieldset>
                                            <fieldset class="form-group">
                                                <textarea class="edit-todo-item-desc form-control" rows="3" placeholder="Add description"></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="modal-footer">
                                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                                <button type="button" class="btn btn-primary update-todo-item" data-dismiss="modal"><i class="feather icon-edit d-block d-lg-none"></i>
                                                    <span class="d-none d-lg-block">Update</span></button>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                                <button type="button" class="btn" data-dismiss="modal"><i class="feather icon-x d-block d-lg-none"></i>
                                                    <span class="d-none d-lg-block">Batal</span></button>
                                            </fieldset>
                                        </div>
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        function filtering() {
            var filter = "." + $('.filter.selected').attr('data'),
                label = $('.label:checkbox:checked').map(function() {
                    return $(this).attr('data-value');
                }).get(),
                selected_label = "";

            console.log(filter);
            $.each(label, function(i, v) {
                selected_label += "." + v;
                // if (i < label.length - 1) {
                //     selected_label += ", ";
                // }
            });
            console.log(selected_label);

            $('li.todo-item').css('display', 'none');
            if (filter == '.semua' && label.length == 0) {
                $('li.todo-item').removeAttr('style');
            } else if (filter != '.semua' && label.length == 0) {
                $(filter).removeAttr('style');
            } else if (filter == '.semua' && label.length != 0) {
                $(selected_label).removeAttr('style');
            } else {
                $(filter + selected_label).removeAttr('style');
            }
        }
        $('.filter').click(function() {
            $('.filter').removeClass('selected');
            $(this).addClass('selected');
            filtering();
        })
        $('.todo-item-restore').click(function() {
            $(this).toggleClass('todo-item-delete todo-item-restore');
            $(this).html('<i class="feather icon-trash"></i>');
            $(this).closest('li').removeClass('deleted');
            $(this).closest('li').removeClass('danger');
        });
        $('.label').click(function() {
            filtering();
        })
    })
</script>
<?= $this->endSection(); ?>