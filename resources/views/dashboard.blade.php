<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Dashboard') }}
		</h2>
	</x-slot>
   <div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
				<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
					<h1 class="mb-4 text-2xl font-medium text-gray-900"> Add a movie to your list! </h1>
					<div class="mt-2">
						<x-label for="title" value="Title" />
						<x-input id="title" class="upload-title block mt-1 w-full" type="text" name="title" required autofocus />
					</div>
					<div class="mt-2">
						<x-label for="description" value="Description" />
						<textarea id="description" class="upload-description border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" name="description" autofocus></textarea>
					</div>
					<div class="mt-2">
						<x-label for="url" value="URL to IMDB" />
						<x-input id="url" class="upload-url block mt-1 w-full" type="text" name="url" required autofocus />
					</div>
					<div class="mt-2">
						<x-label for="img" value="Image" />
						<style>input[type=file]::file-selector-button{background:0 0;color:inherit;border:none;padding:0;font:inherit;cursor:pointer;outline:inherit}</style>
						<div class="flex items-center justify-start mt-4">
							<input class="upload-image inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" type="file" id="img" name="img" accept="image/*">
						</div>
					</div>
					<div class="flex items-center justify-end mt-4">
						<x-button class="ml-4 add-movie"> Add to list </x-button>
					</div>
				</div>
				<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
					<!--Form for search / sort / upcoming-->
                    <form method="GET">
                    <label for="search-input">Search:</label>
                    <x-input type="text" name="search" placeholder="Type to search..." />
                    
                    <label for="sort-select">Sort by:</label>
                    <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="sort">
                        <option value="">Select a value</option>
                        <option value="A-Z">A-Z</option>
                        <option value="Z-A">Z-A</option>
                    </select>
                    
                    <label for="sort-select">Upcoming:</label>
                    <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="upcoming">
                        <option value="">Select a value</option>
                        <option value="true">True</option>
                        <option value="false">False</option>
                    </select>
                    
                    <x-button class="mt-5" type="submit" >Apply</x-button>
                </form>
				</div>
				<div id="main">
					<div class="check_me bg-gray-200 pages bg-opacity-25 grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 p-6 lg:p-8 ">
						<!-- For every row draw a item div and paginate it if it exceeds 15 --> 
                        @foreach ($movies as $movie)
                        <div class="item" data-title="{{ $movie->title }}">
							<img id="img-{{ $movie->id }}" src="{{ Storage::url($movie->img) }}" alt="{{ $movie->title }}" width="200">
							<div class="flex items-center mt-5">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
									<path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
								</svg>
								<!-- Movie title -->
								<h2 class="ml-3 text-xl font-semibold text-gray-900">
									<a id="title-{{ $movie->id }}">{{ $movie->title }}</a>
								</h2>
							</div>
							<!-- Movie description -->
							<p id="desc-{{ $movie->id }}" class="mt-4 text-gray-500 text-sm leading-relaxed">{{ $movie->description }}</p>
							<!-- Movie IMDB -->
							<p class="mt-4 text-sm">IMDB : <x-button id="imdb-{{ $movie->id }}" onclick='window.open("{{ $movie->url }}","_blank")' style="margin-left:5px">Click me</x-button>
							</p>
							<!-- Movie Status -->
							<p class="mt-4 text-sm">Seen status : <x-button class="watch-update-movie" data-movie-id="{{ $movie->id }}" style="margin-left:5px">@if ($movie->seen == 'yes') Mark as not seen @else Mark as seen @endif</x-button>
							</p>
							<!-- Movie DATE -->
							<p class="mt-4 text-sm">Schedule watch date : <x-button class="date-button" style="margin-left:5px" data-id="{{ $movie->id }}" data-date="{{ $movie->watch_soon ? $movie->watch_soon : 'not set' }}">{{ $movie->watch_soon ? $movie->watch_soon : 'not set' }}</x-button>
							</p>
							<div class="flex items-center justify-start mt-4">
								<!-- Movie Edit -->
								<x-button class="edit-button" data-id-edit="{{ $movie->id }}" data-title-edit="{{ $movie->title }}" data-desc-edit="{{ $movie->description }}" data-url-edit="{{ $movie->url }}">Edit</x-button>
								<!-- Movie IMDB -->
								<x-button class="delete-movie" data-movie-id="{{ $movie->id }}" style="margin-left:5px">Delete</x-button>
							</div>
						</div>
                        @endforeach
					</div>
					<div class="flex items-center justify-center mt-4 mb-4">
                    {{ $movies->links('components.pagination') }}
					</div>
					<!--Update information/Edit modal popup-->
					<div id="edit_mode" class="modal hidden fixed z-10 inset-0 overflow-y-auto">
						<div class="flex items-center justify-center min-h-screen">
							<div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
							<div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
								<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
									<h1 class="mb-4 text-2xl font-medium text-gray-900"> Add a movie to your list! </h1>
									<x-input id="edit-id" class="block mt-1 w-full" type="hidden" name="edit-id" required autofocus />
									<div class="mt-2">
										<x-label for="edit-title" value="Title" />
										<x-input id="edit-title" class="block mt-1 w-full" type="text" name="title" required autofocus />
									</div>
									<div class="mt-2">
										<x-label for="edit-description" value="Description" />
										<textarea id="edit-description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" name="description" autofocus></textarea>
									</div>
									<div class="mt-2">
										<x-label for="edit-url" value="URL to IMDB" />
										<x-input id="edit-url" class="block mt-1 w-full" type="text" name="url" required autofocus />
									</div>
									<div class="mt-2">
										<x-label for="edit-img" value="Image" />
										<div class="flex items-center justify-start mt-4">
											<input class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" type="file" id="edit-img" name="img" accept="image/*">
										</div>
									</div>
									<div class="flex items-center justify-end mt-4">
										<x-button class="ml-4 close-button">Close</x-button>
										<x-button class="edit-mode ml-4">Save edit</x-button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--Update date modal popup-->
					<div id="movie_date" class="modal hidden fixed z-10 inset-0 overflow-y-auto">
						<div class="flex items-center justify-center min-h-screen">
							<div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
							<div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
								<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
									<h1 class="mb-4 text-2xl font-medium text-gray-900">Movie date!</h1>
									<div class="mt-2">
										<x-label for="title" value="Title" />
										<x-input id="update-id" class="block mt-1 w-full" type="hidden" name="update-id" required autofocus />
										<x-input id="edit-date" class="block mt-1 w-full" type="date" name="edit-date" required autofocus />
									</div>
									<div class="flex items-center justify-end mt-4">
										<x-button class="ml-4 close-button">Close</x-button>
										<x-button class="date-movie ml-4">Save edit</x-button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</x-app-layout>