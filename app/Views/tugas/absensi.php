<?= $this->extend('index'); ?>

<?= $this->section('content'); ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Full calendar start -->
            <section id="basic-examples">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="cal-category-bullets d-none">
                                        <div class="bullets-group-1 mt-2">
                                            <div class="category-business mr-1">
                                                <span class="bullet bullet-success bullet-sm mr-25"></span>
                                                Tepat Waktu
                                            </div>
                                            <div class="category-work mr-1">
                                                <span class="bullet bullet-warning bullet-sm mr-25"></span>
                                                Terlambat
                                            </div>
                                            <div class="category-personal mr-1">
                                                <span class="bullet bullet-danger bullet-sm mr-25"></span>
                                                Tidak Masuk
                                            </div>
                                            <div class="category-others">
                                                <span class="bullet bullet-primary bullet-sm mr-25"></span>
                                                Izin
                                            </div>
                                        </div>
                                    </div>
                                    <div id='fc-default'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- calendar Modal starts-->
                <div class="modal fade text-left modal-calendar" tabindex="-1" role="dialog" aria-labelledby="cal-modal" aria-modal="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-text-bold-600" id="cal-modal">Add Event</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form action="#">
                                <div class="modal-body">
                                    <div class="d-flex justify-content-between align-items-center add-category">
                                        <div class="chip-wrapper"></div>
                                        <div class="label-icon pt-1 pb-2 dropdown calendar-dropdown">
                                            <i class="feather icon-tag dropdown-toggle" id="cal-event-category" data-toggle="dropdown"></i>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="cal-event-category">
                                                <span class="dropdown-item business" data-color="success">
                                                    <span class="bullet bullet-success bullet-sm mr-25"></span>
                                                    Tepat Waktu
                                                </span>
                                                <span class="dropdown-item work" data-color="warning">
                                                    <span class="bullet bullet-warning bullet-sm mr-25"></span>
                                                    Terlambat
                                                </span>
                                                <span class="dropdown-item personal" data-color="danger">
                                                    <span class="bullet bullet-danger bullet-sm mr-25"></span>
                                                    Tidak Masuk
                                                </span>
                                                <span class="dropdown-item others" data-color="primary">
                                                    <span class="bullet bullet-primary bullet-sm mr-25"></span>
                                                    Izin
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <fieldset class="form-label-group">
                                        <input type="text" class="form-control" id="cal-event-title" placeholder="Event Title">
                                        <label for="cal-event-title">Event Title</label>
                                    </fieldset>
                                    <fieldset class="form-label-group">
                                        <input type="text" class="form-control pickadate" id="cal-start-date" placeholder="Start Date">
                                        <label for="cal-start-date">Start Date</label>
                                    </fieldset>
                                    <fieldset class="form-label-group">
                                        <input type="text" class="form-control pickadate" id="cal-end-date" placeholder="End Date">
                                        <label for="cal-end-date">End Date</label>
                                    </fieldset>
                                    <fieldset class="form-label-group">
                                        <textarea class="form-control" id="cal-description" rows="5" placeholder="Description"></textarea>
                                        <label for="cal-description">Description</label>
                                    </fieldset>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary cal-add-event waves-effect waves-light" disabled>
                                        Add Event</button>
                                    <button type="button" class="btn btn-primary d-none cal-submit-event waves-effect waves-light" disabled>submit</button>
                                    <button type="button" class="btn btn-flat-danger cancel-event waves-effect waves-light" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-flat-danger remove-event d-none waves-effect waves-light" data-dismiss="modal">Remove</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- calendar Modal ends-->
            </section>
            <script>
                $(document).ready(function() {
                    // color object for different event types
                    var colors = {
                        primary: "#7367f0",
                        success: "#28c76f",
                        danger: "#ea5455",
                        warning: "#ff9f43"
                    };

                    // chip text object for different event types
                    var categoryText = {
                        primary: "Izin",
                        success: "Tepat Waktu",
                        danger: "Tidak Masuk",
                        warning: "Terlambat"
                    };
                    var categoryBullets = $(".cal-category-bullets").html(),
                        evtColor = "",
                        eventColor = "";

                    // calendar init
                    var calendarEl = document.getElementById('fc-default');
                    var dataEvents = [];
                    Date.prototype.toIsoString = function() {
                        var tzo = -this.getTimezoneOffset(),
                            dif = tzo >= 0 ? '+' : '-',
                            pad = function(num) {
                                var norm = Math.floor(Math.abs(num));
                                return (norm < 10 ? '0' : '') + norm;
                            };
                        return this.getFullYear() +
                            '-' + pad(this.getMonth() + 1) +
                            '-' + pad(this.getDate()) +
                            'T' + pad(this.getHours()) +
                            ':' + pad(this.getMinutes()) +
                            ':' + pad(this.getSeconds()) +
                            dif + pad(tzo / 60) +
                            ':' + pad(tzo % 60);
                    }
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        locale: 'id',
                        plugins: ["dayGrid", "timeGrid", "interaction"],
                        customButtons: {
                            addNew: {
                                text: ' Absen',
                                click: function() {
                                    var now = new Date(),
                                        warna = "",
                                        pesan = "",
                                        tipe = "",
                                        batasWaktu = 8;

                                    if (now.getHours() < batasWaktu) {
                                        warna = colors.success;
                                        tipe = "tepat";
                                        pesan = {
                                            'icon': 'success',
                                            'title': 'Tepat Waktu!',
                                            'message': 'Terima kasih telah datang sebelum pukul ' + ("00" + batasWaktu).slice(-2) + ':00'
                                        };
                                    } else {
                                        warna = colors.warning;
                                        tipe = "telat";
                                        pesan = {
                                            'icon': 'warning',
                                            'title': 'Terlambat!',
                                            'message': 'Datanglah sebelum pukul ' + ("00" + batasWaktu).slice(-2) + ':00'
                                        };
                                    }

                                    var calDate = new Date,
                                        todaysDate = calDate.toIsoString().slice(0, 10),
                                        todaysTime = calDate.toLocaleTimeString('id-ID', {
                                            hour12: false
                                        }),
                                        eventTitle = todaysTime,
                                        startDate = todaysDate,
                                        endDate = todaysDate,
                                        correctEndDate = new Date(endDate),
                                        kirimTgl = todaysDate + " " + todaysTime;

                                    Swal.fire({
                                        title: 'Kamu yakin?',
                                        text: "Absen/Izin tidak akan dapat diubah",
                                        showCancelButton: true,
                                        confirmButtonText: 'Absen',
                                        confirmButtonColor: colors.success,
                                        cancelButtonText: 'Izin',
                                        cancelButtonColor: colors.primary,
                                    }).then((result) => {
                                        if (result.value) {
                                            $.ajax({
                                                url: base_url + "/tugas/cekAbsen/",
                                                data: {
                                                    'tipe': tipe,
                                                    'tgl': kirimTgl,
                                                },
                                                type: "post",
                                                success: function(resp) {
                                                    resp = JSON.parse(resp);
                                                    if (resp.result == 'success') {
                                                        calendar.addEvent({
                                                            id: "newEvent",
                                                            title: eventTitle,
                                                            start: startDate,
                                                            editable: false,
                                                            end: correctEndDate,
                                                            color: warna,
                                                            allDay: true
                                                        });
                                                        Swal.fire(
                                                            pesan.title,
                                                            pesan.message,
                                                            pesan.icon
                                                        );
                                                    }
                                                }
                                            });
                                        } else if (
                                            /* Read more about handling dismissals below */
                                            result.dismiss === Swal.DismissReason.cancel
                                        ) {
                                            pesan = {
                                                'icon': 'info',
                                                'title': 'Diizinkan',
                                                'message': 'Harap meminta izin kepada pembimbing PKL.'
                                            };
                                            console.log('izin');
                                            Swal.fire(
                                                pesan.title,
                                                pesan.message,
                                                pesan.icon
                                            );
                                        }
                                    });
                                }
                            },
                        },
                        header: {
                            left: "addNew",
                            right: "prev,title,next"
                        },
                        events: "/tugas/loadabsen",
                        displayEventTime: true,
                        navLinks: true,
                        allDay: true,
                        navLinkDayClick: function(date) {
                            // $(".modal-calendar").modal("show");
                        },
                        // dateClick: function(info) {
                        //     $(".modal-calendar #cal-start-date").val(info.dateStr).attr("disabled", true);
                        //     $(".modal-calendar #cal-end-date").val(info.dateStr);
                        // },
                        // displays saved event values on click
                        // eventClick: function(info) {
                        // $(".modal-calendar").modal("show");
                        // $(".modal-calendar #cal-event-title").val(info.event.title);
                        // $(".modal-calendar #cal-start-date").val(moment(info.event.start).format('YYYY-MM-DD'));
                        // $(".modal-calendar #cal-end-date").val(moment(info.event.end).format('YYYY-MM-DD'));
                        // $(".modal-calendar #cal-description").val(info.event.extendedProps.description);
                        // $(".modal-calendar .cal-submit-event").removeClass("d-none");
                        // $(".modal-calendar .remove-event").removeClass("d-none");
                        // $(".modal-calendar .cal-add-event").addClass("d-none");
                        // $(".modal-calendar .cancel-event").addClass("d-none");
                        // $(".calendar-dropdown .dropdown-menu").find(".selected").removeClass("selected");
                        // var eventCategory = info.event.extendedProps.dataEventColor;
                        // var eventText = categoryText[eventCategory]
                        // $(".modal-calendar .chip-wrapper .chip").remove();
                        // $(".modal-calendar .chip-wrapper").append($("<div class='chip chip-" + eventCategory + "'>" +
                        //     "<div class='chip-body'>" +
                        //     "<span class='chip-text'> " + eventText + " </span>" +
                        //     "</div>" +
                        //     "</div>"));
                        // },
                    });

                    // render calendar
                    calendar.render();

                    // appends bullets to left class of header
                    $("#basic-examples .fc-right").append(categoryBullets);

                    // Close modal on submit button
                    $(".modal-calendar .cal-submit-event").on("click", function() {
                        $(".modal-calendar").modal("hide");
                    });

                    // Remove Event
                    $(".remove-event").on("click", function() {
                        var removeEvent = calendar.getEventById('newEvent');
                        removeEvent.remove();
                    });


                    // reset input element's value for new event
                    if ($("td:not(.fc-event-container)").length > 0) {
                        $(".modal-calendar").on('hidden.bs.modal', function(e) {
                            $('.modal-calendar .form-control').val('');
                        })
                    }

                    // remove disabled attr from button after entering info
                    $(".modal-calendar .form-control").on("keyup", function() {
                        if ($(".modal-calendar #cal-event-title").val().length >= 1) {
                            $(".modal-calendar .modal-footer .btn").removeAttr("disabled");
                        } else {
                            $(".modal-calendar .modal-footer .btn").attr("disabled", true);
                        }
                    });

                    // open add event modal on click of day
                    $(document).on("click", ".fc-day", function() {
                        // $(".modal-calendar").modal("show");
                        // $(".calendar-dropdown .dropdown-menu").find(".selected").removeClass("selected");
                        // $(".modal-calendar .cal-submit-event").addClass("d-none");
                        // $(".modal-calendar .remove-event").addClass("d-none");
                        // $(".modal-calendar .cal-add-event").removeClass("d-none");
                        // $(".modal-calendar .cancel-event").removeClass("d-none");
                        // $(".modal-calendar .add-category .chip").remove();
                        // $(".modal-calendar .modal-footer .btn").attr("disabled", true);
                        // evtColor = colors.primary;
                        // eventColor = "primary";
                    });

                    // change chip's and event's color according to event type
                    $(".calendar-dropdown .dropdown-menu .dropdown-item").on("click", function() {
                        var selectedColor = $(this).data("color");
                        evtColor = colors[selectedColor];
                        eventTag = categoryText[selectedColor];
                        eventColor = selectedColor;

                        // changes event color after selecting category
                        $(".cal-add-event").on("click", function() {
                            calendar.addEvent({
                                color: evtColor,
                                dataEventColor: eventColor,
                                className: eventColor
                            });
                        })

                        $(".calendar-dropdown .dropdown-menu").find(".selected").removeClass("selected");
                        $(this).addClass("selected");

                        // add chip according to category
                        $(".modal-calendar .chip-wrapper .chip").remove();
                        $(".modal-calendar .chip-wrapper").append($("<div class='chip chip-" + selectedColor + "'>" +
                            "<div class='chip-body'>" +
                            "<span class='chip-text'> " + eventTag + " </span>" +
                            "</div>" +
                            "</div>"));
                    });

                    // calendar add event
                    // $(".cal-add-event").on("click", function() {
                    //     $(".modal-calendar").modal("hide");
                    //     var eventTitle = $("#cal-event-title").val(),
                    //         startDate = $("#cal-start-date").val(),
                    //         endDate = $("#cal-end-date").val(),
                    //         eventDescription = $("#cal-description").val(),
                    //         correctEndDate = new Date(endDate);
                    //     calendar.addEvent({
                    //         id: "newEvent",
                    //         title: eventTitle,
                    //         start: startDate,
                    //         end: correctEndDate,
                    //         description: eventDescription,
                    //         color: evtColor,
                    //         dataEventColor: eventColor,
                    //         allDay: true
                    //     });
                    // });

                    // date picker
                    $(".pickadate").pickadate({
                        format: 'yyyy-mm-dd'
                    });
                    <?php
                    foreach ($dataAbsen as $row) {
                        echo '  calendar.addEvent({
                                    id: "' . $row['id'] . '",
                                    title: "' . $row['title'] . '",
                                    start: "' . $row['start'] . '",
                                    editable: ' . $row['editable'] . ',
                                    end: "' . $row['end'] . '",
                                    color: "' . $row['color'] . '",
                                    allDay: ' . $row['allDay'] . '
                                });';
                    }

                    ?>
                })
            </script>
            <!-- // Full calendar end -->

        </div>
    </div>
</div>
<?= $this->endSection(); ?>