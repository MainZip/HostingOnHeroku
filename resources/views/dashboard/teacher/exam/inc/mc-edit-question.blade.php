<!--Edit Modal -->
<div class="modal fade" id="editMCQuestionModal{{ $question->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                    Edit</span>
                    <span class="fw-light">
                        Question
                    </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('teacher/exam/update-question/'.$question->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <p class="small">Update Question using this form</p>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Question</label>
                                <textarea class="form-control" name="question" rows="3" required>{{ $question->question }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Choices</label>
                                @php
                                    $options=json_decode(json_encode(json_decode($question['options'])),true);
                                @endphp
                                <div class="input-group flex-nowrap mb-1">
                                    <span class="input-group-text" id="addon-wrapping">A</span>
                                    <input type="text" name="cho1" class="form-control" value="{{ $options['cho1'] }}" placeholder="Option 1" required>
                                </div>
                                <div class="input-group flex-nowrap mb-1">
                                    <span class="input-group-text" id="addon-wrapping">B</span>
                                    <input type="text" name="cho2" class="form-control" value="{{ $options['cho2'] }}" placeholder="Option 2" required>
                                </div>
                                <div class="input-group flex-nowrap mb-1">
                                    <span class="input-group-text" id="addon-wrapping">C</span>
                                    <input type="text" name="cho3" class="form-control" value="{{ $options['cho3'] }}" placeholder="Option 3" required>
                                </div>
                                <div class="input-group flex-nowrap mb-1">
                                    <span class="input-group-text" id="addon-wrapping">D</span>
                                    <input type="text" name="cho4" class="form-control" value="{{ $options['cho4'] }}" placeholder="Option 4" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-group-default">
                                <label>Answer</label>
                                <select name="answer" class="form-select form-control" required>
                                    <option selected hidden >{{ $question->answer }}</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
