@extends('layouts.admin')

@section('title', 'Manage Pricelist')

@section('content')
<div>
    <h1 class="text-3xl font-bold text-[#e5e5e5] mb-6">Manage Pricelist</h1>

    @if(session('success'))
        <div class="bg-green-900 border border-green-700 text-green-200 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Categories Section -->
    <div class="bg-[#161615] rounded-lg border border-[#2a2a2a] mb-6">
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-[#e5e5e5]">Kelola Kategori</h2>
                <button onclick="toggleCategoryForm()" class="bg-[#ffd700] text-[#1A1A1A] px-4 py-2 rounded-lg hover:bg-[#ffed4e] font-medium">
                    + Add Kategori
                </button>
            </div>

            <!-- Add Category Form -->
            <div id="categoryForm" class="hidden mb-4 p-4 bg-[#2a2a2a] rounded-lg">
                <form action="{{ route('admin.pricelist.categories.store') }}" method="POST">
                    @csrf
                    <div class="flex gap-4">
                        <input type="text" name="name" placeholder="Nama Kategori (e.g. Mobil, Motor)" required
                            class="flex-1 px-4 py-2 bg-[#161615] border border-[#2a2a2a] rounded-lg text-[#e5e5e5] focus:outline-none focus:ring-[#ffd700] focus:border-[#ffd700]">
                        <button type="submit" class="bg-[#ffd700] text-[#1A1A1A] px-6 py-2 rounded-lg hover:bg-[#ffed4e] font-medium">
                            Save
                        </button>
                        <button type="button" onclick="toggleCategoryForm()" class="bg-[#2a2a2a] text-[#e5e5e5] px-6 py-2 rounded-lg hover:bg-[#3a3a3a] font-medium">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>

            <table class="min-w-full divide-y divide-[#2a2a2a]">
                <thead class="bg-[#2a2a2a]">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#a1a1a1] uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#a1a1a1] uppercase tracking-wider">Nama Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#a1a1a1] uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-[#161615] divide-y divide-[#2a2a2a]">
                    @forelse($categories as $category)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">{{ $category->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">{{ $category->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <form action="{{ route('admin.pricelist.categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Hapus kategori ini akan menghapus semua model dan part terkait. Yakin?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-400">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-[#a1a1a1]">Belum ada kategori</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Vehicle Models Section -->
    <div class="bg-[#161615] rounded-lg border border-[#2a2a2a] mb-6">
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-[#e5e5e5]">Kelola Model Kendaraan</h2>
                <button onclick="toggleVehicleModelForm()" class="bg-[#ffd700] text-[#1A1A1A] px-4 py-2 rounded-lg hover:bg-[#ffed4e] font-medium">
                    + Add Model
                </button>
            </div>

            <!-- Add Vehicle Model Form -->
            <div id="vehicleModelForm" class="hidden mb-4 p-4 bg-[#2a2a2a] rounded-lg">
                <form action="{{ route('admin.pricelist.vehicle-models.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-3 gap-4">
                        <select name="category_id" required
                            class="px-4 py-2 bg-[#161615] border border-[#2a2a2a] rounded-lg text-[#e5e5e5] focus:outline-none focus:ring-[#ffd700] focus:border-[#ffd700]">
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="name" placeholder="Nama Model (e.g. Civic, Jazz)" required
                            class="px-4 py-2 bg-[#161615] border border-[#2a2a2a] rounded-lg text-[#e5e5e5] focus:outline-none focus:ring-[#ffd700] focus:border-[#ffd700]">
                        <div class="flex gap-2">
                            <button type="submit" class="bg-[#ffd700] text-[#1A1A1A] px-6 py-2 rounded-lg hover:bg-[#ffed4e] font-medium">
                                Save
                            </button>
                            <button type="button" onclick="toggleVehicleModelForm()" class="bg-[#2a2a2a] text-[#e5e5e5] px-6 py-2 rounded-lg hover:bg-[#3a3a3a] font-medium">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-[#a1a1a1] mb-2">Filter by Kategori</label>
                <select id="filterCategory" onchange="filterByCategory(this.value)"
                    class="border border-[#2a2a2a] bg-[#161615] text-[#e5e5e5] rounded-lg px-4 py-2">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <table class="min-w-full divide-y divide-[#2a2a2a]">
                <thead class="bg-[#2a2a2a]">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#a1a1a1] uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#a1a1a1] uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#a1a1a1] uppercase tracking-wider">Nama Model</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#a1a1a1] uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-[#161615] divide-y divide-[#2a2a2a]">
                    @forelse($vehicleModels as $model)
                        <tr data-category="{{ $model->category_id }}">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">{{ $model->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">{{ $model->category->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">{{ $model->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <form action="{{ route('admin.pricelist.vehicle-models.destroy', $model) }}" method="POST" class="inline" onsubmit="return confirm('Hapus model ini akan menghapus semua part terkait. Yakin?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-400">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-[#a1a1a1]">Belum ada model kendaraan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Parts Section -->
    <div class="bg-[#161615] rounded-lg border border-[#2a2a2a]">
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-[#e5e5e5]">Kelola Part & Harga</h2>
                <button onclick="togglePartForm()" class="bg-[#ffd700] text-[#1A1A1A] px-4 py-2 rounded-lg hover:bg-[#ffed4e] font-medium">
                    + Add Part
                </button>
            </div>

            <!-- Add Part Form -->
            <div id="partForm" class="hidden mb-4 p-4 bg-[#2a2a2a] rounded-lg">
                <form action="{{ route('admin.pricelist.parts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-[#a1a1a1] mb-2">Model Kendaraan</label>
                            <select name="vehicle_model_id" required
                                class="w-full px-4 py-2 bg-[#161615] border border-[#2a2a2a] rounded-lg text-[#e5e5e5] focus:outline-none focus:ring-[#ffd700] focus:border-[#ffd700]">
                                <option value="">Pilih Model</option>
                                @foreach($vehicleModels as $model)
                                    <option value="{{ $model->id }}">{{ $model->category->name }} - {{ $model->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#a1a1a1] mb-2">Nama Part</label>
                            <input type="text" name="name" placeholder="e.g. Kap Mesin, Full Body" required
                                class="w-full px-4 py-2 bg-[#161615] border border-[#2a2a2a] rounded-lg text-[#e5e5e5] focus:outline-none focus:ring-[#ffd700] focus:border-[#ffd700]">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-[#a1a1a1] mb-2">Harga (Rp)</label>
                            <input type="number" name="price" placeholder="0" min="0" required
                                class="w-full px-4 py-2 bg-[#161615] border border-[#2a2a2a] rounded-lg text-[#e5e5e5] focus:outline-none focus:ring-[#ffd700] focus:border-[#ffd700]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-[#a1a1a1] mb-2">Foto</label>
                            <input type="file" name="image" accept="image/*"
                                class="w-full px-4 py-2 bg-[#161615] border border-[#2a2a2a] rounded-lg text-[#e5e5e5] focus:outline-none focus:ring-[#ffd700] focus:border-[#ffd700]">
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" class="bg-[#ffd700] text-[#1A1A1A] px-6 py-2 rounded-lg hover:bg-[#ffed4e] font-medium">
                            Save
                        </button>
                        <button type="button" onclick="togglePartForm()" class="bg-[#2a2a2a] text-[#e5e5e5] px-6 py-2 rounded-lg hover:bg-[#3a3a3a] font-medium">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-[#a1a1a1] mb-2">Filter by Kategori</label>
                    <select id="filterPartCategory" onchange="filterPartsByCategory(this.value)"
                        class="w-full border border-[#2a2a2a] bg-[#161615] text-[#e5e5e5] rounded-lg px-4 py-2">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#a1a1a1] mb-2">Filter by Model</label>
                    <select id="filterPartModel" onchange="filterPartsByModel(this.value)"
                        class="w-full border border-[#2a2a2a] bg-[#161615] text-[#e5e5e5] rounded-lg px-4 py-2">
                        <option value="">All Models</option>
                        @foreach($vehicleModels as $model)
                            <option value="{{ $model->id }}" data-category="{{ $model->category_id }}">{{ $model->category->name }} - {{ $model->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <table class="min-w-full divide-y divide-[#2a2a2a]">
                <thead class="bg-[#2a2a2a]">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#a1a1a1] uppercase tracking-wider">Foto</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#a1a1a1] uppercase tracking-wider">Model</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#a1a1a1] uppercase tracking-wider">Part</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#a1a1a1] uppercase tracking-wider">Harga</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-[#a1a1a1] uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-[#161615] divide-y divide-[#2a2a2a]">
                    @forelse($parts as $part)
                        <tr data-model="{{ $part->vehicle_model_id }}" data-category="{{ $part->vehicleModel->category_id }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($part->image_path)
                                    <img src="{{ asset('storage/' . $part->image_path) }}" alt="{{ $part->name }}" class="w-20 h-20 object-cover rounded border border-[#2a2a2a]">
                                @else
                                    <div class="bg-[#2a2a2a] w-20 h-20 rounded border border-[#2a2a2a]"></div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">{{ $part->vehicleModel->category->name }} - {{ $part->vehicleModel->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#e5e5e5]">{{ $part->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-[#ffd700]">Rp {{ number_format($part->price, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <form action="{{ route('admin.pricelist.parts.destroy', $part) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus part ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-400">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-[#a1a1a1]">Belum ada part</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function toggleCategoryForm() {
    document.getElementById('categoryForm').classList.toggle('hidden');
}

function toggleVehicleModelForm() {
    document.getElementById('vehicleModelForm').classList.toggle('hidden');
}

function togglePartForm() {
    document.getElementById('partForm').classList.toggle('hidden');
}

function filterByCategory(categoryId) {
    const rows = document.querySelectorAll('tbody tr[data-category]');
    rows.forEach(row => {
        if (!categoryId || row.getAttribute('data-category') === categoryId) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

function filterPartsByCategory(categoryId) {
    const rows = document.querySelectorAll('tbody tr[data-category]');
    rows.forEach(row => {
        if (!categoryId || row.getAttribute('data-category') === categoryId) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
    // Reset model filter
    document.getElementById('filterPartModel').value = '';
}

function filterPartsByModel(modelId) {
    const rows = document.querySelectorAll('tbody tr[data-model]');
    rows.forEach(row => {
        if (!modelId || row.getAttribute('data-model') === modelId) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}
</script>
@endsection
