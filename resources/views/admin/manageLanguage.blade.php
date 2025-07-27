@extends('admin.component.layout')


@section('main')
    @include('admin.component.topicModual', ['modelId' => 'model_language'])
    <div class="p-3 m-2 border rounded shadow">
        <div class="row mt-4">
            <div class="col-md-10 p-2">
                <h3 class="text-center">Manage Languages</h3>
            </div>
            <div class="col-md-2 p-2">
                <button type="button" class="btn btn-dark" id="addBtn">
                    Add Language
                </button>
            </div>
        </div>
        @if (isset($languages))
            <hr>
            <div class="row mt-4 table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Index</th>
                            <th>Name</th>
                            <th>UPDATE</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $index = 1;
                        @endphp
                        @foreach ($languages as $language)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $language->name }}</td>
                                <td><button data-eid="{{ $language->id }}" class="btn btn-info editBtn">UPDATE</button></td>
                                <td><button data-did="{{ $language->id }}" class="btn btn-danger deleteBtn">DELETE</button></td>
                            </tr>
                        @endforeach
                        <tr></tr>
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $("#addBtn").click(function() {
                $("#name").val("");
                $("#modelIdLabel").text("Insert Language");
                $("#insertBtn").show();
                $("#updateBtn").hide();
                $('#model_language').modal('toggle');
            });

            $(".deleteBtn").click(function() {
                let id = $(this).data("did");
                Swal.fire({
                    title: "Delete Language?",
                    showDenyButton: true,
                    text: "Are you sure You Want to delete this data?",
                    icon: "question",
                    confirmButtonText: "Delete",
                    denyButtonText: `Don't delete`
                }).then((result) => {
                    if (result.isConfirmed) {
                        let url = `{{ route('admin.language.destroy', '#id') }}`;
                        url = url.replace("#id", id);
                        $.ajax({
                            url: url,
                            type: "delete",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(result) {
                                Swal.fire({
                                    title: result.message,
                                    icon: result.icon
                                }).then(() => {
                                    location.href =
                                        "{{ route('admin.language.index') }}";
                                });
                            }
                        });

                    } else if (result.isDenied) {
                        Swal.fire("Changes are not saved", "", "info");
                    }
                });
            });

            $(".editBtn").click(function() {
                let id = $(this).data("eid");
                let url = `{{ route('admin.language.edit', '#id') }}`;
                url = url.replace("#id", id);
                $.ajax({
                    url: url,
                    type: "get",
                    success: function(result) {
                        $("#name").val(result[0].name);
                        $("#modelIdLabel").text("Update Language");
                        $("#insertBtn").hide();
                        $("#updateBtn").show();
                        $("#updateBtn").attr("data-uid", id);
                        $('#model_language').modal('toggle');
                    }
                });
            });

            $("#insertBtn").click(function() {
                let url = `{{ route('admin.language.store') }}`;
                let languageName = $('#name').val();
                $.ajax({
                    url: url,
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        "name": languageName
                    },
                    success: function(result) {
                        Swal.fire({
                            title: result.message,
                            icon: result.icon,
                        }).then((result) => {
                            location.href = "{{ route('admin.language.index') }}";

                        });
                    }
                });
            });

            $("#updateBtn").click(function() {
                let id = $(this).data("uid");
                let url = `{{ route('admin.language.update', '#id') }}`;
                url = url.replace("#id", id);
                let languageName = $('#name').val();
                $.ajax({
                    url: url,
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        _method: 'PUT',
                        "name": languageName
                    },
                    success: function(result) {
                        Swal.fire({
                            title: result.message,
                            icon: result.icon,
                        }).then((result) => {
                            location.href = "{{ route('admin.language.index') }}";

                        });
                    }
                });
            });
        });
    </script>
@endsection
