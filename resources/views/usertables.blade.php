@extends('layouts.adminlayout')
@section('content')
    <main class="max-w-6xl mx-auto px-4 py-8">
      <section
        class="bg-white rounded-2xl shadow-sm ring-1 ring-gray-200 overflow-hidden"
      >
        <div class="flex items-center justify-between px-6 py-4 border-b">
          <h2 class="text-lg font-medium">{{__('Joblink.Users')}}</h2>
        </div>

        <div class="overflow-x-auto">
          <table class="min-w-full text-left">
            <thead>
              <tr>
                <th
                  class="px-6 py-3 text-xs font-semibold uppercase tracking-wider text-white linkedin-blue"
                >
                  Name
                </th>
                <th
                  class="px-6 py-3 text-xs font-semibold uppercase tracking-wider text-white linkedin-blue"
                >
                  id
                </th>
                <th
                  class="px-6 py-3 text-xs font-semibold uppercase tracking-wider text-white linkedin-blue"
                >
                  bio
                </th>
                <th
                  class="px-6 py-3 text-xs font-semibold uppercase tracking-wider text-white linkedin-blue"
                >
                  location
                </th>
                <th
                  class="px-6 py-3 text-xs font-semibold uppercase tracking-wider text-white linkedin-blue"
                >
                  profession
                </th>
                <th
                  class="px-6 py-3 text-xs font-semibold uppercase tracking-wider text-white linkedin-blue"
                >
                  delete
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <!-- Row 1 -->
              @foreach ($users as $user )
              <tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-100">
                <td class="px-6 py-4 font-medium"><a href="{{ route('admin.posts.dashboard',$user->id) }}">{{$user->name}}</a></td>
                <td class="px-6 py-4 text-gray-600">{{$user->id}}</td>
                <td class="px-6 py-4 text-gray-700">
                  {{ $user->bio }}
                </td>
                <td class="px-6 py-4 text-gray-700">{{$user->location}}</td>
                <td class="px-6 py-4 text-gray-700">{{$user->profession}}</td>
                <td class="px-6 py-4">
                  <div class="flex items-center gap-2">
                    <form action="{{ route('admin.users.destroy',$user->id) }}" method = "post">
                      @csrf
                      @method('delete')
                    <button type = "submit"
                      class="blue-50 px-6 py-3 rounded-lg border border-red-500 text-red-600 text-sm font-medium hover:bg-red-50"
                      >{{__('Joblink.Delete')}}</button>
                    </form>  
                  </div>
                </td>
              </tr>
              @endforeach
              <!-- Row 2 -->
              {{-- <tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-100">
                <td class="px-6 py-4 font-medium">Omar Sayegh</td>
                <td class="px-6 py-4 text-gray-600">USR-00124</td>
                <td class="px-6 py-4 text-gray-700">
                  Data-driven marketer who loves turning insights into
                  measurable growth.
                </td>
                <td class="px-6 py-4 text-gray-700">Austin, TX</td>
                <td class="px-6 py-4 text-gray-700">Growth Marketer</td>
                <td class="px-6 py-4">
                  <div class="flex items-center gap-2">
                    <a
                      href="#"
                      class="px-3 py-1.5 rounded-lg border border-red-500 text-red-600 text-sm font-medium hover:bg-red-50"
                      >Delete</a
                    >
                  </div>
                </td>
              </tr>

              <!-- Row 3 -->
              <tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-100">
                <td class="px-6 py-4 font-medium">Sara Khoury</td>
                <td class="px-6 py-4 text-gray-600">USR-00125</td>
                <td class="px-6 py-4 text-gray-700">
                  UX designer crafting accessible, human-centered experiences
                  for SaaS products.
                </td>
                <td class="px-6 py-4 text-gray-700">Toronto, ON</td>
                <td class="px-6 py-4 text-gray-700">UX Designer</td>
                <td class="px-6 py-4">
                  <div class="flex items-center gap-2">
                    <a
                      href="#"
                      class="px-3 py-1.5 rounded-lg border border-red-500 text-red-600 text-sm font-medium hover:bg-red-50"
                      >Delete</a
                    >
                  </div>
                </td>
              </tr> --}}
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
