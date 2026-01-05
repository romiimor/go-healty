@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-24 p-6">
	<div class="flex justify-between items-center mb-6">
		<h1 class="text-3xl font-bold text-green-700">Olahraga</h1>
		<a href="{{ route('olahraga.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">+ Tambah Olahraga</a>
	</div>

	@if(session('success'))
		<div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">{{ session('success') }}</div>
	@endif

	<div class="bg-white shadow-md rounded-2xl p-6 mb-8">
		<h2 class="text-xl font-semibold text-green-700 mb-4">Rekomendasi Olahraga</h2>
		<div class="overflow-x-auto">
			<table class="min-w-full text-left">
				<thead>
					<tr class="text-sm text-gray-600">
						<th class="px-4 py-2">Untuk Pembakaran Kalori</th>
						<th class="px-4 py-2">Untuk Pembentukan Otot</th>
						<th class="px-4 py-2">Untuk Fleksibilitas & Pemulihan</th>
					</tr>
				</thead>
				<tbody class="text-sm text-gray-700">
					<tr class="align-top">
						<td class="px-4 py-3">
							<ul class="list-disc ml-5">
								<li>HIIT (interval intensitas tinggi)</li>
								<li>Jumping rope</li>
								<li>Jogging / Brisk walking</li>
							</ul>
						</td>
						<td class="px-4 py-3">
							<ul class="list-disc ml-5">
								<li>Latihan kekuatan (squat, deadlift, bench press)</li>
								<li>Resistance training 3x seminggu</li>
								<li>Progressive overload</li>
							</ul>
						</td>
						<td class="px-4 py-3">
							<ul class="list-disc ml-5">
								<li>Yoga ringan / stretching dinamis</li>
								<li>Latihan mobilitas dan pemulihan</li>
								<li>Pemanasan dan pendinginan rutin</li>
							</ul>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	@if(isset($olahragas) && $olahragas->count())
	<div>
		<h2 class="text-xl font-semibold text-green-700 mb-4">Daftar Olahraga</h2>
		<div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
			@foreach ($olahragas as $olahraga)
			<div class="bg-white shadow-md rounded-2xl p-4 hover:shadow-lg">
				@if($olahraga->gambar)
					<img src="{{ asset('storage/' . $olahraga->gambar) }}" alt="{{ $olahraga->nama }}" class="rounded-lg w-full h-48 object-cover mb-4">
				@endif
				<h2 class="text-lg font-semibold text-green-700">{{ $olahraga->nama }}</h2>
				<p class="text-sm text-gray-600 mt-2">{{ $olahraga->deskripsi }}</p>
				<div class="mt-4 flex justify-between">
					<a href="{{ route('olahraga.edit', $olahraga) }}" class="text-blue-600 text-sm hover:underline">Edit</a>
					<form action="{{ route('olahraga.destroy', $olahraga) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
						@csrf @method('DELETE')
						<button type="submit" class="text-red-600 text-sm hover:underline">Hapus</button>
					</form>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	@endif
</div>
@endsection

