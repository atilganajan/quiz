<x-app-layout>
    <x-slot name="header">Quiz Güncelle</x-slot>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('quizzes.update', $quiz->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="mb-2">Quiz Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{ $quiz->title }}">
                </div>
                <div class="form-group">
                    <label class="my-2">Quiz Açıklama</label>
                    <textarea name="description" class="form-control" rows="4">{{ $quiz->description }}</textarea>
                </div>

                <div class="form-group">dasdasdsadadas
                    <label>Quiz Durumu</label>
                    <select name="status" class="form-control">
                        <option @if ($quiz->questions_count < 4) disabled @endif
                            @if ($quiz->status === 'publish') selected @endif value="publish">Aktif</option>
                        <option @if ($quiz->status === 'passive') selected @endif value="passive">Pasif</option>
                        <option @if ($quiz->status === 'draft') selected @endif value="draft">Taslak</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="checkbox" class="form-group" id="isFinished">
                    <label class="my-2">Quiz Bitiş Tarihi Olacak mı?</label>
                </div>
                <div class="form-group " id="quizTime" style="display: none">
                    <label class="my-2">Quiz Bitiş Tarihi</label>
                    <input type="datetime-local" name="finished_at" id="date" class="form-control"
                        value="{{ $quiz->finished_at }}">
                </div>
                <div class="form-group">
                    <button class="btn  btn-outline-success w-100 mt-2" type="submit"><b>Quiz Güncelle</b></button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $(document).ready(function() {
                if ($("#date").val()) {
                    $('#isFinished').prop('checked', true);
                    $("#quizTime").show()
                }
            });

            $("#isFinished").change(function() {
                if ($("#isFinished").is(":checked")) {
                    $("#quizTime").show()
                } else {
                    $("#quizTime").hide()
                }
            })
        </script>
    </x-slot>

</x-app-layout>
