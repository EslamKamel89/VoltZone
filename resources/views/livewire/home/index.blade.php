<?php

use Livewire\Volt\Component;
use Livewire\Attributes\{Layout, Title};


new
    #[Title('Home')]
    class extends Component {
    }; ?>

<div>
    <livewire:home.comps.hero />
    <livewire:home.comps.brands />
    <livewire:home.comps.categories />
    <livewire:home.comps.reviews />
</div>