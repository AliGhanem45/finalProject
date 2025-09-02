@extends('layouts.adminlayout')
@section('content')
    <main class="max-w-6xl mx-auto px-4 py-8">
      <section
        class="bg-white rounded-2xl shadow-sm ring-1 ring-gray-200 overflow-hidden"
      >
        <div class="flex items-center justify-between px-6 py-4 border-b">
          <h2 class="text-lg font-medium">{{__('Joblink.Comments')}}</h2>
        </div>

        <div class="overflow-x-auto">
          <table class="min-w-full text-left">
            <thead>
              <tr>
                <th
                  class="px-6 py-3 text-xs font-semibold uppercase tracking-wider text-white linkedin-blue"
                >
                  Comment_id
                </th>
                <th
                  class="px-6 py-3 text-xs font-semibold uppercase tracking-wider text-white linkedin-blue"
                >
                  Commentor's name
                </th>
                <th
                  class="px-6 py-3 text-xs font-semibold uppercase tracking-wider text-white linkedin-blue"
                >
                  Commentor's id
                </th>
                <th
                  class="px-6 py-3 text-xs font-semibold uppercase tracking-wider text-white linkedin-blue"
                >
                  Content
                </th>
                {{-- <th
                  class="px-6 py-3 text-xs font-semibold uppercase tracking-wider text-white linkedin-blue"
                >
                  location
                </th>
                <th
                  class="px-6 py-3 text-xs font-semibold uppercase tracking-wider text-white linkedin-blue"
                >
                  profession
                </th> --}}
                <th
                  class="px-6 py-3 text-xs font-semibold uppercase tracking-wider text-white linkedin-blue"
                >
                  delete
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <!-- Row 1 -->
              @foreach ($comments as $comment )
              <tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-100">
                <td class="px-6 py-4 font-medium">{{$comment->id}}</td>
                <td class="px-6 py-4 text-gray-600">{{$comment->user->name}}</td>
                <td class="px-6 py-4 text-gray-600">{{$comment->user->id}}</td>
                <td class="px-6 py-4 text-gray-700">
                    {{ $comment->content }}
                </td>
                {{-- <td class="px-6 py-4 text-gray-700"></td>
                <td class="px-6 py-4 text-gray-700"></td> --}}
                <td class="px-6 py-4">
                  <div class="flex items-center gap-2">
                    <form action="{{ route('admin.delete_comment',$comment->id) }}" method = "post">
                      @csrf
                      @method('delete')
                    <button type = "submit"
                      class="blue-50 px-6 py-3 rounded-lg border border-red-500 text-red-600 text-sm font-medium hover:bg-red-50"
                      >{{__('Joblink.Delete')}}</button>
                    {{-- </form>   --}}
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="px-6 py-4 bg-gray-50 border-t text-sm text-gray-600">
          {{ __('Joblink.showing all results') }}
        </div>
      </section>
    </main>
  </body>
</html>
@endsection