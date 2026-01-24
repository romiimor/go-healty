@extends('layouts.app')

@section('content')
<div class="min-h-screen pt-24 pb-12" style="background-color: #FFFDF5;">
    
    <div class="max-w-7xl mx-auto px-6 mb-12">
        <div class="flex flex-col md:flex-row justify-between items-end gap-4 border-b border-green-100 pb-8">
            <div>
                <h1 class="text-4xl md:text-5xl font-black text-green-800 tracking-tight mb-2">
                    Daftar <span class="text-orange-500">Makanan</span>
                </h1>
                <p class="text-gray-500 font-medium">Temukan dan kelola menu terbaik untuk kesehatan Anda.</p>
            </div>
            @if(auth()->check() && auth()->user()->isAdmin())
            <a href="{{ route('makanan.create') }}" class="group flex items-center bg-green-600 text-white px-6 py-3 rounded-2xl hover:bg-green-700 transition-all shadow-lg hover:shadow-green-200">
                <span class="font-bold text-lg">+ Tambah Menu</span>
            </a>
            @endif
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center gap-3 mb-8">
            <div class="h-8 w-2 bg-orange-500 rounded-full"></div>
            <h2 class="text-2xl font-extrabold text-green-800 uppercase tracking-wider">Rekomendasi Menu Spesial</h2>
        </div>
    </div>

    <div class="relative group w-full mb-20 overflow-hidden">
        <button onclick="scrollSlider('left')" class="absolute left-6 top-1/2 z-20 -translate-y-1/2 bg-white/90 backdrop-blur-sm p-4 rounded-full shadow-2xl hover:bg-white transition-all hidden group-hover:flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-800" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7" /></svg>
        </button>

        <div id="foodSlider" class="flex overflow-x-auto gap-8 px-10 pb-12 snap-x scroll-smooth scrollbar-hide">
            
            <div class="min-w-[300px] md:min-w-[380px] bg-white rounded-[3.5rem] p-5 shadow-xl shadow-gray-200/50 snap-center transition-all duration-500 hover:-translate-y-2 border border-gray-50">
                <div class="rounded-[2.8rem] overflow-hidden h-72 mb-6 shadow-md">
                    <img src="{{ asset('images/minuman-manis.webp') }}" alt="Menu Diet" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
                </div>
                <div class="px-4 pb-4">
                    <span class="text-pink-500 font-bold text-xs uppercase tracking-widest px-3 py-1 bg-pink-50 rounded-full">Low Calorie</span>
                    <h3 class="text-green-900 font-black text-2xl mt-3 mb-2">Boba drink</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Kombinasi manis dan boba yang lebih segar.</p>
                </div>
            </div>

            <div class="min-w-[300px] md:min-w-[380px] bg-white rounded-[3.5rem] p-5 shadow-xl shadow-gray-200/50 snap-center transition-all duration-500 hover:-translate-y-2 border border-gray-50">
                <div class="rounded-[2.8rem] overflow-hidden h-72 mb-6 shadow-md">
                    <img src="{{ asset('images/minuman-soda.webp') }}" alt="Bulking" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
                </div>
                <div class="px-4 pb-4">
                    <span class="text-yellow-600 font-bold text-xs uppercase tracking-widest px-3 py-1 bg-yellow-50 rounded-full">High Protein</span>
                    <h3 class="text-green-900 font-black text-2xl mt-3 mb-2">sparklink soda</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">perpaduan soda ringan dengan manis buah dan gula .</p>
                </div>
            </div>

            <div class="min-w-[320px] md:min-w-[420px] bg-green-800 rounded-[4rem] p-6 shadow-2xl shadow-green-900/20 snap-center transform scale-105 mx-4">
                <div class="rounded-[3rem] overflow-hidden h-80 mb-6 shadow-2xl">
                    <img src="{{ asset('images/coffee.webp') }}" alt="Menu Utama" class="w-full h-full object-cover">
                </div>
                <div class="px-6 pb-6 text-center">
                    <div class="bg-orange-500 text-white text-[10px] font-black uppercase tracking-[0.2em] px-4 py-1 rounded-full inline-block mb-4 shadow-lg shadow-orange-500/40">Best Choice</div>
                    <h3 class="text-white font-black text-3xl mb-2">The Signature Coffee</h3>
                    <p class="text-green-100/80 text-sm font-medium">Menu paling favorit dengan racikan kopi spesial.</p>
                </div>
            </div>

            <div class="min-w-[300px] md:min-w-[380px] bg-white rounded-[3.5rem] p-5 shadow-xl shadow-gray-200/50 snap-center transition-all duration-500 hover:-translate-y-2 border border-gray-50">
                <div class="rounded-[2.8rem] overflow-hidden h-72 mb-6 shadow-md">
                    <img src="{{ asset('images/eskrim.webp') }}" alt="Minuman" class="w-full h-full object-cover">
                </div>
                <div class="px-4 pb-4">
                    <span class="text-blue-500 font-bold text-xs uppercase tracking-widest px-3 py-1 bg-blue-50 rounded-full">Refreshing</span>
                    <h3 class="text-green-900 font-black text-2xl mt-3 mb-2">Fruit Smoothie</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Kesegaran buah asli dan ice cream yang menyegarkan.</p>
                </div>
            </div>

            <div class="min-w-[300px] md:min-w-[380px] bg-white rounded-[3.5rem] p-5 shadow-xl shadow-gray-200/50 snap-center transition-all duration-500 hover:-translate-y-2 border border-gray-50">
                <div class="rounded-[2.8rem] overflow-hidden h-72 mb-6 shadow-md">
                    <img src="{{ asset('images/cendol-elizabet.webp') }}" alt="Minuman" class="w-full h-full object-cover">
                </div>
                <div class="px-4 pb-4">
                    <span class="text-blue-500 font-bold text-xs uppercase tracking-widest px-3 py-1 bg-blue-50 rounded-full">Refreshing</span>
                    <h3 class="text-green-900 font-black text-2xl mt-3 mb-2">Local drinkk</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">manis alami cendol yang sleerr , dan feel yang kuyy.</p>
                </div>
            </div>

            <div class="min-w-[300px] md:min-w-[380px] bg-white rounded-[3.5rem] p-5 shadow-xl shadow-gray-200/50 snap-center transition-all duration-500 hover:-translate-y-2 border border-gray-50">
                <div class="rounded-[2.8rem] overflow-hidden h-72 mb-6 shadow-md">
                    <img src="{{ asset('images/ice banana.webp') }}" alt="Minuman" class="w-full h-full object-cover">
                </div>
                <div class="px-4 pb-4">
                    <span class="text-blue-500 font-bold text-xs uppercase tracking-widest px-3 py-1 bg-blue-50 rounded-full">Refreshing</span>
                    <h3 class="text-green-900 font-black text-2xl mt-3 mb-2">ice cream</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Kesegaran buah asli untuk menemani makan siang Anda.</p>
                </div>
            </div>

        </div>

        <button onclick="scrollSlider('right')" class="absolute right-6 top-1/2 z-20 -translate-y-1/2 bg-white/90 backdrop-blur-sm p-4 rounded-full shadow-2xl hover:bg-white transition-all hidden group-hover:flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-800" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" /></svg>
        </button>
    </div>

    <div class="max-w-7xl mx-auto px-6">
        <form method="GET" action="{{ route('makanan.index') }}" class="flex items-center gap-3 mb-6">
            <div class="h-8 w-2 bg-green-600 rounded-full"></div>
            <h2 class="text-2xl font-extrabold text-green-800 uppercase tracking-wider">Kelola Semua Menu</h2>

            <select name="kategori" class="ml-6 px-3 py-2 rounded-lg border text-sm">
                <option value="">Semua Kategori</option>
                @if(!empty($categories))
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('kategori') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                @endif
            </select>

            <select name="sort" class="ml-2 px-3 py-2 rounded-lg border text-sm">
                <option value="">Urutkan</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga: Terendah</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga: Tertinggi</option>
            </select>

            <div class="ml-auto flex items-center gap-2">
                <input id="searchFood" name="search" value="{{ request('search') }}" type="search" placeholder="Cari menu..." class="px-4 py-2 rounded-full border focus:outline-none text-sm" />
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-full">Filter</button>
                @if(request()->filled('kategori') || request()->filled('sort') || request()->filled('search'))
                    <a href="{{ route('makanan.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-full">Reset</a>
                @endif
            </div>
        </form>

        <div x-data="{ openItem:false, item:{} }">
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($makanans as $makanan)
                    @php $card = ['id'=>$makanan->id,'name'=>$makanan->nama,'desc'=>
                        Str::limit($makanan->deskripsi, 300),'price'=>number_format($makanan->price,0,',','.'),
                        'img'=> $makanan->gambar ? asset('storage/'.$makanan->gambar) : asset('images/makanan.jpg')]; @endphp
                    <div class="group bg-white rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-gray-200 transition-all duration-500 border border-gray-100/50">
                        <div class="relative h-52 overflow-hidden">
                            <template x-if="true">
                                @if($makanan->gambar)
                                    <img src="{{ asset('storage/' . $makanan->gambar) }}" loading="lazy" alt="{{ $makanan->nama }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                @else
                                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-400">No Image</span>
                                    </div>
                                @endif
                            </template>
                            <div class="absolute top-3 left-3 px-3 py-1 bg-white/80 rounded-full text-xs font-semibold">Rp {{ number_format($makanan->price, 0, ',', '.') }}</div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="font-black text-green-900 text-lg mb-2">{{ $makanan->nama }}</h3>
                            @if(!empty($makanan->kategori))
                                <div class="text-xs inline-block px-2 py-1 bg-green-50 text-green-700 rounded-full mb-2">{{ $makanan->kategori }}</div>
                            @endif
                            <p class="text-xs text-gray-500 font-medium leading-relaxed line-clamp-2 mb-4">{{ $makanan->deskripsi }}</p>

                            <div class="flex gap-3">
                                @if(auth()->check() && auth()->user()->isAdmin())
                                    <a href="{{ route('makanan.edit', $makanan) }}" class="flex-1 text-center py-2.5 bg-green-50 text-green-700 rounded-xl text-xs font-bold hover:bg-green-600 hover:text-white transition-colors">Edit</a>
                                    <form action="{{ route('makanan.destroy', $makanan) }}" method="POST" class="flex-1">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="w-full py-2.5 bg-red-50 text-red-500 rounded-xl text-xs font-bold hover:bg-red-500 hover:text-white transition-colors" onclick="return confirm('Hapus menu ini?')">Hapus</button>
                                    </form>
                                @else
                                    <button @click="item = {{ json_encode($card) }}; openItem = true" class="flex-1 text-center py-2.5 bg-orange-500 text-white rounded-xl text-xs font-bold hover:bg-orange-600 transition-colors">Quick View</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Quick view modal -->
            <div x-show="openItem" x-transition class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50" style="display:none">
                <div class="relative max-w-3xl w-full mx-4 bg-white rounded-xl overflow-hidden">
                    <button class="absolute top-3 right-3 text-gray-700 text-3xl leading-none" @click="openItem=false">&times;</button>
                    <div class="md:flex">
                        <div class="md:w-1/2 h-72 md:h-auto overflow-hidden">
                            <img :src="item.img" alt="" class="w-full h-full object-cover">
                        </div>
                        <div class="md:w-1/2 p-6">
                            <h3 class="text-2xl font-black text-green-900 mb-2" x-text="item.name"></h3>
                            <p class="text-gray-600 mb-4" x-text="item.desc"></p>
                            <p class="text-xl font-bold text-green-700 mb-4">Rp <span x-text="item.price"></span></p>

                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="makanan_id" :value="item.id">
                                <div class="flex items-center gap-3 mb-4">
                                    <label class="text-sm font-medium">Jumlah</label>
                                    <input type="number" name="qty" value="1" min="1" class="w-20 px-3 py-2 border rounded-lg">
                                </div>
                                <div class="flex gap-3">
                                    <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded-lg font-semibold">Tambah Keranjang</button>
                                    <button type="button" @click="openItem=false" class="bg-gray-100 px-4 py-2 rounded-lg">Tutup</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Menghilangkan scrollbar di Chrome/Safari/Firefox */
    .scrollbar-hide::-webkit-scrollbar { display: none; }
    .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    
    #foodSlider {
        scroll-padding: 3rem;
    }
</style>

<script>
    function scrollSlider(direction) {
        const slider = document.getElementById('foodSlider');
        const scrollAmount = window.innerWidth < 768 ? 320 : 420; 
        
        if (direction === 'left') {
            slider.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        } else {
            slider.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        }
    }
</script>
@endsection