<!--Edit Modal -->
<div class="modal fade" id="editTOFQuestionModal{{ $question->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <div class="form-check">
                                    <label class="form-radio-label">
                                        <input class="form-radio-input" type="radio" disabled>
                                        <input type="hidden" name="cho1" value="True">
                                        <span class="form-radio-sign"> True</span>
                                    </label>
                                    <label class="form-radio-label">
                                        <input class="form-radio-input" type="radio" disabled>
                                        <input type="hidden" name="cho2" value="False">
                                        <span class="form-radio-sign"> False</span>
                                    </label>
                                    <input type="hidden" name="cho3">
                                    <input type="hidden" name="cho4">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-group-default">
                                <label>Answer</label>
                                <select name="answer" class="form-select form-control" required>
                                    <option selected hidden >{{ $question->answer }}</option>
                                    <option value="True">True</option>
                                    <option value="False">False</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
