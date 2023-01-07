<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>

    <div class="card">
        <div class="card-body">
           <div class=" mb-2">
            <a href="{{ route('quizzes.index') }}" class="btn btn-sm btn-secondary">
                <i class="fa fa-arrow-left"></i> Quizlere Dön</a>
           </div>
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if ($quiz->my_rank)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Sıralama
                                <span class="badge bg-success rounded-pill">#{{ $quiz->my_rank }}</span>
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

                                            <span
                                                @if (auth()->user()->id == $user->user_id) class="text-danger" @endif>{{ $user->user->name }}</span>

                                            <span class="badge bg-success rounded-pill">{{ $user->point }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                </div>

                <div class="col-md-8 mt-2 mt-md-0">
                    {{ $quiz->description }}

                    <table class="table table-bordered mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Ad Soyad</th>
                                <th scope="col">Puan</th>
                                <th scope="col">Doğru</th>
                                <th scope="col">Yanlış</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quiz->results as $result)
                                <tr>
                                    <td >{{$result->user->name}}</td>
                                    <td>{{$result->point}}</td>
                                    <td>{{$result->correct}}</td>
                                    <td>{{$result->wrong}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

</x-app-layout>
