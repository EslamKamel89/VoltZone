<?php

use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use App\Models\Category;

new
    #[Title('Categories')]
    class extends Component {
        public function with() {
            return [
                'categories' => Category::active()->get(),
            ];
        }
    }; ?>

<div>
    <!-- Categories Grid -->
    <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
        @foreach ($categories as $category )
        <livewire:categories.comps.category :category="$category" :key="$category->id" />
        @endforeach
    </div>

</div>