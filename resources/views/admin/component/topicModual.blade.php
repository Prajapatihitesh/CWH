<div class="modal fade" id="{{ $modelId }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="{{ $modelId }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modelIdLabel">Insert Language</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($modelId == 'model_language')
                    <form id="languageForm">
                        <input type="hidden" name="_method" value="POST" id="method">

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Language Name" required>
                        </div>
                        <div class="form-group mt-4">
                            <button type="button" class="btn btn-dark col-12" id="insertBtn">ADD</button>
                            <button type="button" class="btn btn-dark col-12" data-uid=""
                                id="updateBtn">UPDATE</button>
                        </div>
                    </form>
                @else
                    <form id="topicForm">
                        <input type="hidden" name="_method" value="POST" id="method">

                        <div class="form-group  ">
                            <input type="text" class="form-control" name="languageId" id="languageId" data-tid="" value="" readonly  required>
                        </div>

                        <div class="form-group mt-4">
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Topic Name" required>
                        </div>
                        <div class="form-group mt-4">
                            <button type="button" class="btn btn-dark col-12" id="insertBtn">ADD</button>
                            <button type="button" class="btn btn-dark col-12" data-uid="" id="updateBtn">UPDATE</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
