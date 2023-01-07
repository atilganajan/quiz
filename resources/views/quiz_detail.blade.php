<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>

    <div class="card">
        <div class="card-body">
            <p class="card-text">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if($quiz->my_rank)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Sıralama
                            <span class="badge bg-success rounded-pill">#{{ $quiz->my_rank }}</span>
                        </li>

                        @endif
                        @if ($quiz->my_result)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Puan
                                <span class="badge bg-primary rounded-pill">{{ $quiz->my_result->point }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Doğru / Yanlış Sayısı
                                <div class="float-right">
                                    <span class="badge bg-success rounded-pill">{{ $quiz->my_result->correct }}
                                        Doğru</span>
                                    <span class="badge bg-danger rounded-pill">{{ $quiz->my_result->wrong }}
                                        Yanlış</span>

                                </div>
                            </li>
                        @endif
                        @if ($quiz->finished_at)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Son Katılım Tarihi
                                <span title="{{ $quiz->finished_at }}"
                                    class="badge bg-secondary rounded-pill">{{ $quiz->finished_at->diffForHumans() }}</span>
                            </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Soru Sayısı
                            <span class="badge bg-secondary rounded-pill">{{ $quiz->questions_count }}</span>
                        </li>
                        @if ($quiz->details)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Katılımcı Sayısı
                                <span class="badge bg-warning rounded-pill">{{ $quiz->details['join_count'] }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Ortalama Puan
                                <span class="badge bg-secondary rounded-pill">{{ $quiz->details['average'] }}</span>
                            </li>
                        @endif
                    </ul>

                    @if (count($quiz->topTen) > 0)
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5 class="card-title">İlk 10</h5>
                                <ul class="list-group">
                                    @foreach ($quiz->topTen as $user)
                                        <li class="list-group-item  d-flex justify-content-between align-items-center">
                                            <strong class="h4">{{ $loop->iteration }}.</strong>
                                            <img class="w-10 h-10 rounded-full"
                                                src="{{ $user->user->profile_photo_url }}">
                                         
                                            <span    @if(auth()->user()->id==$user->user_id) class="text-danger" @endif >{{ $user->user->name }}</span>
                                            
                                            <span class="badge bg-success rounded-pill">{{ $user->point }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                </div>
                <div class="col-md-8 mt-2 mt-md-0">
                    {{ $quiz->description }}</p>
                    @if ($quiz->my_result)
                        <a href="{{ route('quiz.join', $quiz->slug) }}"
                            class="btn btn-warning w-100 btn-sm mt-2">Quiz'i Görüntüle</a>
                    @elseif($quiz->finished_at>now()||$quiz->finished_at== null)
                        <a href="{{ route('quiz.join', $quiz->slug) }}"
                            class="btn btn-primary w-100 btn-sm mt-2">Quiz'e
                            Katıl</a>
                    @endif
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
