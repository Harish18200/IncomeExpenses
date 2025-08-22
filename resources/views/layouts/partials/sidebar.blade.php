<ul class="sidebar navbar-nav">
    <li class="nav-item {{ Route::currentRouteName() == 'index' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item {{ Route::currentRouteName() == 'incomes.index' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('incomes.index') }}">
        <i class="fas fa-fw fa-dollar-sign"></i>
        <span>Daily Income </span></a>
    </li>
    <li class="nav-item {{ Route::currentRouteName() == 'expense.index' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('expense.index') }}">
        <i class="fas fa-fw fa-money-bill"></i>
        <span>Daily Expense </span></a>
    </li>
    <li class="nav-item {{ Route::currentRouteName() == 'paynowTransfer.index' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('paynowTransfer.index') }}">
        <i class="fas fa-fw fa-money-bill"></i>
        <span>Paynow Transfer</span></a>
    </li>
    <li class="nav-item {{ Route::currentRouteName() == 'summary' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('summary') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>All Summary</span></a>
    </li>
    <li class="nav-item {{ Route::currentRouteName() == 'notes.index' ? 'active' : '' }}" title="This is not calculate in Income/Expense">
        <a class="nav-link" href="{{ route('notes.index') }}">
        <i class="fas fa-fw fa-sticky-note"></i>
        <span>Notes</span></a>
    </li>
</ul>
