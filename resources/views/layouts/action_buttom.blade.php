<div class="appBottomMenu">
    <a href="/super_admin/dashboard" class="item {{ Request::is('super_admin/dashboard') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="home-outline"></ion-icon><strong>Beranda</strong>
        </div>
    </a>
    <a href="/super_admin/permohonan" class="item {{ Request::is('super_admin/permohonan') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="document-text-outline"></ion-icon><strong>Permohonan</strong>
        </div>
    </a>
    <a href="/super_admin/permohonan/waiting_sign" data-toggle="modal" class="item">
        <div class="col">
            <div class="action-button large">
                <ion-icon name="finger-print-outline"></ion-icon>
            </div>
        </div>
    </a>
    <a href="/super_admin/permohonan/signed" class="item {{ Request::is('super_admin/permohonan/signed') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="create-outline"></ion-icon><strong>Diterima</strong>
        </div>
    </a>
    <a href="/super_admin/permohonan/rejected" class="item {{ Request::is('super_admin/permohonan/rejected') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="document-text-outline"></ion-icon><strong>Ditolak</strong>
        </div>
    </a>
</div>