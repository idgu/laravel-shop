@extends('layouts.app')


@section('content')



        <h1>FAQ</h1>
        <hr class="soften"/>
        <div class="accordion" id="accordion2" style="margin-top: 20px;">
            @if($faq)

                @foreach($faq as $question)

                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse{{$question->id}}">
                                    {{ $question->question }}
                                </a></h4>
                        </div>
                        <div id="collapse{{$question->id}}" class="accordion-body collapse"  >
                            <div class="accordion-inner">
                                {{  $question->answer }}
                            </div>
                        </div>
                    </div>

                @endforeach

            @endif


        </div>










@endsection