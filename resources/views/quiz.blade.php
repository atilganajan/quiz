<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>

    <div class="card">
        <div class="card-body">
            <p class="card-text"></p>
            <form action="{{ route('quiz.result', $quiz->slug) }}" method="post">
                @csrf
                @foreach ($quiz->questions as $question)
                    <strong>{{ $loop->iteration }}. </strong> {{ $question->question }}
                    @if ($question->image)
                        <img src="{{ asset($question->image) }}" class="img-responsive" style="width: 40%">
                    @endif
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}1" value="answer1" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}1">
                            {{ $question->answer1 }}
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}2" value="answer2" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}2">
                            {{ $question->answer2 }}
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}3" value="answer3" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}3">
                            {{ $question->answer3 }}
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}4" value="answer4" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}4">
                            {{ $question->answer4 }}
                        </label>
                    </div>
                    {{-- @if (!$loop->last) --}}
                    <hr class="my-3">
                    {{-- @endif --}}
                @endforeach

                <button type="submit" class="btn btn-outline-success bt-sm w-100 mt-1">Sınavı Bitir</button>
            </form>
        </div>

    </div>
    </div>

</x-app-layout>