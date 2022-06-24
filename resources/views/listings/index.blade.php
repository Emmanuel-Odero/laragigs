<x-layout>
@include('partials._hero')
@include('partials._search')
        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
            @unless(count($listings) == 0)
                
                @foreach($listings as $listing)
                    {{-- Items --}}
                    <x-listing-card :listing="$listing"/>
                    {{-- Items End--}}
                @endforeach

                @else
                    <p>No Listings Found</p>
            @endunless
        </div>
</x-layout>