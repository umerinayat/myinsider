@extends('layouts.master')

@section('extra-head')
    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('page-title')
  {{__('labels.Admins')}}
@endsection

@section('main-content')

          <!-- DataTales Clients -->
          <div class="card shadow mb-4">
            
          <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0 text-gray-800">{{__('labels.Admins')}}</h1>
                
                <a href="{{ route('createAdmin') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus-circle fa-sm"></i>
                    </span>
                    <span class="text">  {{__('labels.Add Admin')}} </span>
              </a>  

              </div>
            </div>
            
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTableAdmins" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>{{ __('labels.First Name') }}</th>
                      <th>{{ __('labels.Last Name') }}</th>
                      <th>{{ __('labels.Email') }}</th>
                      <th>{{ __('labels.Modify') }}</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>{{ __('labels.First Name') }}</th>
                      <th>{{ __('labels.Last Name') }}</th>
                      <th>{{ __('labels.Email') }}</th>
                      <th>{{ __('labels.Modify') }}</th>
                    </tr>
                  </tfoot>
                  <tbody>

                   @for($i = 0; $i < count($admins); $i++)
                    <tr>
                        <td class="pt-4">{{ $i + 1 }}</td>
                        <td  class="p-4">{{ $admins[$i]->first_name }}</td>
                        <td  class="p-4">{{ $admins[$i]->last_name }}</td>
                        <td  class="p-4">{{ $admins[$i]->email }}</td>

                        

                        <td  class="p-4">  <a href="{{ route('editAdmin', ['id' => $admins[$i]->id]) }}" class=" p-0 m-0">{{__('labels.Edit')}} </a>, <button id="{{$admins[$i]->id}}"  class="btn deleteBtn btn-link p-0 m-0">{{__('labels.Delete')}} </button></td>
                        
                    </tr>
                    @endfor

                  </tbody>
                </table>
              </div>
            </div>
          </div>

@endsection

@section('extra-script')
    <!-- Custom scripts for this page -->

  <!-- Page level plugins -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->

  <script>

$(document).ready(function() {

var appLocale = $('#appLocale').val();
if (appLocale === 'en') {

  $('#dataTableAdmins').DataTable({
    language: {
       //

      "decimal":        "",
      "emptyTable":     "No data available in table",
      "info":           "Showing _START_ to _END_ of _TOTAL_ Admins",
      "infoEmpty":      "Showing 0 to 0 of 0 Admins",
      "infoFiltered":   "(filtered from _MAX_ total Admins)",
      "infoPostFix":    "",
      "thousands":      ",",
      "lengthMenu":     "Show _MENU_ Admins",
      "loadingRecords": "Loading...",
      "processing":     "Processing...",
      "search":         "Search:",
      "zeroRecords":    "No matching records found",
      "paginate": {
          "first":      "First",
          "last":       "Last",
          "next":       "Next",
          "previous":   "Previous"
      },
      "aria": {
          "sortAscending":  ": activate to sort column ascending",
          "sortDescending": ": activate to sort column descending"
      }
              //
    }
  });

  // 
} else if (appLocale === 'de') {


  $('#dataTableAdmins').DataTable({
    language: {
      //
      "decimal":        "",
      "emptyTable":     "Keine Daten in der Tabelle verfügbar",
      "info":           "Zeige _START_ bis _END_ von _TOTAL_ Administratoren",
      "infoEmpty":      "Zeige 0 bis 0 von 0 Administratoren",
      "infoFiltered":   "(filtered from _MAX_ total Administratoren)",
      "infoPostFix":    "",
      "thousands":      ",",
      "lengthMenu":     "Show _MENU_ Administratoren",
      "loadingRecords": "Loading...",
      "processing":     "Processing...",
      "search":         "Suche:",
      "zeroRecords":    "Keine übereinstimmenden Aufzeichnungen gefunden",
      "paginate": {
          "first":      "Zuerst",
          "last":       "Zuletzt",
          "next":       "Nächste",
          "previous":   "Letzte"
      },
      "aria": {
          "sortAscending":  ": activate to sort column ascending",
          "sortDescending": ": activate to sort column descending"
      }
      //
    }
  });

}
});

      var $adminId = 0;
    
       // confrim delete 
       $('.deleteBtn').on('click', function (evt) {

            $adminId = this.id;

            var commitModal = Swal.fire({
                title: '{{ __("labels.Confrim Delete.") }}',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: '{{ __("labels.NO") }}',
                cancelButtonColor: 'rgb(48, 133, 214)',
                confirmButtonColor: '#FA8072',
               
                confirmButtonText: '{{ __("labels.YES") }}',
                showConfirmButton: true,
            }).then((result) => {
                if (result.value) {
                  // Swal.fire(
                  //   '{{ __("labels.Deleted!") }}',
                  //   '{{ __("labels.Project has been deleted.") }}',
                  //     'success'
                  //   )

                  window.location.href = '/admin/delete/' + $adminId;
                    
                } else {
                    //
                }
            });
        });
        

  </script>

   

@endsection
    
