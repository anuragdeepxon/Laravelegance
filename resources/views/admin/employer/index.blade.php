@extends('admin.layouts.app')
@section('content')

<link href="{{ asset('css/data_table.css') }}" rel="stylesheet" type="text/css" />

<x-common.card>
    @slot('card_content')

    <div class="overflow-x-auto">

        @component('components.common.card_title', ['title' => 'Employers', 'route' => 'addEmployer', 'button_text' => 'Create'])
        @endcomponent

        <x-common.messages />

        <br>

        <table id="emoployers" class="table table-bordered ">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Company Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        $(function() {

            var table = $('#emoployers').DataTable({
                dom: 'Blfrtip',
                processing: true,
                serverSide: true,
                'language': {
                    "loadingRecords": "&nbsp;",
                    "processing": "<div style='background-color:white; padding:10px'>Processing...</div>"
                },
                "destroy": true,
                "scrollX": false,
                "ajax": {
                    "type": "GET",
                    "headers": {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    "url": "{{ route('employerJson') }}",
                    "dataType": "json",
                    "contentType": 'application/jsondt; charset=utf-8',
                },
                buttons: {
                    buttons: [{
                            text: '<i class="fa fa-plus"></i> Create',
                            className: 'relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800',
                            action: function(e, dt, node, config) {
                                window.location.href = "{{ url('dreamdescriptions/create') }}";
                            }
                        }, {
                            extend: 'print',
                            text: '<i class="fa fa-print"></i> Print',
                            className: 'relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800',
                        }, {
                            text: '<i class="fa fa-undo"></i> Reset',
                            className: 'relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800',
                            action: function(e, dt, node, config) {
                                myTable.ajax.reload()
                            }
                        },
                        {
                            text: '<i class="fa fa-refresh"></i> Reload',
                            className: 'relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800',
                            action: function(e, dt, node, config) {
                                myTable.ajax.reload(null, false);
                            }
                        },
                    ],
                    dom: {
                        button: {
                            className: 'btn'
                        }
                    },
                },
                columns: [{
                        data: 'first_name',
                        name: 'first_name'
                    },
                    {
                        data: 'employer.company_name',
                        name: 'employer.comapny_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },

                    {
                        data: 'employer.address',
                        name: 'employer.address'
                    },
                    {
                        data: 'employer.status',
                        name: 'employer.status'
                    },

                    {
                        data: 'action',
                        name: 'action',
                        "width": "120px",
                        "targets": 'no-sort',
                        "orderable": false,
                        'printable': false
                    },
                ]
            });

        });
    </script>

    @endslot
</x-common.card>
@endsection
