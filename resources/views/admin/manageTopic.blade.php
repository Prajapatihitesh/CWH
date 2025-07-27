@extends('admin.component.layout')


@section('main')
    @include('admin.component.topicModual', ['modelId' => 'model_topic'])

    <div class="p-3 m-2 border rounded shadow">
        <h3 class="text-center">Manage Topic</h3>
        <hr>
        <div class="row mt-4">
            <div class="col-md-10 p-2">
                <select class="form-select" id="selectLanguage" required>
                    <option selected disabled value="">--Select Language--</option>
                    @foreach ($languages as $language)
                        @if (isset($id) && $id == $language['id'])
                            <option selected value="{{ $language['id'] }}">{{ $language['name'] }}</option>
                        @else
                            <option value="{{ $language['id'] }}">{{ $language['name'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 p-2">
                <button type="button" class="btn btn-dark" id="addBtn">
                    Add Topic
                </button>
            </div>
        </div>
        @if (isset($topics))
            <hr>
            <div class="row mt-4 table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Index</th>
                            <th>Name</th>
                            <th>ADD SUB-TOPIC</th>
                            <th>UPDATE</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $index = 1;
                        @endphp
                        @foreach ($topics as $topic)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{ $topic->name }}</td>
                                <td><a href="" class="btn btn-dark">ADD SUB-TOPIC</a></td>
                                <td><button data-eid="{{ $topic->id }}" class="btn btn-info editBtn">UPDATE</button></td>
                                <td><button data-did="{{ $topic->id }}" class="btn btn-danger deleteBtn">DELETE</button>
                                </td>
                                <td></td>
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
            $('#selectLanguage').change(function() {
                let id = $(this).val();
                let url = `{{ route('admin.topic.show', '#id') }}`;
                url = url.replace("#id", id);
                location.href = url;
            });

            $("#addBtn").click(function() {
                $("#name").val("");
                $("#modelIdLabel").text("Insert Topic");
                $("#languageId").val($("#selectLanguage option:selected").text());
                $("#languageId").attr("data-tid", $("#selectLanguage").val());
                $("#insertBtn").show();
                $("#updateBtn").hide();
                if($("#selectLanguage").val() != null){
                    $('#model_topic').modal('toggle');
                }else{
                    Swal.fire({
                        title: "Language are not selected",
                        text: "Please select Language First",
                        icon: "error",
                    })
                }
            });

            $(".deleteBtn").click(function() {
                let id = $(this).data("did");
                let urlSegments = window.location.pathname.split('/');
                let languageId = urlSegments[urlSegments.length - 1];
                Swal.fire({
                    title: "Delete Topic?",
                    showDenyButton: true,
                    text: "Are you sure You Want to delete this data?",
                    icon: "question",
                    confirmButtonText: "Delete",
                    denyButtonText: `Don't delete`
                }).then((result) => {
                    if (result.isConfirmed) {
                        let url = `{{ route('admin.topic.destroy', '#id') }}`;
                        url = url.replace("#id", id);
                        $.ajax({
                            url: url,
                            type: "delete",
                            data:{"languageId":languageId},
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(result) {
                                Swal.fire({
                                    title: result.message,
                                    icon: result.icon
                                }).then(() => {

                                    let url = `{{ route('admin.topic.show', '#id') }}`;
                                    url = url.replace("#id", languageId);
                                    location.href = url;
                                });
                            }
                        });

                    } else if (result.isDenied) {
                        Swal.fire("Changes are not saved", "", "info");
                    }
                });
            });

            $("#insertBtn").click(function() {
                let url = `{{ route('admin.topic.store') }}`;
                let topicName = $('#name').val();
                let languageId = $("#languageId").data('tid');
                $.ajax({
                    url: url,
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        "languageId":languageId,
                        "name": topicName
                    },
                    success: function(result) {
                        Swal.fire({
                            title: result.message,
                            icon: result.icon,
                        }).then((result) => {
                            let url = `{{ route('admin.topic.show', '#id') }}`;
                            url = url.replace("#id", languageId);
                            location.href = url;

                        });
                    }
                });
            });

            $(".editBtn").click(function() {
                let id = $(this).data("eid");
                let url = `{{ route('admin.topic.edit', '#id') }}`;
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

            $("#updateBtn").click(function() {
                let id = $(this).data("uid");
                let url = `{{ route('admin.topic.update', '#id') }}`;
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
                            location.href = "{{ route('admin.topic.index') }}";

                        });
                    }
                });
            });
        });
    </script>
@endsection
