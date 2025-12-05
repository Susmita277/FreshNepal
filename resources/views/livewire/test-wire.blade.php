<div>
    <button class="btn" wire:click="getDatas()" type="button">Test</button>
    @foreach ($this->datas as $item)
            <div>
                {{$item}}
            </div>
    @endforeach
</div>
<script>
    document.addEventListener('livewire:init', () => {
        console.log("Livewire loaded!");
    });
</script>
