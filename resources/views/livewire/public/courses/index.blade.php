<div class="grid grid-cols-3 gap-4">
  @foreach ($courses as $course)

  <figure class="relative ">
    <a href="{{ route('checkout.register', $course->id )}}">
      <img class="rounded-lg transform transition hover:scale-105 duration-300 ease-in-out object-contain" src="{{ asset('storage/course/cover/' . $course->id . '.png') }}"
        alt="image description">
      <figcaption
        class="absolute w-full text-3xl p-5 text-white bottom-0 bg-gradient-to-t from-gray-900 to-transparent dark:from-black">
        <p>{{ $course->title}}</p>
      </figcaption>
    </a>
  </figure>
  @endforeach
</div>