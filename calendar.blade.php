@php
    $next_day = true; 
    $flag = 0;
    $counter = 0; 
    $day_counter = 0; 
    $guard = false; 
@endphp

<div class="container mx-auto">
    @while ($next_day)
        @if($counter == 0)
            <div class="flex items-center justify-between flex-wrap">
        @endif
  
        @if ( $flag < 6 )
            @if ($days[$counter]!== $first_day && !$guard)
                <div class="border-2 flex-1 h-32 md:h-40 border-gray-100"></div>
            @else
                @php $guard = true;
                     $day_counter++ 
                @endphp
                <div class="border-2 flex-1 h-32 md:h-40 border-gray-600 pt-2">
                    <span class="border-blue-500 rounded-full border-2 p-1 font-bold">{{ $day_counter }}</span>
                </div>
            @endif
        @else
            @if($day_counter < $number_of_days)
                @php $day_counter++ @endphp
                <div class="border-2 flex-1 h-32 md:h-40 border-gray-600 pt-2">
                    <span class="border-blue-500 rounded-full border-2 p-1 font-bold">{{ $day_counter }}</span>
                </div>
                @if ($day_counter == $number_of_days && $counter == 6)
                    @php $next_day = false @endphp
                @endif
            @else
                <div class="border-2 flex-1 h-32 md:h-40 border-gray-100"></div>
                @if ($counter == 6)
                    @php $next_day = false @endphp
                @endif
            @endif
        @endif

        @if ($counter == 6)
            </div>
        @endif

        @php $counter == 6 ? $counter = 0 : $counter++; $flag++ @endphp

    @endwhile

</div>