<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('dashboard') }}">
                        Online Voting
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('election.index') }}" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Manage Election</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('category.index') }}" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Manage Category</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('voter.index') }}" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Manage Voter</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('candidate.index') }}" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Manage Candidate</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>