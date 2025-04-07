<div>
    @if ($view === 'dashboard')
    
    <div class="text-danger">Test page
    <li class="nav-item">
  <a class="nav-link" href="#" wire:click.prevent="$emit('changeView','members')">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li>
    </div>
        
        @elseif ($view === 'members')
        @livewire('members.main')
        @elseif ($view === 'baptisms')
        @livewire('baptisms-component')
    @elseif ($view === 'deaths')
        @livewire('deaths-component')
    @elseif ($view === 'teenagers')
        @livewire('teenagers-component')
    @elseif ($view === 'kids')
        @livewire('kids-component')
    @elseif ($view === 'transfers')
        @livewire('transfers-component')
    @elseif ($view === 'users')
        @livewire('users-component')
    @elseif ($view === 'events')
        @livewire('events-component')
        @else
        <div class="text-danger">Component not found!</div>
        
    @endif
</div>
