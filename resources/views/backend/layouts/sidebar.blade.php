<div class="tab-content p-l-0 p-r-0">
    <div class="tab-pane active" id="admin">
        <nav class="sidebar-nav">
            <ul class="main-menu metismenu">
                <li class="active"><a href="{{ route('admin')}}"><i class="icon-home"></i><span>Dashboard</span></a></li>
                <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-control-pause"></i><span>Contact Management</span> </a>
                    <ul>
                        <li><a href="{{ route('contact.index') }}">All Contacts</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="has-arrow"><i class="icon-control-pause"></i><span>Bank Management</span> </a>
                    <ul>
                        <li><a href="{{ route('bank.index') }}">All Banks</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>