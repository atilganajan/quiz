<x-app-layout>
    <x-slot name="header">{{ $question->question }} Düzenle</x-slot>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('questions.update', [$question->quiz_id, $question->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="mb-2">Soru</label>
                    <textarea name="question" class="form-control" rows="4">{{ $question->question }}</textarea>
                </div>
                <div class="form-group">
                    <label class="my-2">Fotoğraf</label>
                    @if ($question->image)
                        <div class="d-flex">
                            <a href="{{ asset($question->image) }}" target="_blank">
                                <img src="{{ asset($question->image) }}" class="img-responsive mb-2"
                                    style="width:200px">
                            </a>
                        </div>
                    @endif
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="mb-2">1. Cevap</label>
                            <textarea name="answer1" class="form-control" rows="2">{{ $question->answer1 }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="mb-2">2. Cevap</label>
                            <textarea name="answer2" class="form-control" rows="2">{{ $question->answer2 }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="mb-2">3. Cevap</label>
                            <textarea name="answer3" class="form-control" rows="2">{{ $question->answer3 }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="mb-2">4. Cevap</label>
                            <textarea name="answer4" class="form-control" rows="2">{{ $question->answer4 }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="mb-2">Doğru Cevap</label>
                    <select name="correct_answer" class="form-control">
                        <option @if ($question->correct_answer === 'answer1') selected @endif value="answer1">1. Cevap</option>
                        <option @if ($question->correct_answer === 'answer2') selected @endif value="answer2">2. Cevap</option>
                        <option @if ($question->correct_answer === 'answer3') selected @endif value="answer3">3. Cevap</option>
                        <option @if ($question->correct_answer === 'answer4') selected @endif value="answer4">4. Cevap</option>
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn  btn-outline-success w-100 mt-2" type="submit"><b>Soruyu Güncelle</b></button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
