@extends('layouts.admin.main')
@section('title')
    Admin || Dashboard
@endsection
@section('pages')
    Dashboard
@endsection
@section('content')
  <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card app-calendar-wrapper">
                <div class="row g-0">
                  <!-- Calendar Sidebar -->
                  <div class="col app-calendar-sidebar" id="app-calendar-sidebar">
                    <div class="p-3">
                      <!-- inline calendar (flatpicker) -->
                      <div class="inline-calendar"></div>

                      <hr class="container-m-nx mb-4 mt-3" />

                      <!-- Filter -->
                      <div class="mb-3 ms-3">
                        <small class="text-small text-muted text-uppercase align-middle">Filter</small>
                      </div>
                      <div class="app-calendar-events-filter ms-3">
                        <div class="form-check form-check mb-2">
                          <input
                            class="form-check-input input-filter"
                            type="checkbox"
                            id="select-business"
                            data-value="business"
                            checked
                          />
                          <label class="form-check-label" for="select-business">Jadwal</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /Calendar Sidebar -->

                  <!-- Calendar & Modal -->
                  <div class="col app-calendar-content">
                    <div class="card shadow-none border-0">
                      <div class="card-body pb-0">
                        <!-- FullCalendar -->
                        <div id="calendar"></div>
                      </div>
                    </div>
                    <div class="app-overlay">
                    </div>
                    <!-- FullCalendar Offcanvas -->
                    <div
                      class="offcanvas offcanvas-end event-sidebar"
                      tabindex="-1"
                      id="addEventSidebar"
                      aria-labelledby="addEventSidebarLabel"
                    >
                      <div class="offcanvas-body pt-0">
                        <form class="event-form pt-0" id="eventForm" onsubmit="return false">
                          <div class="mb-3">
                            <label class="form-label" for="eventTitle">Nama</label>
                            <input type="text" class="form-control" id="eventTitle" name="eventTitle" placeholder="Event Title" />
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="eventStartDate">Waktu Konsultasi</label>
                            <input type="text" class="form-control" id="eventStartDate" name="eventStartDate" placeholder="Start Date" />
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" />
                          </div>
                          <div class="mb-3 select2-primary">
                            <label class="form-label" for="no_telp">Nomor Telepon</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Nomor Telepon" />
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="eventDescription">Deskripsi</label>
                            <textarea class="form-control" name="eventDescription" id="eventDescription"></textarea>
                          </div>
                          <div class="mb-3 d-flex justify-content-sm-between justify-content-start my-4">
                            <div class="d-none">
                              <button type="submit" class="btn btn-primary btn-add-event me-sm-3 me-1 d-none">Add</button>
                              <button type="reset" class="btn btn-label-secondary btn-delete-event me-sm-0 me-1 d-none" data-bs-dismiss="offcanvas">
                                Cancel
                              </button>
                            </div>
                            <div>
                              <button type="reset" class="btn btn-label-secondary btn-cancel me-sm-0 me-1 btn-cancel" data-bs-dismiss="offcanvas">
                                Close
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- /Calendar & Modal -->
                </div>
              </div>
            </div>
            <!-- / Content -->

<script>
    let jadwalKonsultasi = @json($jadwalKonsultasi);

    let events = jadwalKonsultasi.map(function(konsultasi) {
        let startDate = new Date(konsultasi.tanggal);
        let endDate = new Date(konsultasi.tanggal);

        return {
            id: konsultasi.id,
            url: '', 
            title: konsultasi.nama, 
            start: startDate, 
            end: endDate, 
            allDay: false,
            extendedProps: {
                calendar: 'Business',
                email: konsultasi.email,
                no_telp: konsultasi.nomor_telepon,
                deskripsi: konsultasi.deskripsi
            }
        };
    });

    function populateFormWithEvent(event) {
        document.getElementById('eventTitle').value = event.title;
        document.getElementById('eventStartDate').value = event.start.toLocaleString();
        document.getElementById('email').value = event.extendedProps.email;
        document.getElementById('no_telp').value = event.extendedProps.no_telp;
        document.getElementById('eventDescription').value = event.extendedProps.deskripsi;
    }

    if (events.length > 0) {
        populateFormWithEvent(events[0]);
    }

    console.log('Events:', events);
</script>

@endsection